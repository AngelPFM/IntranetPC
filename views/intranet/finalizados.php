<style>
    .mio tr:nth-of-type(2n+1) {
        background-color:#F8F8F8 !important;
    }
    .mio > tr { border-bottom: 1px solid #ccc;}
    .ocul { display:none; width:100%; }
    .tits_cabs { font-weight:bold;  border-bottom:1px solid #ccc; }
    .despleEstado { background-color: transparent; border:0px;}
    .det_tab { margin-left:83px; }

    .tabla_especificaciones:last-child {
        border-bottom: 0
    }
    .tabla_especificaciones {
        overflow: hidden;
        margin: 0
    }
    .tabla {
        display: table;
        width: 100%
    }
    .tabla .row {
        display: table-row;
        text-align: center
    }
    .tabla .row .celda {
        display: table-cell;
        overflow: hidden;
        vertical-align: top;
        border-bottom: 1px solid #d0d0d0;
        border-right: 1px solid #d0d0d0;
        padding: 15px 0;

    }
    .tabla .row .celda .tallaje,.tabla .row .celda .tallaje_detalle {
        border-top: 0;
        padding-top: 0;
        width: inherit
    }
    .tabla .row .celda h1 {
        font-size: 12px;
        color: #333;
        margin: 0;
        padding: 0
    }
    .tabla .row .celda p {
        font-size: 12px;
        margin: 10px;
        color: #444
    }

    .tabla {
        display: table;
        width: 100%
    }
    .tabla .row {
        display: table-row;
        text-align: center
    }
    .tabla .row .celda {
        display: table-cell;
        overflow: hidden;
        vertical-align: top;
        border-bottom: 1px solid #d0d0d0;
        border-right: 1px solid #d0d0d0;
        padding: 15px 0
    }
    .tabla .row .celda .tallaje,.tabla .row .celda .tallaje_detalle {
        border-top: 0;
        padding-top: 0;
        width: inherit
    }
    .tabla .row .celda h1 {
        font-size: 16px!important;
        color: #333;
        margin: 0;
        padding: 0
    }
    .tabla .row .celda p {
        font-size: 12px;
        margin: 10px;
        color: #444
    }
    .fila_modal {
        width: 100%;
        overflow: hidden;
        clear: both;
        padding: 15px;
    }

    .logistico_resumen {
        color: #444;
        font-size: 14px;
        line-height: 7px;
        font-family: 'Questrial', sans-serif;
        float: left;
        text-align: left;
    }

    .resumen_log_precios {
        border-top: 0;
        float: right;
        font-size: 14px;
        font-family: 'Questrial', sans-serif;
        color: #444;
        margin-right: 40px;
    }

    p {
        display: block;
        -webkit-margin-before: 1em;
        -webkit-margin-after: 1em;
        -webkit-margin-start: 0px;
        -webkit-margin-end: 0px;
    }
    .resumen_log_precios p span:first-child {
        text-align: left!important;
        width: 110px;
        font-weight: 400;
    }
    .resumen_log_precios p span:last-child {
        text-align: right;
        width: 100px;
        float: right;
    }
    .bott {
        height: 25px;
        width: 35px!important;
        background-image: url(../../../imagenes/sprite.png);
        background-position: -155px 0;
        display: inline-block;
        vertical-align: middle;
        float: left;
        clear: left;
    }
    .sup {
        height: 25px;
        width: 35px!important;
        background-image: url(../../../imagenes/sprite.png);
        background-position: -92px 0;
        display: inline-block;
        vertical-align: middle;
        float: left;
        clear: left;
    }
    .mid {
        height: 25px;
        width: 35px!important;
        background-image: url(../../../imagenes/sprite.png);
        background-position: -124px 0;
        display: inline-block;
        vertical-align: middle;
        float: left;
        clear: left;
    }
    .rombo {
        background-image: url(../../../imagenes/sprite.png);
        background-position: -112px -25px;
        width: 30px;
        height: 25px;
        display: inline-block;
        vertical-align: middle;
        margin: 0;
        padding: 0;
    }

    .piel {
        background-image: url(../../../imagenes/sprite.png);
        background-position: -88px -24px;
        width: 30px;
        height: 25px;
        display: inline-block;
        vertical-align: middle;
        margin: 0;
        padding: 0;
    }
    .mate_detalle {
        border: 1px solid #d0d0d0!important;
        float: left;
        font-size: 0;
        margin: 0 0 0 22px;
    }
    .row_tallaje div{
        display:inline-block;
        padding:10px;
        width:25px;
        font-size: 14px;
    }
    .row_tallaje{
        text-align: left;
    }
</style>

<section id="bloque_contenido">
    <section id="contenido">
        <div id="buscador_listado" class="grid-view">          
            <table class="items">
                <tbody class="mio">
                    <tr>
                        <th></th>
                        <th></th>
                        <td>Trast</td>
                        <td>Pedido</td>
                        <td>Fecha</td>
                        <td>Tipo de pago</td>
                        <td>Estado</td>
                        <td>Cliente</td>
                        <td>Teléfono</td>
                        <td>R.E.</td>
                        <td>Logistica</td>
                        <td>Subtotal</td>
                        <td>Portes</td>
                        <td>IVA</td>
                        <td>R.P.</td>
                        <td>Total</td>
                    </tr>
                    <?php
                    
                    
                    
                    foreach ($pedidos as $pedido) {
                      echo '<tr class="odd" id="' . $pedido->idNTC_DocumentoVenta . '">';
                      echo '<td><span class="boton fondo-azul" onclick="mostrarplus(\'' . $pedido->idNTC_DocumentoVenta . '\')">Ver</span></td>';
                      echo '<td><span class="boton fondo-azul" onclick="window.location=\'' . "http://" . $_SERVER[HTTP_HOST] . $_SERVER[REQUEST_URI] . "/" . $pedido->idNTC_DocumentoVenta . '\'"><a href="#">Detalle</a></span></td>';

                      if ($pedido->Look>0) {
                      $equiv = '<img src="' . Yii::app()->getTheme()->getBaseUrl() . '/images/valido.png" />';
                      } else {
                      $equiv = '';
                      }
                      echo '<td>' . $equiv . '</td>';
                      echo '<td>' . $pedido->Numero . '</td><td>' . $pedido->Fecha . '</td>';
                      echo '<td>' . $pedido->terminosPago->Nombre . '</td>';

                      echo '<td><select id="estadopedido_' . $pedido->idNTC_DocumentoVenta . '" class="despleEstado">';
                      foreach ($estados as $estado) {
                      $selected = "";
                      if ($pedido->fkNTC_TipoEstadoPedido == $estado->idNTC_TipoEstadoPedido) {
                      $selected = "selected";
                      }
                      echo "<option value='" . $estado->idNTC_TipoEstadoPedido . "' " . $selected . ">" . $estado->Nombre . "</option>";
                      }
                      echo '</select></td>';
                      echo '<td>' . $pedido->NombreCliente . '</td>';
                      $equivc =$pedido->clienteVenta;
                      $teluw = $pedido->clienteVenta->usuarioWeb;
                      echo '<td>' . $teluw->Telefono . '</td>';
                      if ($equivc->fkNTC_ConfiguracionIva == 3) {
                      $equiv = '<img src="' . Yii::app()->getTheme()->getBaseUrl() . '/images/valido.png" />';
                      } else {
                      $equiv = '';
                      }
                      echo '<td>' . $equiv . '</td>';
                      echo '<td>' . number_format($pedido->LogAlm, 2, ",", ".") . '&euro;</td>';
                      echo '<td>' . number_format($pedido->ImporteSLA, 2, ",", ".") . '&euro;</td>';
                      echo '<td>' . number_format($pedido->ImportePortesSI, 2, ",", ".") . '&euro;</td>';
                      echo '<td>' . number_format(($pedido->ImportePortesSI + $pedido->Importe) * (($pedido->PcIVA / 100.00)), 2, ",", ".") . '&euro;</td>';
                      echo '<td>' . number_format(floatval($pedido->ImporteRecargo), 2, ",", ".") . '&euro;</td>';
                      $pasta = (($pedido->ImportePortesSI + $pedido->Importe) * (1.00 + ($pedido->PcIVA / 100.00))) + $pedido->ImporteRecargo;
                      echo '<td>' . number_format($pasta, 2, ",", ".") . '&euro;</td>';
                      echo '</tr>';
                      echo '<tr class="ocul" id="lisPed_' . $pedido->idNTC_DocumentoVenta . '">';
                      echo '<td colspan="7">';
                      echo '<div class="det_tab">'
                      . '<table>';
                      echo '<tr class="tits_cabs">';
                      echo '<td>Nombre</td>';
                      echo '<td>Referencia</td>';
                      echo '<td>Cantidad</td>';
                      echo '<td>Almacen</td>';
                      echo '</tr>';
                      echo '<tr>';
                      echo '</tr>';
                      echo '</table></div>';
                      echo '</td>';
                      echo '</tr>';
                      } 
                    ?>

                </tbody>
            </table>
        </div>
    </section>
</section>

<script>
    function mostrar(id) {
        $("#lisPed_" + id).slideToggle();
    }
    $("select").change(function () {
        var idPedido = $(this).attr("id").substring(13);
        var idEstado = $(this).val();
        var parametroscar = {
            "idPedido": idPedido,
            "idEstado": idEstado,
        };
        $.ajax({
            data: parametroscar,
            url: '<?php echo Yii::app()->request->baseUrl ?>/es-ES/ajax/actu_EstadoPedido',
            type: 'post',
            beforeSend: function () {
            },
            success: function (response) {

            }
        });

    });
    $(".tramitar").click(function () {
        var idPedido = $(this).attr("id").substring(5);
        $("#" + idPedido).css("background-color", "#BAD3F1");
        var parametroscar = {
            "idPedido": idPedido,
        };
        $.ajax({
            data: parametroscar,
            url: '<?php echo Yii::app()->baseUrl ?>/es-ES/ajax/actu_tramitar',
            type: 'post',
            beforeSend: function () {
            },
            success: function (response) {
                $("#" + idPedido).fadeOut();
            }
        });

    });
    $("#tramit").on("click", function () {
        var $b = $('input[type=checkbox]');

        var i = 0;
        $("input:checkbox:checked").each(function () {
            //cada elemento seleccionado
            var str = $(this).attr("id");
            if (str.substr(0, 7) == "pedido_") {
                i += 1;
            }
        });
        var pedi = new Array(i);
        var i = 0;
        $("input:checkbox:checked").each(function () {
            //cada elemento seleccionado
            var str = $(this).attr("id");
            if (str.substr(0, 7) == "pedido_") {
                var idPedi = parseInt(str.substr(7));
                pedi[i] = idPedi;
                $("#" + idPedi).css("background-color", "#BAD3F1");
                i += 1;
            }
        });
        var jsonText = JSON.stringify(pedi);
        var parametroscar = {
            "array_peds": jsonText,
        };
        $.ajax({
            data: parametroscar,
            url: '<?php echo Yii::app()->baseUrl ?>/es-ES/ajax/actu_tramitar_array',
            type: 'post',
            success: function (response) {
                $("input:checkbox:checked").each(function () {
                    //cada elemento seleccionado
                    var str = $(this).attr("id");
                    var idPedi = parseInt(str.substr(7));
                    $("#" + idPedi).fadeOut();
                });// end each input checkbox
            }
        });
    });
    function mostrarplus(idped) {
        $.ajax({
            data: {id: idped},
            url: '<?php Yii::app()->getBaseUrl()?>/intranet/es-ES/ajax/DetallePedido',
            type: 'post',
            beforeSend: function () {
            },
            success: function (response) {
                $('#lisPed_' + idped).html("<td  colspan='20'>" + response + "</td>");
                $('#lisPed_' + idped).slideToggle();
            }
        });

    }
</script>