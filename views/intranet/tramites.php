<style>
    .mio tr:nth-of-type(2n+1) {
        background-color:#F8F8F8 !important;
    }
    .mio > tr { border-bottom: 1px solid #ccc;}
    .ocul { display:none; width:100%; }
    .tits_cabs { font-weight:bold;  border-bottom:1px solid #ccc; }
    .despleEstado { background-color: transparent; border:0px;}
    .det_tab { margin-left:83px; }
    .termometro { height:23px; border:1px solid #ccc; border-radius: 5px; overflow:hidden; background-color:#E37F7F; background-position:-360px -50px; margin-right:10px; }
    .mercurio { width:0px; height:100%; border:0px; transition: width ease-out 2s; background-color:#BBD633; background-position:-50px -50px; }
    .fondo-lila { background-color:#907FD3; color:#fff;  }
    .odd { transition: background-color 0.5s ease; }
</style>

<style>
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
        float: left;
    }
    .row_tallaje{
        text-align: left;
    }
</style>

<script>
    function mostrar(id) {
        $("#lisPed_" + id).slideToggle();
    }
</script>
<section id="bloque_contenido">
    <section id="contenido">
        <div id="buscador_listado" class="grid-view">
            <div style="margin-bottom:15px;">
                <a href="../../documentoVenta/mod_148" class="boton fondo-azul" id=""> < Ver pedidos pendientes de tramitar</a>
                <span class="boton fondo-azul" id="tramit">Poner marcados en pedidos pendientes</span>
                <span class="boton fondo-lila" id="export">Exportar pedidos marcados</span>
                <span class="boton fondo-lila" id="export2">Exportar pedidos marcados impresion</span>
            </div>
            <table class="items">
                <tbody class="mio">
                <th>
                <td></td>
                <td>Marcar</td>
                <td>Trast</td>
                <td>Pedido</td>
                <td>Fecha</td>
                <td>Tipo de pago</td>
                <td>Estado</td>
                <td>Cliente</td>
                <td>R. E.</td>
                <td>Logística</td>
                <td>Subtotal</td>
                <td>Portes</td>
                <td>IVA</td>
                <td>R. P.</td>
                <td>Total</td>
                <td>Total progreso</td>
                </th>
                <?php
                
                foreach ($pedidos as $pedido) {
                    $lin_peds = $pedido->lineas;
                    echo '<tr class="odd" id="' . $pedido->idNTC_DocumentoVenta . '">';
                    echo '<td><span class="boton fondo-azul" onclick="mostrarplus(\'' . $pedido->idNTC_DocumentoVenta . '\')">Ver</span></td>';
                    echo '<td><span class="boton fondo-azul" onclick="window.location=\'' . "../../documentoVenta/mod_148/" . $pedido->idNTC_DocumentoVenta . '\'">Detalle</span></td>';

                    echo '<td><input type="checkbox" id="pedido_' . $pedido->idNTC_DocumentoVenta . '" name="pedido_' . $pedido->idNTC_DocumentoVenta . '" /></td>';
                    if ($pedido->Look > 0) {
                        $equiv = '<img src="' . Yii::app()->getTheme()->getBaseUrl() . '/images/valido.png" />';
                    } else {
                        $equiv = '';
                    }
                    echo '<td>' . $equiv . '</td>';
                    echo '<td>' . $pedido->Numero . '</td><td>' . $pedido->Fecha . '</td>';
                    echo '<td>' . $pedido->formaPago->Nombre . '</td>';

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
                    $equivc = $pedido->clienteVenta;
                    if ($equivc->fkNTC_ConfiguracionIva == 3) {
                        $equiv = '<img src="' . Yii::app()->getTheme()->getBaseUrl() . '/images/valido.png" />';
                    } else {
                        $equiv = '';
                    }
                    echo '<td>' . $equiv . '</td>';
                    echo '<td>' . number_format($pedido->LogAlm, 2, ",", ".") . '&euro;</td>';
                    echo '<td>' . number_format($pedido->ImporteSLA, 2, ",", ".") . '&euro;</td>';
                    echo '<td>' . number_format($pedido->ImportePortesSI, 2, ",", ".") . '&euro;</td>';
                    echo '<td>' . number_format((floatval($pedido->ImportePortes) - floatval($pedido->ImportePortesSI) + (floatval($pedido->ImporteIvaIncl) - floatval($pedido->Importe))), 2, ",", ".") . '&euro;</td>';
                    echo '<td>' . number_format(floatval($pedido->ImporteRecargo), 2, ",", ".") . '&euro;</td>';

                    $pasta = $pedido->ImportePortes + $pedido->ImporteIvaIncl + ($pedido->ImporteRecargo);

                    echo '<td>' . number_format($pedido->Total, 2, ",", ".") . '&euro;</td>';
                    if ($pedido->EnviadoCompletamente != 0) {
                        $porcent = round(($pedido->EnvioParcial / $pedido->EnviadoCompletamente) * 100);
                    } else {
                        $porcent = 0;
                    }
                    echo '<td>
                <div class="termometro">
                        <div class="mercurio" meta-porc="' . $porcent . '%" id="merc_' . $pedido->idNTC_DocumentoVenta . '"></div>
                </div>
              </td>';
                    echo '</tr>';
                    echo '<tr class="ocul" id="lisPed_' . $pedido->idNTC_DocumentoVenta . '">';
                    echo '<td colspan="8">';
                    echo '<div class="det_tab">'
                    . '<table style="width:100%">';
                    echo '<tr class="tits_cabs">';
                    echo '<td>Recibido</td>';
                    echo '<td>Nombre</td>';
                    echo '<td>Referencia</td>';
                    echo '<td>Cantidad</td>';
                    echo '<td>Almacen</td>';
                    echo '</tr>';
                    foreach ($lin_peds as $lin_ped) {
                        //$arti = $lin_ped->lote->Lotes->Articulo;               
                        echo '<tr>';
                        $select = "";
                        if ($lin_ped->CantidadEnviada == 1) {
                            $select = " checked = 'checked'";
                        }
                        echo '<td><input type="checkbox" id="recibido_pedido_' . $lin_ped->idNTC_LineaVenta . '" name="recibido_pedido_' . $pedido->idNTC_DocumentoVenta . '" class="linped" ' . $select . '/></td>';
                        echo '<td>' . ($lin_ped->Descripcion) . '</td>';
                        //echo '<td>'.($arti->Referencia).'</td>';
                        echo '<td>' . ($lin_ped->Cantidad) . '</td>';
                        //echo '<td>'.($arti->intraalmacen->Nombre).'</td>';          
                        echo '</tr>';
                    }
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
    // guardar pedido recibido
    $(".tramitar").click(function () {
        var idPedido = $(this).attr("id").substring(5);
        $("#" + idPedido).css("background-color", "#BAD3F1");
        var parametroscar = {
            "idPedido": idPedido,
        };
        $.ajax({
            data: parametroscar,
            url: '<?php echo Yii::app()->baseUrl ?>/es-ES/ajax/actu_destramitar',
            type: 'post',
            beforeSend: function () {
            },
            success: function (response) {
                $("#" + idPedido).fadeOut();
            }
        });
        url = $(this).attr("href");
        window.open(url, '_blank');
    });
    /*************************** destramitar *************************/
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
            url: '<?php echo Yii::app()->baseUrl ?>/es-ES/ajax/actu_destramitar_array',
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
    /*************************** exportar *************************/
    $("#export").on("click", function () {
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
            url: '<?php echo Yii::app()->baseUrl ?>/es-ES/ajax/generarCsv',
            type: 'post',
            dataType: "json",
            success: function (data) {
                if (data.nombre != null) {
                    //Inserta los valores recuperados en la lista desplegable
                    $.each(data.nombre, function (i, value) {
                        window.open("<?php echo Yii::app()->baseUrl ?>/../download/?file=" + value + ".csv", "_blank");
                    });
                } // end if data
            }// end if success
        }); // end ajax
    });

    /*************************** exportar *************************/
    $("#export2").on("click", function () {
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
            url: '<?php echo Yii::app()->baseUrl ?>/es-ES/ajax/generarCsvFF',
            type: 'post',
            dataType: "json",
            success: function (data) {
                if (data.nombre != null) {
                    //Inserta los valores recuperados en la lista desplegable
                    $.each(data.nombre, function (i, value) {
                        window.open("<?php echo Yii::app()->baseUrl ?>/../download/?file=" + value + ".csv", "_blank");
                    });
                } // end if data
            }// end if success
        }); // end ajax
    });

    $(window).on("load", function () {
        $(".mercurio").each(function (index) {
            $(this).css("width", $(this).attr("meta-porc"));
        })
    });

</script>
<script>
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
                $(".imgcheck").unbind('click');
                $(".imgcheck").bind('click', function () {

                    var check = "#" + $(this).prop("id");
                    check = check.replace("_img", "");
                    if ($(check).attr("checked") == false || $(check).attr("checked") == undefined)
                    {
                        $(this).attr("src", ruta + "/themes/interclick/images/check_on.png");
                        $(check).attr("checked", true);
                    }
                    else
                    {
                        $(this).attr("src", ruta + "/themes/interclick/images/check_off.png");
                        $(check).attr("checked", false);
                    }

                    var idPedido = $(this).attr("id").substring(16);
                    idPedido = idPedido.replace("_img", "");
                    var parametroscar = {
                        "idPedido": idPedido,
                        "valor": $("#recibido_pedido_" + idPedido + ":checked").val(),
                    };
                    $.ajax({
                        data: parametroscar,
                        url: '<?php echo Yii::app()->baseUrl ?>/es-ES/ajax/actu_linea_tramitar',
                        type: 'post',
                        beforeSend: function () {
                        },
                        success: function (response) {
                            // $("#"+idPedido).fadeOut();
                            var obj = jQuery.parseJSON(response);
                            $("#merc_" + obj.pedido).css("width", obj.porcent + "%");
                        }
                    });

                });
            },
        });

    }
</script>