<?php

class AjaxController extends Controller {

    public function actionActivaLote() {
        $loteid = $_POST['lote'];
        $lote = Lote::model()->findByPk($loteid);
        $articulo = Articulo::model()->findByPk($loteid);
        $lote->Stock = 1;
        $articulo->Stock = 1;
        $lote->saveAttributes(array("Stock"));
        $articulo->saveAttributes(array("Stock"));
    }

    public function actionDetallePedido() {
        $pedid = $_POST['id'];
        if (Yii::app()->user->usuario) {
            $venta = DocumentoVenta::model()->findByPk($pedid);
          
            $cabecera = $lineas = '';
            $ref_venta = $venta->Numero;
            $fecha_venta = substr($venta->Fecha, 0, 10);
            $lotes = LineaVenta::model()->findAllByAttributes(array("fkNTC_DocumentoVenta" => $venta->idNTC_DocumentoVenta));
            $cant_pares = 0;
            $cant_cajas = 0;
            $total_pedido = 0;
            $total_pedidoIVA = 0;
            $acumcant_cajas = 0;
            $acumcant_pares = 0;
            $cubicaje = 0;
            foreach ($lotes as $lote) {
                $idLote = $lote->fkNTC_Lote;
                $loteaux = Lote::model()->findByPk($idLote);
                $artiaux = Articulo::model()->findByPk($idLote);
                $cajas_lotes = array();
                $cajas_lotes = MetodosComunes::sacar_cajas_y_pares($idLote);
                if ($cajas_lotes["Caja"] == 0) { // si son pares ponemos los pares
                    $cant_pares = $lote->Cantidad * $cajas_lotes["Cantidad"];
                    $acumcant_pares = $acumcant_pares + $cant_pares;
                } else { // si no, ponemos las cajas del pedido
                    $cant_cajas = $lote->Cantidad;
                    $acumcant_cajas = $acumcant_cajas + $cant_cajas;
                }
                $total_pedido = $total_pedido + $lote->Importe * $lote->Cantidad;
                $total_pedidoIVA = $total_pedidoIVA + $lote->ImporteIva * $lote->Cantidad;
                $lineas .= MetodosComunes::sacar_lineas_pedidoAlt($idLote, $lote->idNTC_LineaVenta);
                $tallas = $loteaux->tallajes();
                $suelts = array();

                $Pesos = ValorAtributo::model()->findByAttributes(array("fkNTC_Articulo" => $idLote, "fkNTC_Atributo" => "6"));

                $pesosArr = CJSON::decode($Pesos->Valor);
                $peso = explode(' ', $pesosArr['Peso']);
                $peso = $peso[0];

                $alto = floatval($pesosArr['Alto']);
                $ancho = floatval($pesosArr['Ancho']);
                $profundo = floatval($pesosArr['Profundidad']);

                $alto = str_replace("cm", "", $alto);
                $ancho = str_replace("cm", "", $ancho);
                $profundo = str_replace("cm", "", $profundo);

                $cubiaux = 0;
                $sql = "select sum(cantidad) as Cantidad from NTC_LoteArticulo where fkntc_lote=" . $idLote . " and Quitar = 0 group by fkntc_lote";
                $command = Yii::app()->db->createCommand($sql);
                $resultsql = $command->queryRow();
                $cubiaux = ($alto / 100) * ($ancho / 100) * ($profundo / 100) * 110 * $lote->Cantidad;
                if ($loteaux->surtido_libre) {
                    $cubiaux *= $resultsql['Cantidad'];
                }
                $cubicaje = $cubicaje + $cubiaux;
            }
            $datos = '<div class="row">
                        <div class="celda bordebajo" style="width:248px;">Direccion Envio</div>
                        <div class="celda texto_descrip">' . $venta->DireccionEnvio . ' (' . $venta->ProvinciaEnvio . ') ' . $venta->PaisEnvio . '</div>
                      </div>                                      
                      <div class="row">
                        <div class="celda bordebajo" style="width:248px;">Direccion Facturacion</div>
                        <div class="celda texto_descrip">' . $venta->DireccionFactura . ' (' . $venta->ProvinciaFactura . ') ' . $venta->PaisFactura . '</div>
                      </div>';
            $cabecera .= '          <div id="detalle_' . $ref_venta . '" class="desplegable_detalle_pedido">
                                        <div class="tabla">
                                        ' . $datos . '
                                        </div>
					<div class="tabla">
						<div class="row titulos_celdas">
                                                        <div class="celda bordebajo" style="width:248px;">Recibido</div>
							<div class="celda bordebajo" style="width:248px;">Producto</div>
							<div class="celda bordebajo">Material</div>
							<div class="celda bordebajo">Surtido</div>
							<div class="celda bordebajo">Pares/Caja</div>
							<div class="celda bordebajo">N&deg; Cajas</div>
							<div class="celda bordebajo">Precio Total</div>
						</div>
						' . $lineas . '
					</div> <!-- end tabla -->
                                        <div class="fila_modal">
                                                <!-- total resumen -->               
                                                <div class="resumen_log_precios">
                                                ';
            if ($venta->LogAlm > 0) {
                $cabecera .= ' <p><span>Logistica y Almacenamiento</span><span>' . number_format($venta->LogAlm, 2, ",", ".") . '&euro;</span></p>';
            }
            $cabecera .= '<p><span>Subtotal</span><span>' . number_format($venta->ImporteSLA, 2, ",", ".") . '&euro;</span></p>
                                                        <p><span>Env&iacute;o</span><span>' . number_format($venta->ImportePortesSI, 2, ",", ".") . '&euro;</span></p>
                                                        <p><span>IVA</span><span>' . number_format($venta->IvaImporte, 2, ",", ".") . '&euro;</span></p>
                                                        ' . (($venta->ImporteRecargo > 0) ? '<p><span>Recargo F. Pago</span><span>' . number_format($venta->ImporteRecargo, 2, ",", ".") . '&euro;</span></p>' : "") . '
                                                        <p class="total_del_resumen"><span>Total</span><span>' . number_format($venta->Total, 2, ",", ".") . '&euro;</span></p>
                                                        <p><span></span><span class="iva">* IVA incluido</span></p>
                                                </div>
                                                <div class="logistico_resumen">
                                                        <h2>Resumen log&iacute;stico</h2>
                                                        <p>' . $acumcant_cajas . ' cajas</p>
                                                        <p>' . $acumcant_pares . ' pares sueltos</p>
                                                </div>
                                                </div>

                                                <div class="logistico_resumen">
                                                        <p><span style="width:100%; margin-bottom: 15px;text-align: right !important;">Peso: ' . number_format($cubicaje, 2, ",", ".") . ' Kg</span></p>                                                              
                                                        <p><span style="width:100%; margin-bottom: 15px;text-align: right !important;">IVA aplicado: ' . $venta->clienteVenta->iva->Nombre . '</span></p>      
                                                        <p><span style="width:100%; margin-bottom: 15px;text-align: right !important;">Forma de pago: ' . $venta->formaPago->Nombre . '</span></p>		
                                                </div>
                                                <!--- DETALLE DE PEDIDO ---->
                                                <!-- articulos -->
                                        </div>';
            echo $cabecera;
        }
    }

    public function actionActu_EstadoPedido() {
        $idPedido = $_POST["idPedido"];
        $idEstado = $_POST["idEstado"];

        $estadoLote = DocumentoVenta::model()->findByAttributes(array("idNTC_DocumentoVenta" => $idPedido));
        $estadoLote->fkNTC_TipoEstadoPedido = $idEstado;

        $retorno = true;
        if (!$estadoLote->saveAttributes(array("fkNTC_TipoEstadoPedido"))) {
            $retorno = false;
        }

        return $retorno;
    }

    public function actionActu_tramitar() {
        $idPedido = $_POST["idPedido"];
        $retorno = true;
        $estadoLote = DocumentoVenta::model()->findByAttributes(array("idNTC_DocumentoVenta" => $idPedido));
        $estadoLote->Enviado = 1;
        if (!$estadoLote->saveAttributes(array("Enviado"))) {
            $retorno = false;
        }

        // calculamos todas las lineas de pedido para el grafico

        $lin_peds = LineaVenta::model()->findAllByAttributes(array("fkNTC_DocumentoVenta" => $idPedido));
        $estadoLote->EnviadoCompletamente = sizeof($lin_peds);
        $estadoLote->EnvioParcial = 0;

        if (!$estadoLote->saveAttributes(array("EnviadoCompletamente"))) {
            $retorno = false;
            die("Completo " . F::pre($estadoLote));
        }
        if (!$estadoLote->saveAttributes(array("EnvioParcial"))) {
            $retorno = false;
            die("parcial " . F::pre($estadoLote));
        }

        return $retorno;
    }

    public function actionActu_tramitar_array() {
        $formulario = json_decode($_POST["array_peds"]);
        foreach ($formulario as $valor) {
            $idPedido = $valor;
            $estadoLote = DocumentoVenta::model()->findByAttributes(array("idNTC_DocumentoVenta" => $idPedido));
            $estadoLote->Enviado = 1;
            $estadoLote->EnvioParcial = 0;
            $lin_peds = LineaVenta::model()->findAllByAttributes(array("fkNTC_DocumentoVenta" => $idPedido));
            $estadoLote->EnviadoCompletamente = count($lin_peds);
            $estadoLote->save();
        }
        return true;
    }

    public function actionActu_destramitar() {
        $idPedido = $_POST["idPedido"];
        $retorno = true;
        $estadoLote = DocumentoVenta::model()->findByAttributes(array("idNTC_DocumentoVenta" => $idPedido));
        $estadoLote->Enviado = 0;
        if (!$estadoLote->saveAttributes(array("Enviado"))) {
            $retorno = false;
        }


        return $retorno;
    }

    public function actionActu_destramitar_array() {
        $formulario = json_decode($_POST["array_peds"]);

        $retorno = true;
        foreach ($formulario as $cosa => $valor) {
            $idPedido = $valor;
            $estadoLote = DocumentoVenta::model()->findByAttributes(array("idNTC_DocumentoVenta" => $idPedido));
            $estadoLote->Enviado = 0;
            if (!$estadoLote->saveAttributes(array("Enviado"))) {
                $retorno = false;
            }
        }

        return $retorno;
    }

    public function actionActu_linea_tramitar() {
        // calculamos todas las lineas de pedido para el grafico
        $retorno = true;
        $idPedido = $_POST["idPedido"];

        $lin_peds = LineaVenta::model()->findByAttributes(array("idNTC_LineaVenta" => $idPedido));
        $pedido = DocumentoVenta::model()->findByAttributes(array("idNTC_DocumentoVenta" => $lin_peds->fkNTC_DocumentoVenta));

        if ($_POST["valor"] == "on") {
            $pedido->EnvioParcial = ($pedido->EnvioParcial) + 1;
            $lin_peds->CantidadEnviada = 1;
        } else {
            $pedido->EnvioParcial = ($pedido->EnvioParcial) - 1;
            if ($pedido->EnvioParcial < 0) {
                $pedido->EnvioParcial = 0;
            }
            $lin_peds->CantidadEnviada = 0;
        }
        if ($lin_peds->saveAttributes(array("CantidadEnviada"))) {
            //    die(F::pre($pedido));
            if (!$pedido->saveAttributes(array("EnvioParcial"))) {
                $retorno = false;
            }
            if ($pedido->EnvioParcial > 0 && $retorno) {
                $porcent = round(($pedido->EnvioParcial / $pedido->EnviadoCompletamente) * 100);
            } else {
                $porcent = 0;
            }
        }

        //echo $porcent;
        echo CJSON::encode(array("porcent" => $porcent, "pedido" => $pedido->idNTC_DocumentoVenta));
    }

    public function actionGenerarCsv() {
        ob_start();
        $formulario = json_decode($_POST["array_peds"]); // se nos pasa un array con los ids de las lineas que se desean importar
        $retorno = true;
        $almacenes_listado = array();
        $lineas_ped = array();
        // recuperamos las lineas de pedido que quiere el cliente
        $lineas_ped[$almacen_act]["linsped"] = "";
        $lineas_ped[$almacen_act]["canti_pares"] += 0;
        $lineas_ped[$almacen_act]["precio_tot"] += 0;
        $lineas_ped[$almacen_act]["tot_cajas"] += 0;

        foreach ($formulario as $cosa => $valor) {

            $idPedido = $valor;
            $estadoLote = DocumentoVenta::model()->findByAttributes(array("idNTC_DocumentoVenta" => $idPedido));
            $lin_peds = LineaVenta::model()->findAllByAttributes(array("fkNTC_DocumentoVenta" => $estadoLote->idNTC_DocumentoVenta));


            // sacamos los detalles para montar el excel de cada pedido
            foreach ($lin_peds as $lin_ped) {
                $lotArt = LoteArticulo::model()->findByAttributes(array("fkNTC_Lote" => $lin_ped->fkNTC_Lote));

                $almacen_act = $lotArt->Articulo->fkNTC_Almacen;

                // comprobamos si esta en el array de almacenes de este pedido, si no, lo insertamos
                if (!in_array($almacen_act, $almacenes_listado)) {
                    $almacenes_listado[] = $almacen_act;
                    $alm = Almacen::model()->findByPk($almacen_act);
                    $lineas_ped[$almacen_act]["nom_alm"] = $alm->Nombre;
                    $lineas_ped[$almacen_act]["dire_alm"] = $alm->Direccion;
                    $lineas_ped[$almacen_act]["tel_alm"] = $alm->Telefono;
                    $lineas_ped[$almacen_act]["email_alm"] = $alm->Email;
                } // end if !inarray
                // SACAMOS LOS DETALLES DE LA LINEA
                $articulo = $lotArt->fkNTC_Articulo;
                $Art = Articulo::model()->findByAttributes(array("idNTC_Articulo" => $articulo));
                $LoteArt = LoteArticulo::model()->findByAttributes(array("fkNTC_Articulo" => $articulo));
                $Lote = Lote::model()->findByAttributes(array("idNTC_Lote" => $LoteArt->fkNTC_Lote));
                $articulosLote = Lote::model()->obtenerTodosArticulosDeUnLote($LoteArt->fkNTC_Lote, false);
                /*
                 *              $coloresLote = Lote::model()->obtenerTodosColoresDeUnLote($articulo);
                  $tallasLote = Lote::model()->tallas($articulo);
                 * 
                 */
                $tallasLote = Lote::model()->tallas($LoteArt->fkNTC_Lote);
                $coloresLote = Lote::model()->colores($LoteArt->fkNTC_Lote);
                $fichero = Fichero::model()->findByAttributes(array("fkNTC_Articulo" => $LoteArt->fkNTC_Articulo));
                $precio = TarifaVenta::model()->findByAttributes(array("fkNTC_Articulo" => $LoteArt->fkNTC_Articulo));
                $precioDesc = DescuentoVenta::model()->findByAttributes(array("fkNTC_Articulo" => $LoteArt->fkNTC_Articulo,"Quitar"=>0));
                $Almac = Almacen::model()->findByAttributes(array("idNTC_Almacen" => $Art->fkNTC_Almacen));

                $data = Array();
                $data["idLote"] = $LoteArt->fkNTC_Lote;
                $data["artic"] = $LoteArt->fkNTC_Articulo;
                $data["NombreLote"] = $Art->Descripcion;
                $data["surtido_libre"] = $Lote->surtido_libre;
                $surtiti = "";

                if ($articulosLote[0]["surtido_libre"] == 1) {
                    $surtiti = MetodosComunes::sacar_tallas_lote_csv2($articulosLote);
                } else {
                    $tallasaux = Lote::model()->tallas($LoteArt->fkNTC_Lote);
                    $surtiti = $tallasaux[0] . " - " . $tallasaux[sizeof($tallasaux) - 1];
                }


                $data["PrecioVenta"] = $precio->PrecioVenta;
                $data["PrecioCoste"] = $precio->PrecioCoste;
                $data["ImporteDescuento"] = $precioDesc->ImporteDescuento;
                $data["Referencia"] = $Art->Referencia;
                $data["ReferenciaColor"] = $Art->ReferenciaColor;
                $Proveedor = $articulosLote[0]["Proveedor"];
                $prove = Almacen::model()->findByAttributes(array("idNTC_Almacen" => $Proveedor));
                $data["NombreProveedor"] = $Almac->Nombre;
                $coloresaux = Lote::model()->colores($LoteArt->fkNTC_Lote);
                $data["Colores"] = implode(",", $coloresaux);
                $data["surtidoLibre"] = $articulosLote[0]["surtido_libre"];
                // recorro el array con todos los datos y los organizo para la tabla de tallas
                foreach ($articulosLote as $arts) {
                    switch ($arts["Etiqueta"]) {
                        case "Tallaje":
                            break;
                    }
                }

                /*                 * ******* PESO ******** */
                $Pesos = ValorAtributo::model()->findByAttributes(array("fkNTC_Articulo" => $Art->idNTC_Articulo, "fkNTC_Atributo" => "6"));
                $pesAux = explode(",", $Pesos->Valor);
                $suelts = array();
                for ($i = 0; $i < count($pesAux); $i++) {
                    $suelts[] = explode("\"", $pesAux[$i]);
                }

                $peso = $suelts[3][3] . "." . $suelts[4][0];
                /* tambien calculamos el cubicaje para el envio */
                $alto = $suelts[0][3];
                $alto = str_replace("cm", "", $alto);
                $ancho = $suelts[1][3];
                $ancho = str_replace("cm", "", $ancho);
                $profundo = $suelts[2][3];
                $profundo = str_replace("cm", "", $profundo);

                //echo "<pre>".print_r($ancho,1 )."</pre>";			
                $cubicaje = $cubicaje + ($alto / 100) * ($ancho / 100) * ($profundo / 100) * 110;
                $data["Peso"] = $cubicaje;
                $data["alto"] = $alto;
                $data["ancho"] = $ancho;
                $data["profundo"] = $profundo;
                $canti_pares = 0;

                $CantArts = LoteArticulo::model()->findAllByAttributes(array("fkNTC_Lote" => $LoteArt->fkNTC_Lote));

                foreach ($CantArts as $cantArt) {
                    if ($cantArt->Variante !== NULL)
                        $canti_pares = $canti_pares + $cantArt->Cantidad;
                }
                $precioReal = 0;
                if (floatval($data["ImporteDescuento"]) > 0 && floatval($data["ImporteDescuento"]) < floatval($data["PrecioVenta"])) {
                    $precioReal = $canti_pares * $data["ImporteDescuento"];
                    $precioVenta = $data["ImporteDescuento"];
                } else {
                    $precioReal = $canti_pares * $data["PrecioVenta"];
                    $precioVenta = $data["PrecioVenta"];
                }


                // MONTAMOS LAS LINEAS DE PEDIDO
                $lineas_ped[$almacen_act]["linsped"] .= '"'
                        . $estadoLote->EnvioAtencionA . '","'
                        . str_replace(".", ",", $precioVenta) . '","'
                        . $data["alto"] . ' x ' . $data["ancho"] . ' x ' . $data["profundo"] . '","'
                        . $surtiti . '","'
                        . $data["Referencia"] . '","'
                        . $data["ReferenciaColor"] . '","'
                        . $lin_ped->Cantidad . '","'
                        . ($canti_pares) . '","'
                        . str_replace(".", ",", ($data["PrecioCoste"])) . '","'
                        . str_replace(".", ",", ($canti_pares * $data["PrecioCoste"] * $lin_ped->Cantidad)) . '" 
'
                ;
                // DATOS DEL ALMACEN


                $lineas_ped[$almacen_act]["canti_pares"] += $canti_pares * $lin_ped->Cantidad;
                $lineas_ped[$almacen_act]["precio_tot"] += ($canti_pares * $data["PrecioCoste"] * $lin_ped->Cantidad);
                $lineas_ped[$almacen_act]["tot_cajas"] += $lin_ped->Cantidad;
            } // end foreach linpeds
        } // end foreach formulario
        //die("FIN");

        foreach ($almacenes_listado as $almacen) {
            $var_csv = '
Almacen,"@ALMACEN@",,,,,,,,,
Calle ,"@CALLE@",,,,,,,,,
Telefono,"@TELEFONO@",,,,,,,,,
Email,"@EMAIL@",,,,,,,,,
,,,,,,,,,,
CLIENTE,PRECIO VENTA,MEDIDAS CAJA,SURTIDO,REF. PROVEEDOR,PROV.COLOR,CAJAS,PARES/CAJA,PRECIO COSTE,TOTAL COSTE
@LINALISTADO@
,,,,,,,,,"@TOTALCANTIDAD@"
,,,,,,,,,
,,,,,,,,,
Total Cajas,@TOTALCAJAS@,,,,,,,,,
Total Pares,@TOTALPARES@,,,,,,,,,
';

            //F::pre($lineas_ped);
            $stores = array();
            $criteria = new CDbCriteria();
            //$criteria->select = "Nombre";
            $criteria->condition = "Quitar = 0";
            $marcasAl = MarcaAlmacen::model()->findAllByAttributes(array("fkNTC_Almacen" => $almacen));
            foreach ($marcasAl as $marcaAl) {
                if ($marcaAl->Marca->Quitar == 0) {
                    $stores[] = $marcaAl->Marca->Nombre;
                }
            }

            $list_stores = implode(", ", $stores);

            $var_csv = str_replace("@ALMACEN@", $lineas_ped[$almacen]["nom_alm"], $var_csv);
            $var_csv = str_replace("@CALLE@", $lineas_ped[$almacen]["dire_alm"], $var_csv);
            $var_csv = str_replace("@TELEFONO@", $lineas_ped[$almacen]["tel_alm"], $var_csv);
            $var_csv = str_replace("@EMAIL@", $lineas_ped[$almacen]["email_alm"], $var_csv);
            $var_csv = str_replace("@TOTALCAJAS@", $lineas_ped[$almacen]["tot_cajas"], $var_csv);
            $var_csv = str_replace("@LINALISTADO@", $lineas_ped[$almacen]["linsped"], $var_csv); // sustituimos los lotes
            $var_csv = str_replace("@TOTALPARES@", $lineas_ped[$almacen]["canti_pares"], $var_csv);
            $var_csv = str_replace("@TOTALCANTIDAD@", str_replace(".", ",", $lineas_ped[$almacen]["precio_tot"]), $var_csv);


            $nombre_csv = date("YmdHis") . MetodosComunes::urlize($lineas_ped[$almacen]["nom_alm"]);
            $array_nombres["nombre"][] = $nombre_csv;
            $root = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
            $out = fopen($root . $nombre_csv . '.csv', 'a+');
            fwrite($out, $var_csv);
            fclose($out);
            ob_end_clean();
        } // foreach almacenes
        echo CJSON::encode($array_nombres);
        // return $retorno;
    }

// end function CSV


    public function actionGenerarCsvFF() {
        ob_start();
        $var_csv = '';
        $formulario = json_decode($_POST["array_peds"]);
        foreach ($formulario as $cosa => $valor) {
            $idPedido = $valor;
            $estadoLote = DocumentoVenta::model()->with('clienteVenta', 'direccionEnvio')->findByAttributes(array("idNTC_DocumentoVenta" => $idPedido));
            $lin_peds = LineaVenta::model()->findAllByAttributes(array("fkNTC_DocumentoVenta" => $estadoLote->idNTC_DocumentoVenta));
            // sacamos los detalles para montar el excel de cada pedido
           $lineas_ped=array();
            foreach ($lin_peds as $lin_ped) {
                $lotArt = LoteArticulo::model()->findByAttributes(array("fkNTC_Lote" => $lin_ped->fkNTC_Lote));

                // SACAMOS LOS DETALLES DE LA LINEA
                $articulo = $lotArt->fkNTC_Articulo;
                $Art = Articulo::model()->findByAttributes(array("idNTC_Articulo" => $articulo));
                $LoteArt = LoteArticulo::model()->findByAttributes(array("fkNTC_Articulo" => $articulo));
                $Lote = Lote::model()->findByAttributes(array("idNTC_Lote" => $LoteArt->fkNTC_Lote));
                $articulosLote = Lote::model()->obtenerTodosArticulosDeUnLote($LoteArt->fkNTC_Lote, false);
                $tallasLote = Lote::model()->tallas($LoteArt->fkNTC_Lote);
                $coloresLote = Lote::model()->colores($LoteArt->fkNTC_Lote);
                $fichero = Fichero::model()->findByAttributes(array("fkNTC_Articulo" => $LoteArt->fkNTC_Articulo));
                $precio = TarifaVenta::model()->findByAttributes(array("fkNTC_Articulo" => $LoteArt->fkNTC_Articulo));
                $precioDesc = DescuentoVenta::model()->findByAttributes(array("fkNTC_Articulo" => $LoteArt->fkNTC_Articulo,"Quitar"=>0));
                $Almac = Almacen::model()->findByAttributes(array("idNTC_Almacen" => $Art->fkNTC_Almacen));

                $data = Array();
                $data["idLote"] = $LoteArt->fkNTC_Lote;
                $data["artic"] = $LoteArt->fkNTC_Articulo;
                $data["NombreLote"] = $Art->Descripcion;
                $data["surtido_libre"] = $Lote->surtido_libre;

                $surtiti = "";

                if ($articulosLote[0]["surtido_libre"] == 1) {
                    $surtiti = MetodosComunes::sacar_tallas_lote_csv2($articulosLote);
                } else {
                    $tallasaux = Lote::model()->tallas($LoteArt->fkNTC_Lote);
                    $surtiti = $tallasaux[0] . " - " . $tallasaux[sizeof($tallasaux) - 1];
                }

                $data["Fichero"] = $fichero->Fichero;
                $data["PrecioVenta"] = $precio->PrecioVenta;
                $data["PrecioCoste"] = $precio->PrecioCoste;
                $data["ImporteDescuento"] = $precioDesc->ImporteDescuento;
                $data["Referencia"] = $Art->Referencia;
                $data["ReferenciaColor"] = $Art->ReferenciaColor;
                $data["ReferenciaInterna"] = $Art->ReferenciaProveedor;

                $Proveedor = $articulosLote[0]["Proveedor"];
                $prove = Almacen::model()->findByAttributes(array("idNTC_Almacen" => $Proveedor));
                $data["NombreProveedor"] = $Almac->Nombre;
                $data["Colores"] = $coloresLote;
                $data["surtidoLibre"] = $articulosLote[0]["surtido_libre"];
                foreach ($articulosLote as $arts) {
                    switch ($arts["Etiqueta"]) {
                        case "Tallaje":
                            break;
                    }
                }
                /*                 * ******* PESO ******** */
                $Pesos = ValorAtributo::model()->findByAttributes(array("fkNTC_Articulo" => $Art->idNTC_Articulo, "fkNTC_Atributo" => "6"));
                $pesAux = explode(",", $Pesos->Valor);
                $suelts = array();
                for ($i = 0; $i < count($pesAux); $i++) {
                    $suelts[] = explode("\"", $pesAux[$i]);
                }

                $peso = $suelts[3][3] . "." . $suelts[4][0];
                $alto = $suelts[0][3];
                $alto = str_replace("cm", "", $alto);
                $ancho = $suelts[1][3];
                $ancho = str_replace("cm", "", $ancho);
                $profundo = $suelts[2][3];
                $profundo = str_replace("cm", "", $profundo);
                $cubicaje = $cubicaje + ($alto / 100) * ($ancho / 100) * ($profundo / 100) * 110;
                $data["Peso"] = $cubicaje;
                $data["alto"] = $alto;
                $data["ancho"] = $ancho;
                $data["profundo"] = $profundo;
                $canti_pares = 0;

                $CantArts = LoteArticulo::model()->findAllByAttributes(array("fkNTC_Lote" => $LoteArt->fkNTC_Lote));

                // COMPOSICION
                $composiciones = ValorAtributo::model()->findByAttributes(array("fk" . Yii::app()->params['prefijoTablasBd'] . "Articulo" => $articulo, "fk" . Yii::app()->params['prefijoTablasBd'] . "Atributo" => 5));
                $compo_zapa = $composiciones->Valor;
                $composicion = explode("\"", $compo_zapa);
                $empeine = array();
                $forro = array();
                $suela = array();
                $empeine = $composicion[3];
                $forro = $composicion[7];
                $suela = $composicion[11];

                foreach ($CantArts as $cantArt) {
                    //echo "*".$cantArt->Variante->Quitar."-".$cantArt->Cantidad."*";
                    if ($cantArt->Variante !== NULL)
                        $canti_pares = $canti_pares + $cantArt->Cantidad;
                }
                $precioReal = 0;
                if (floatval($data["ImporteDescuento"]) > 0 && floatval($data["ImporteDescuento"]) < floatval($data["PrecioVenta"])) {
                    $precioReal = $canti_pares * $data["ImporteDescuento"];
                    $precioVenta = $data["ImporteDescuento"];
                } else {
                    $precioReal = $canti_pares * $data["PrecioVenta"];
                    $precioVenta = $data["PrecioVenta"];
                }
                // MONTAMOS LAS LINEAS DE PEDIDO
                $lineas_ped[$almacen_act]["linsped"] .= '"'
                        . $data["alto"] . ' x ' . $data["ancho"] . ' x ' . $data["profundo"] . '","'
                        . $surtiti . '","'
                        . $empeine . '","'
                        . $forro . '","'
                        . $suela . '","'
                        . $data["Referencia"] . '","'
                        . $data["ReferenciaInterna"] . '","'
                        . $data["ReferenciaColor"] . '","'
                        . $lin_ped->Cantidad . '","'
                        . ($canti_pares) . '","'
                        . str_replace(".", ",", $precioVenta) . '","'
                        . str_replace(".", ",", $data["PrecioCoste"]) . '","'
                        . str_replace(".", ",", ($canti_pares * $precioVenta * $lin_ped->Cantidad)) . '" 
'
                ;
                // DATOS DEL ALMACEN
                $lineas_ped[$almacen_act]["canti_pares"] += $canti_pares * $lin_ped->Cantidad;
                $lineas_ped[$almacen_act]["precio_tot"] += ($canti_pares * $precioVenta * $lin_ped->Cantidad);
                $lineas_ped[$almacen_act]["tot_cajas"] += $lin_ped->Cantidad;
            }

            $var_csv = '
PEDIDO,"@PEDIDO@",,,,,,,,,
,,,,,,,,,,
Email,"@EMAIL@",,,,,,,,,
Cliente,"@CLIENTE@",,,,,,,,,
NIF/CIF,"@NIF@",,,,,,,,,
Teléfono,"@TELEFONOFAC@",,,,,,,,,
País,"@PAISFAC@",,,,,,,,,
Provincia,"@PROVINCIAFAC@",,,,,,,,,
Localidad,"@LOCALIDADFAC@",,,,,,,,,
Dirección Facturación,"@DIRFAC@",,,,,,,,,
Código Postal,"@CPFAC@",,,,,,,,,
,,,,,,,,,,
Etiqueta,"@ETIQUETA@",,,,,,,,,
Destinatario,"@DESTINATARIO@",,,,,,,,,
Teléfono,"@TELEFONOENV@",,,,,,,,,
País,"@PAISENV@",,,,,,,,,
Provincia,"@PROVINCIAENV@",,,,,,,,,
Localidad,"@LOCALIDADENV@",,,,,,,,,
Dirección Envío,"@DIRENV@",,,,,,,,,
Código Postal,"@CPENV@",,,,,,,,,
,,,,,,,,,,
MEDIDAS CAJA,SURTIDO,EMPEINE,FORRO,SUELA,REF. INTERNA,REF. PROVEEDOR,REF. COLOR,CAJAS,PARES/CAJA,PRECIO UNIDAD,PRECIO COSTE, PRECIO LOTE
@LINALISTADO@
Total Cajas,@TOTALCAJAS@,,,,,,,,,,SUBTOTAL,"@TOTALCANTIDAD@"
Total Pares,@TOTALPARES@,,,,,,,,,,PORTES,"@PORTESDV@"
Porcentaje IVA,"@PCIVA@",,,,,,,,,,Logistica y Almacenamiento,"@LOGALM@"
Agencia,"@AGENCIA@",,,,,,,,,,IVA,"@IVADV@"
,,,,,,,,,,,
,,,,,,,,,,,Recargo contrarreembolso,"@RECARGO@"
,,,,,,,,,,,,
Telefono Agencia,"@TELEFONOAGENCIA@",,,,,,,,,,TOTAL,"@TOTALDV@"
Forma de Pago,"@FPAGO@",,,,,,
IMPORTE A AÑADIR PARA CONTRAREEMBOLSO,"@IMPCR@",,,,,,,
Observaciones,"@OBSERV@",,,,,
Peso,"@PESO@",,,,,
Pedido desde ,"@LOOK@",,,,,
,,,,,,,,,,
,,,,,,,,,,

';

            $stores = array();
            $criteria = new CDbCriteria();
            $criteria->condition = "Quitar = 0";
            $marcasAl = MarcaAlmacen::model()->findAllByAttributes(array("fkNTC_Almacen" => $almacen));
            foreach ($marcasAl as $marcaAl) {
                if ($marcaAl->Marca->Quitar == 0) {
                    $stores[] = $marcaAl->Marca->Nombre;
                }
            }

            $totalG = (($estadoLote->Importe + $estadoLote->ImportePortesSI + $estadoLote->ImporteRecargo) + ((($estadoLote->Importe + $estadoLote->ImportePortesSI) * $estadoLote->PcIVA) / 100));

            $list_stores = implode(", ", $stores);



            $var_csv = str_replace("@PEDIDO@", $estadoLote->Numero, $var_csv);

            $var_csv = str_replace("@EMAIL@", $estadoLote->clienteVenta->Email, $var_csv);
            $var_csv = str_replace("@CLIENTE@", $estadoLote->NombreCliente, $var_csv);
            $var_csv = str_replace("@NIF@", $estadoLote->clienteVenta->NIF, $var_csv);
            $var_csv = str_replace("@TELEFONOFAC@", $estadoLote->DireccionFactura->Telefono, $var_csv);
            $var_csv = str_replace("@PAISFAC@", $estadoLote->PaisFactura, $var_csv);
            $var_csv = str_replace("@PROVINCIAFAC@", $estadoLote->ProvinciaFactura, $var_csv);
            $var_csv = str_replace("@LOCALIDADFAC@", $estadoLote->LocalidadFactura, $var_csv);
            $var_csv = str_replace("@DIRFAC@", $estadoLote->DireccionFactura, $var_csv);
            $var_csv = str_replace("@CPFAC@", $estadoLote->CodPostalFactura, $var_csv);

            $var_csv = str_replace("@ETIQUETA@", $estadoLote->direccionEnvio->Alias, $var_csv);
            $var_csv = str_replace("@DESTINATARIO@", $estadoLote->direccionEnvio->Destinatario, $var_csv);
            $var_csv = str_replace("@TELEFONOENV@", $estadoLote->direccionEnvio->Telefono, $var_csv);
            $var_csv = str_replace("@PAISENV@", $estadoLote->direccionEnvio->pais->Nombre, $var_csv);
            $var_csv = str_replace("@PROVINCIAENV@", $estadoLote->direccionEnvio->Provincia, $var_csv);
            $var_csv = str_replace("@LOCALIDADENV@", $estadoLote->direccionEnvio->Localidad, $var_csv);
            $var_csv = str_replace("@DIRENV@", $estadoLote->direccionEnvio->Direccion, $var_csv);
            $var_csv = str_replace("@CPENV@", $estadoLote->direccionEnvio->CodigoPostal, $var_csv);

            $var_csv = str_replace("@MARCAS@", $list_stores, $var_csv);
            $var_csv = str_replace("@TOTALCAJAS@", $lineas_ped[$almacen]["tot_cajas"], $var_csv);
            $var_csv = str_replace("@LINALISTADO@", $lineas_ped[$almacen]["linsped"], $var_csv); // sustituimos los lotes
            $var_csv = str_replace("@TOTALPARES@", $lineas_ped[$almacen]["canti_pares"], $var_csv);

            $var_csv = str_replace("@TOTALCANTIDAD@", number_format($estadoLote->ImporteSLA, 2, ',', ''), $var_csv);
            $var_csv = str_replace("@PORTESDV@", number_format($estadoLote->ImportePortesSI, 2, ',', ''), $var_csv);
            $var_csv = str_replace("@IVADV@", number_format(((($estadoLote->Importe + $estadoLote->ImportePortesSI) * $estadoLote->PcIVA) / 100), 2, ',', ''), $var_csv);
            $var_csv = str_replace("@TOTALDV@", number_format($totalG, 2, ',', ''), $var_csv);
            $var_csv = str_replace("@IMPCR@", number_format($estadoLote->ImpCR, 2, ',', ''), $var_csv);
            $var_csv = str_replace("@RECARGO@", number_format($estadoLote->ImporteRecargo, 2, ',', ''), $var_csv);
            $var_csv = str_replace("@LOGALM@", number_format($estadoLote->LogAlm, 2, ',', ''), $var_csv);
            $var_csv = str_replace("@AGENCIA@", $estadoLote->NombreAgencia, $var_csv);
            $var_csv = str_replace("@TELEFONOAGENCIA@", $estadoLote->TelefonoAgencia, $var_csv);
            $var_csv = str_replace("@OBSERV@", $estadoLote->Comentario, $var_csv);
            $var_csv = str_replace("@PCIVA@", $estadoLote->PcIVA, $var_csv);
            $var_csv = str_replace("@FPAGO@", $estadoLote->formaPago->Nombre, $var_csv);
            $var_csv = str_replace("@PESO@", number_format($estadoLote->Peso, 2, ',', '') . " Kg", $var_csv);

            if ($estadoLote->Look > 0) {
                $var_csv = str_replace("@LOOK@", 'La Trastienda de Calzado', $var_csv);
            } else {
                $var_csv = str_replace("@LOOK@", 'Pol?ono de Carr?s', $var_csv);
            }

            $nombre_csv = $estadoLote->Numero;
            $array_nombres["nombre"][] = $nombre_csv;
            $root = $_SERVER['DOCUMENT_ROOT'] . "/uploads/";
            $out = fopen($root . $nombre_csv . '.csv', 'w+');
            fwrite($out, utf8_decode($var_csv));
            fclose($out);
            ob_end_clean();
        }

        echo CJSON::encode($array_nombres);
    }

// end function CSV

    public function actionUpdate_material() {
        $formulario = json_decode($_POST["materiales"]);
        $idArticulo = $_POST["articulo"];
        $linea = $_POST["linea"];
        //die(F::pre($formulario->Empeine[0]));

        $artic = ValorAtributo::model()->findByAttributes(array("idNTC_ValorAtributo" => $linea, "fkNTC_Articulo" => $idArticulo));
        if (sizeof($artic) > 0) {

            $artic->Valor = '{"Empeine":"' . $formulario->Empeine[0] . ',' . $formulario->Empeine[1] . '", "Forro":"' . $formulario->Forro[0] . ',' . $formulario->Forro[1] . '", "Suela":"' . $formulario->Suela[0] . ',' . $formulario->Suela[1] . '"}';
            try {
                if (!$artic->save()) {
                    throw new Exception("No se ha podido actualizar los materiales");
                }
            } catch (Exception $ex) {
                echo $ex->getMessage();
            } // end try
        }// end if

        return true;
    }

// end function update_material
}

// end controller
