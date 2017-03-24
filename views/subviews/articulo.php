<style>
   #capa_materiales { width:98%; background-color: white; position: relative; min-height: 20px; border-bottom: 1px solid #ccc; padding:10px; border:1px solid #ccc; margin-top:80px; }
   #capa_materiales h1 { background-color: white; padding:15px 20px; border-radius: 10px 10px 0 0 ; position: absolute; top:-47px; left:-1px; border:1px solid #ccc; border-bottom: 0px; }
   #capa_materiales h2 { margin-bottom: 10px;}
   #capa_materiales h1:hover { cursor: pointer; }
   #capa_materiales article { display: inline-block; overflow: hidden; margin-right:30px; padding:10px; }
   #capa_materiales article ul { float: left; margin-right:30px; }
</style>
<script>
    function mostrar(id){
        $("#lisPed_"+id).slideToggle();
    }
</script>
<?php 
      $obj = $model->valorAtributos[0];
      $coso = json_decode($obj->Valor);
      $empeine = explode(",", $coso->Empeine);
      $forro = explode(",", $coso->Forro);
      $suela = explode(",", $coso->Suela);
?>
<section id="bloque_contenido">
    <div id="errores" style="display:none"></div>
    <div id="capa_materiales">
        <h1 id="tit_mats">Materiales</h1>
        <article>
            <h2>Empeine</h2>
            <ul>
                <li><input class="marcadores" type="checkbox" id="empeine_cos_1" name="empeine_cos_1" value="Piel" <?php echo ($empeine[0] == "Piel") ? "checked='checked'" : "" ; ?>/> Piel </li>
                <li><input class="marcadores" type="checkbox" id="empeine_cos_2" name="empeine_cos_1" value="Tela" <?php echo ($empeine[0] == "Tela") ? "checked='checked'" : "" ; ?>/> Tela </li>
                <li><input class="marcadores" type="checkbox" id="empeine_cos_3" name="empeine_cos_1" value="Otros" <?php echo (MetodosComunes::urlize($empeine[0]) == "sintetico" || $empeine[0] == "Otros") ? "checked='checked'" : "" ; ?>/> Sint&eacute;tico </li>
                <li><input class="marcadores" type="checkbox" id="empeine_cos_4" name="empeine_cos_1" value="Ninguno" <?php echo ($empeine[0] == "Ninguno") ? "checked='checked'" : "" ; ?>/> Ninguno </li>
            </ul>
            <ul>
                <li><input class="marcadores" type="checkbox" id="empeine_dos_1" name="empeine_cos_2" value="Piel" <?php echo ($empeine[1] == "Piel") ? "checked='checked'" : "" ; ?>/> Piel </li>
                <li><input class="marcadores" type="checkbox" id="empeine_dos_2" name="empeine_cos_2" value="tela" <?php echo ($empeine[1] == "Tela") ? "checked='checked'" : "" ; ?>/> Tela </li>
                <li><input class="marcadores" type="checkbox" id="empeine_dos_3" name="empeine_cos_2" value="Otros" <?php echo (MetodosComunes::urlize($empeine[1]) == "sintetico" || $empeine[1] == "Otros") ? "checked='checked'" : "" ; ?> /> Sint&eacute;tico </li>
                <li><input class="marcadores" type="checkbox" id="empeine_dos_4" name="empeine_cos_2" value="Ninguno" <?php echo ($empeine[1] == "Ninguno") ? "checked='checked'" : "" ; ?>/> Ninguno </li>            </ul>
        </article>
        <article>
            <h2>Forro</h2>
            <ul>
                <li><input class="marcadores" type="checkbox" id="forro_cos_1" name="forro_cos_1" value="Piel" <?php echo ($forro[0] == "Piel") ? "checked='checked'" : "" ; ?>/> Piel </li>
                <li><input class="marcadores" type="checkbox" id="forro_cos_2" name="forro_cos_1" value="Tela" <?php echo ($forro[0] == "Tela") ? "checked='checked'" : "" ; ?>/> Tela </li>
                <li><input class="marcadores" type="checkbox" id="forro_cos_3" name="forro_cos_1" value="Otros" <?php echo (MetodosComunes::urlize($forro[0]) == "sintetico" || $forro[0] == "Otros") ? "checked='checked'" : "" ; ?>/> Sint&eacute;tico </li>
                <li><input class="marcadores" type="checkbox" id="forro_cos_4" name="forro_cos_1" value="Ninguno" <?php echo ($forro[0] == "Ninguno") ? "checked='checked'" : "" ; ?>/> Ninguno </li>
            </ul>
            <ul>
                <li><input class="marcadores" type="checkbox" id="forro_dos_1" name="forro_cos_2" value="Piel" <?php echo ($forro[1] == "Piel") ? "checked='checked'" : "" ; ?>/> Piel </li>
                <li><input class="marcadores" type="checkbox" id="forro_dos_2" name="forro_cos_2" value="tela" <?php echo ($forro[1] == "Tela") ? "checked='checked'" : "" ; ?>/> Tela </li>
                <li><input class="marcadores" type="checkbox" id="forro_dos_3" name="forro_cos_2" value="Otros" <?php echo (MetodosComunes::urlize($forro[1]) == "sintetico" || $forro[1] == "Otros") ? "checked='checked'" : "" ; ?> /> Sint&eacute;tico </li>
                <li><input class="marcadores" type="checkbox" id="forro_dos_4" name="forro_cos_2" value="Ninguno" <?php echo ($forro[1] == "Ninguno") ? "checked='checked'" : "" ; ?>/> Ninguno </li>            </ul>
        </article>
        <article>
            <h2>Suela</h2>
            <ul>
                <li><input class="marcadores" type="checkbox" id="suela_cos_1" name="suela_cos_1" value="Piel" <?php echo ($suela[0] == "Piel") ? "checked='checked'" : "" ; ?>/> Piel </li>
                <li><input class="marcadores" type="checkbox" id="suela_cos_2" name="suela_cos_1" value="Tela" <?php echo ($suela[0] == "Tela") ? "checked='checked'" : "" ; ?>/> Tela </li>
                <li><input class="marcadores" type="checkbox" id="suela_cos_3" name="suela_cos_1" value="Otros" <?php echo (MetodosComunes::urlize($suela[0]) == "sintetico" || $suela[0] == "Otros") ? "checked='checked'" : "" ; ?>/> Sint&eacute;tico </li>
                <li><input class="marcadores" type="checkbox" id="suela_cos_4" name="suela_cos_1" value="Ninguno" <?php echo ($suela[0] == "Ninguno") ? "checked='checked'" : "" ; ?>/> Ninguno </li>
            </ul>
            <ul>
                <li><input class="marcadores" type="checkbox" id="suela_dos_1" name="suela_cos_2" value="Piel" <?php echo ($suela[1] == "Piel") ? "checked='checked'" : "" ; ?>/> Piel </li>
                <li><input class="marcadores" type="checkbox" id="suela_dos_2" name="suela_cos_2" value="tela" <?php echo ($suela[1] == "Tela") ? "checked='checked'" : "" ; ?>/> Tela </li>
                <li><input class="marcadores" type="checkbox" id="suela_dos_3" name="suela_cos_2" value="Otros" <?php echo (MetodosComunes::urlize($suela[1]) == "sintetico" || $suela[1] == "Otros") ? "checked='checked'" : "" ; ?> /> Sint&eacute;tico </li>
                <li><input class="marcadores" type="checkbox" id="suela_dos_4" name="suela_cos_2" value="Ninguno" <?php echo ($suela[1] == "Ninguno") ? "checked='checked'" : "" ; ?>/> Ninguno </li>            </ul>
        </article>
    </div>
</section>
<script>
    $(window).on("load", function(e){
   
        $(".imgcheck").on("click", function(){
            var obj = $(this);
            var objId = $(this).prop("id");
            var id = objId.substr(0, (objId.length)-4);
            var idAlt = objId.substr(0, (objId.length)-5);
            //alert($("#"+id).val());
            
            var i;
            for (i = 1; i <= 4; i++) { 
               $("#"+idAlt+i).prop("checked", false);
               $("#"+idAlt+i+"_img").prop("src", "<?php echo Yii::$app->baseUrl?>/themes/interclick/images/check_off.png");
            }
            $("#"+id).prop("checked", true);
            obj.prop("src", "<?php echo Yii::$app->baseUrl?>/themes/interclick/images/check_on.png");
            
            var materiales = {"Empeine":[
                                            $( "input:checkbox[name=empeine_cos_1]:checked" ).val(),
                                            $( "input:checkbox[name=empeine_cos_2]:checked" ).val()
                                        ]
                            , "Forro":[
                                            $( "input:checkbox[name=forro_cos_1]:checked" ).val(),
                                            $( "input:checkbox[name=forro_cos_2]:checked" ).val()
                                        ]
                            , "Suela":[
                                            $( "input:checkbox[name=suela_cos_1]:checked" ).val(),
                                            $( "input:checkbox[name=suela_cos_2]:checked" ).val()
                                        ]
                            }

            var jsonText = JSON.stringify(materiales);
            var parametroscar = {
                    "materiales": jsonText,
                    "articulo": <?php echo $model->idNTC_Articulo ?>,
                    "linea": <?php echo $obj->idNTC_ValorAtributo ?>
                }
                $.ajax({
                    data: parametroscar,
                    url: '<?php echo Yii::$app->baseUrl?>/es-ES/ajax/update_material',
                    type: 'post',
                    success: function(response) {
                         if (response.length > 0){
                             $("#errores").html("<p style='color:red; padding:10px'>"+response+"</p>");
                             //$("#errores").html("<p style='color:red; padding:10px'>Ha ocurrido un error al guardar los materiales</p>");
                             $("#errores").fadeIn(1000).delay( 2000 ).fadeOut(1000);
                         }
                    }
                });
                
        });
    });
    $("#tramit").on("click", function(){
        var $b = $('input[type=checkbox]');

        var i = 0;
        $("input:checkbox:checked").each(function(){
            //cada elemento seleccionado
            var str = $(this).attr("id");
            if (str.substr(0, 7) == "pedido_"){
                i += 1;
            }
        });
        var pedi = new Array(i);
        var i = 0;
        $("input:checkbox:checked").each(function(){
            //cada elemento seleccionado
            var str = $(this).attr("id");
            if (str.substr(0, 7) == "pedido_"){
                var idPedi = parseInt(str.substr(7));
                pedi[i] = idPedi;
                $("#"+idPedi).css("background-color", "#BAD3F1");
                i += 1;
            }
        });
        var jsonText = JSON.stringify(pedi);
        var parametroscar = {
                    "array_peds": jsonText,
                };
                $.ajax({
                    data: parametroscar,
                    url: '<?php echo Yii::$app->baseUrl?>/es-ES/ajax/actu_tramitar_array',
                    type: 'post',
                    success: function(response) {
                        $("input:checkbox:checked").each(function(){
                                //cada elemento seleccionado
                                var str = $(this).attr("id");
                                var idPedi = parseInt(str.substr(7));
                                $("#"+idPedi).fadeOut();
                        });// end each input checkbox
                    }
                });
    });
</script>
