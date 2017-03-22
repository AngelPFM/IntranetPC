<?php
		$modulo = new Modulo();
		$modulos = array();
		array_push($modulos, array("idNTC_Modulo"=>0, "Nombre"=>"Seleccione un modulo"));
			
		$criterio = new CDbCriteria();
		$criterio->compare("Quitar", 0, false);
		$criterio->addCondition("Padre!=0");
		$criterio->order = "Nombre ASC";
		
		$mmodulos = Modulo::model()->findAll($criterio);
		
		$modulos = array_merge($modulos,$mmodulos);
		
// 		Yii::log("MODULOS: " . print_r($modulos,1) );
		
?>
	<div style="padding:15px 0px 0px 0px;">
		<h2><?php echo "PERMISOS DE MODULO";?></h2>
		<div class="contiene_desplegable_modulos" style="padding:15px 0px 15px 20px;">
<?php 
		echo CHtml::dropDownList(
						"Modulo", 
						0, 
						CHtml::listData($modulos, $modulo->getPkName(), $modulo->viewName()),
						array(
							"onChange"=>"
								js:
								var cadena  = '<div style=\"text-align:center;\">';
								cadena += '<img src=\"" . Yii::app()->request->baseUrl . "/images/ccs_bck_loading.gif\" border=\"0\" />';
								cadena += '</div>';
								var mod = $(this).val();
								if( mod != 0 ){
									var d = new Date();
									$('#contiene_permisos_modulo').html(cadena);
									$.post(
										'" . Yii::app()->request->baseUrl . "/Modulo/permisosAjax/?d=' + d.getTime() + '&rol=" . $rol . "&mod=' + mod,
										'',
										function(data){
											if( data != '' ){
												$('#contiene_permisos_modulo').html( data );
												manejaChecksBonitosPermisos();
											}
											else{
												alert('ERROR: ' + data);
											}
										}
									);
								}"
						)
					);
?>
		</div>
		<div class="contiene_permisos_modulos" id="contiene_permisos_modulo" style=" margin: 0px 20px; padding:10px 0px; vertical-align:top;">
		</div>	
	</div>