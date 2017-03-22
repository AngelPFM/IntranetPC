				<?php 
					$acciones = Yii::app()->params->acciones;
				?>
				<span id="contenedor_marcar_todos"><span onclick="marcarPermisos()">Marcar todos</span> / <span onclick="desmarcarPermisos()">Desmarcar todos</span></span>
				<fieldset style="border:1px dotted #ccc; border-radius:5px; padding:10px;" class="contenedor_marcar_permisos_tipo">
					<legend>Seleccionar</legend>
					<fieldset style="border:1px dashed #ccc; border-radius:5px; padding:10px; margin:5px 20px 5px 0px; display:inline-block;">
						<legend style="margin:0;">View</legend>
						<span onclick="marcarPermisos('view')">Marcar todos</span> / <span onclick="desmarcarPermisos('view')">Desmarcar todos</span>
					</fieldset>
					<fieldset style="border:1px dashed #ccc; border-radius:5px; padding:10px; margin:5px 20px 5px 0px; display:inline-block;">
						<legend style="margin:0;">Index</legend>
						<span onclick="marcarPermisos('index')">Marcar todos</span> / <span onclick="desmarcarPermisos('index')">Desmarcar todos</span>
					</fieldset>
					<fieldset style="border:1px dashed #ccc; border-radius:5px; padding:10px; margin:5px 20px 5px 0px; display:inline-block;">
						<legend style="margin:0;">Update</legend>
						<span onclick="marcarPermisos('update')">Marcar todos</span> / <span onclick="desmarcarPermisos('update')">Desmarcar todos</span>
					</fieldset>
					<fieldset style="border:1px dashed #ccc; border-radius:5px; padding:10px; margin:5px 20px 5px 0px; display:inline-block;">
						<legend style="margin:0;">Create</legend>
						<span onclick="marcarPermisos('create')">Marcar todos</span> / <span onclick="desmarcarPermisos('create')">Desmarcar todos</span>
					</fieldset>
					<fieldset style="border:1px dashed #ccc; border-radius:5px; padding:10px; margin:5px 20px 5px 0px; display:inline-block;">
						<legend style="margin:0;">Delete</legend>
						<span onclick="marcarPermisos('delete')">Marcar todos</span> / <span onclick="desmarcarPermisos('delete')">Desmarcar todos</span>
					</fieldset>
				</fieldset>
				<fieldset style="border:1px dotted #ccc; border-radius:5px; padding:10px;">
					<legend>Acciones</legend>
					<?php 
					foreach( $acciones as $accion )
					{
						$tengoPermiso = false;
						foreach( $misAcciones as $miAccion )
						{
							if( $miAccion->Nombre == $accion )
							{
								$tengoPermiso = true;
								break;
							}
						}
						
						echo '<div style="margin:0px 5px; display:inline-block;">';
						$idModulo = 'id'.$modulo->tableName();
						echo CHtml::label($accion, 'chk_mod'.$modulo->$idModulo.'_'.$accion );
						echo CHtml::checkBox(
							'chk_mod'.$modulo->$idModulo.'_'.$accion, 
							$tengoPermiso,
							array('class'=>'chk_Accion escenario_'.$accion, 'value'=>$modulo->$idModulo . '.' . $rol . '.' . $accion)
						);
						echo '</div>';
					}
					?>
				</fieldset>
				<fieldset style="border:1px dotted #ccc; border-radius:5px; padding:10px;" id="contenedor_campos">
					<legend>Campos</legend>
					<input type="hidden" name="idModulo" value="<?=$modulo->$idModulo?>">
					<input type="hidden" name="idRol" value="<?=$rol?>">
					<?php
					$criterioOrden = new CDbCriteria();
					$criterioOrden->order = "Orden";
					$misCampos = Campo::model()->findAllByAttributes(array("Quitar"=>0, "fk".Yii::app()->params['prefijoTablasBd']."Modulo"=>$modulo->$idModulo, "fk".Yii::app()->params['prefijoTablasBd']."Rol"=>$rol), $criterioOrden);
					$camposModulo = $instancia->retornaMetaData();
					$campos = array();
					$labels = $instancia->attributeLabels();
					
					
					foreach($camposModulo["columns"] as $key=>$value)
					{
						array_push($campos, $key);
					}
// 					Yii::log("mis campos:".print_r($campos,1) );
					foreach($campos as $campo)
					{
						if( true || $campo != $instancia->getPkName() )
						{
							$label = (isset($labels[$campo]))?$labels[$campo]:$campo;
							$modCampo = Campo::model()->findByAttributes(array("Quitar"=>0, "fk".Yii::app()->params['prefijoTablasBd']."Modulo"=>$modulo->$idModulo, "fk".Yii::app()->params['prefijoTablasBd']."Rol"=>$rol, "Nombre"=>$campo));
							if($modCampo)
								$ordenCampo = $modCampo->Orden;
							else
								$ordenCampo = 9999;
					?>
							<fieldset style="border:1px dashed #ccc; border-radius:5px; padding:10px; margin:5px 20px 5px 0px; display:inline-block;background-color:#FFF;" orden="<?= $ordenCampo?>" campo="<?= $campo?>">
								<legend style="margin:0;"><?=$label?></legend>
					<?							
							$tengoPermiso = false;
							foreach(Yii::app()->params->escenarios as $escenario){
								$tengoPermiso = false;
								foreach($misCampos as $miCampo)
								{
									if( $miCampo->Nombre == $campo && $escenario == $miCampo->Escenario ){
										//echo "(Si##" . $escenario.") ";
										$tengoPermiso = true;
										break;	
									}
								}
								echo '<div style="display:inline-block; margin:0px 5px; text-align:center;">';
								echo CHtml::label($escenario, 'chk_mod'.$modulo->$idModulo.'_'.$campo . $escenario );
								echo CHtml::checkBox(
									'chk_mod'.$modulo->$idModulo.'_'.$campo . $escenario, 
									$tengoPermiso,
									array('class'=>'chk_Campo escenario_'.$escenario, 'value'=>$modulo->$idModulo . '.' . $rol . '.' . $campo.'.'.$escenario)
								);
								echo '</div>';
							}
					?>
							</fieldset>
					<? 
						}
					}
					?>
				</fieldset>
				<?php 
					Yii::app()->clientScript->registerScriptFile(Yii::app()->getTheme()->getBaseUrl()."/js/jquery-ui-1.10.3.sortable.min.js", CClientScript::POS_END);
					
					Yii::app()->clientScript->registerScript(
					'hacerSortable', "
						
						$('fieldset[orden]').wrap('<li></li>');
						$('#contenedor_campos li').wrapAll('<ul id=\"listado_sortable\"></ul>');
						
						function sortUnorderedList(mylist) {
							var listitems = mylist.children('li').get();
							listitems.sort(function(a, b) {
							   //return $(a).find('fieldset').attr('orden').localeCompare($(b).find('fieldset').attr('orden'));
								return $(a).find('fieldset').attr('orden') - $(b).find('fieldset').attr('orden');
							})
							$.each(listitems, function(idx, itm) { mylist.append(itm); });
						}
						
						sortUnorderedList($('#listado_sortable'))
						
						$('#listado_sortable').sortable({
						    stop: function(event, ui) {
					            result = '';
					            $(this).find('fieldset[campo]').each(function(){
					                result += $(this).attr('campo') + ';';
					            });
					            
								var parametrosAjax = {
									'url': ruta + '/Campo/GuardarOrden',
									'data':'mod='+$('input[name=idModulo]').val()+'&rol='+$('input[name=idRol]').val()+'&orden='+result,
									'async':true,
									'success':function(data){
										console.log(data);
									}
								};
								
								$.ajax(parametrosAjax);
							}
						});
					", CClientScript::POS_LOAD);
				?>
