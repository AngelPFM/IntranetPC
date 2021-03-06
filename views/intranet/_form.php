<div class="form">
<?php
 $form=$this->beginWidget('CActiveForm', array(
	'id'=>$model->getModelName().'-form',
	'enableAjaxValidation'=>false,
));
/*** Provocar cambios en campos relacionados **/
 $relaciones  = $model->relations();
 $relatedModels = array();
 foreach ($relaciones as $relacion=>$attrib) {
 	if($attrib[0]==CActiveRecord::BELONGS_TO){
 		$relatedModels[$attrib[1]] = $attrib[2];
 	}
 }
 if(isset($relatedModels[get_class($model)])){
 	unset($relatedModels[get_class($model)]);
 }
 //Yii::log('Modelos Relacionados: '.print_r($relatedModels,1));
 $watchFields = array();
 $camposDependientes = array();
 foreach ($relatedModels as $relationModelName=>$field){
 	$relationModel = new $relationModelName;
 	$relatedRelations = $relationModel->relations();
 	$relationRelatedModels = array();
 	foreach ($relatedRelations as $relacion=>$attrib) {
 		//Yii::log('RELACION: '.$relacion.' => '.print_r($attrib,1));
 		if($attrib[0]==CActiveRecord::HAS_MANY){ 			
 			$relationRelatedModel = $attrib[1];
 			if(array_search($relationRelatedModel, array_keys($relatedModels))!==false){
 				$add = true;
 				// Asegurarse de evitar cambios repetidos en cascada
 				if(isset($watchFields[$field]) && is_array($watchFields[$field])){
	 				foreach($watchFields[$field] as $index=>$otherField){
// 	 					Yii::log('Campo:'.$relatedModels[$attrib[1]]. ' Otro campo: '.$otherField.'='.print_r($watchFields[$otherField],1));
	 					if(isset($watchFields[$otherField]) && array_search($relatedModels[$attrib[1]], $watchFields[$otherField])!==false){
	 						$add=false;
	 					}
	 				}
 				}				
 				if($add && $field!=$relatedModels[$attrib[1]] && (!isset($watchFields[$relatedModels[$attrib[1]]]) || array_search($field, $watchFields[$relatedModels[$attrib[1]]])===false )){
 					$watchFields[$field][] = $relatedModels[$attrib[1]];
 					$camposDependientes[$relatedModels[$attrib[1]]]=$field;
 				}
 				
 			}
 		}
 	}
 }
/*Yii::log('Campos a Controlar: '.print_r($watchFields,1));
Yii::log('Campos Dependientes: '.print_r($camposDependientes,1));*/
 $cs = Yii::$app->clientScript;
 if($model->getModelName() != "ArticuloCategoria"){
	 foreach ($watchFields as $field=>$attrib){
	 	foreach ($attrib as $index=>$campo){
	 		$relatedModelKeys = array_keys($relatedModels);
	 		$modeloKey = array_search($field, array_values($relatedModels));		
	 		$relatedModel = $relatedModelKeys[$modeloKey];
	 		
	 		$modeloKey = array_search($campo, array_values($relatedModels));
	 		$affectedModel = $relatedModelKeys[$modeloKey];
	
		 	$cs->registerScript($field.'Change_'.$campo, 
		 			
		 				'$("#'.$model->getModelName().'_'.$field.'").on("change", function(event){	 					
		 					$.ajax({
		 						type: "GET",
		 						dataType: "html",
		 						url: "'.Yii::$app->createAbsoluteUrl('/'.$relatedModel.'/change').'/?id="+$("#'.$model->getModelName().'_'.$field.'").val()+"&model='.$affectedModel.'",
		 						success: function(data){
		 							$("#'.$model->getModelName().'_'.$campo.'").html($(data).children("option"));	
		 						}
	 						});
	 					})', 
		 				CClientScript::POS_READY);
	 	}
	 }
 }
 /**** FIN Provocar cambios en campos relacionados ***/
?>
	<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>
	<?php //echo $form->errorSummary($modelExtraErrores); ?>
	<?php 
	if($arrTraduccion){
		if(sizeof($arrTraduccion["idiomas"]) == 1 ){
			$claseInput = "inputTraduccion";
			$claseFila = "filaTraduccion";
		}elseif(sizeof($arrTraduccion["idiomas"]) > 1 ){
			$claseInput = "inputTraduccionMulti";
			$claseFila = "filaTraduccion";
		}
		echo "<div class=\"row ".$claseFila." even\"><label>&nbsp</label>";
		echo "<span class=\"int-ayuda-vacio\"></span>";
 		echo "<span class=\"".$claseInput."\">".Idioma::model()->findByPk(Yii::$app->sourceLanguage)->getAttribute("Nombre")."</span>";
 		foreach($arrTraduccion["idiomas"] as $idioma)
 			echo "<span class=\"".$claseInput."\">".Idioma::model()->findByPk($idioma)->getAttribute("Nombre")."</span>";
 		echo "</div>";
	}
	
	$modelTmp = $model;
	$metadatosTmp = $metadatos;
	$contador = 0;
	foreach( $campos as $campo=>$valor)
	{
		$enabled = true;
 		//Yii::log('METADATA: '.print_r($metadatos->tableSchema->columns[$campo],1));
		$model = $modelTmp;
		$metadatos = $metadatosTmp;
		
		if( $campo != $model->getPkName() || !$metadatos->tableSchema->columns[$campo]->autoIncrement)
		{
	?>
	<div class="row <?=$claseFila?> <?=( $contador%2 == 0 )?'odd':'even'?>">
	<?php 
	
			$dbType = "";
			if( isset($metadatos->tableSchema->columns[$campo]) ){
				$dbType = $metadatos->tableSchema->columns[$campo]->dbType;
				$dbType = $this->_obtieneTipoCampo($dbType);
			}
	
			if( $valor !== 0 )
			{
				if (array_key_exists($campo, $_GET))
				{
					$model->$campo = $_GET[$campo];
				}
				
				$tmp = new $valor();
				
				echo $form->labelEx($model, $campo);
				
				$data = array();
				$fieldIndex = array_search($campo, array_keys($camposDependientes));
 				//Yii::log('Encontrado '.$campo.' ? '. (($fieldIndex!==false)? 'SI en '.$fieldIndex:'NO'));
				if($fieldIndex!==false){
					$relacionadoCon = $camposDependientes[$campo];
					//Yii::log('Relacionado con '.$relacionadoCon);
				}
				if($fieldIndex===false || ($model->isNewRecord && isset($relacionadoCon)) || ( !$model->isNewRecord && isset($relacionadoCon) && isset($model->$relacionadoCon))){
					//$tmp es el objeto a que hace referencia este campo. P.ej. un Menu. 
					//Con $tmp->findAll() obtenemos todos los menús para listarlos en el combo.
					//Yii::log('ENTRO');
					
					if($tmp->hasAttribute("Quitar"))
						$objetosBusqueda = $tmp->findAllByAttributes(array("Quitar"=>0));
					else
						$objetosBusqueda = $tmp->findAll();
					
					$data = CHtml::listData($objetosBusqueda, $tmp->getPkName(), function($item){ return $item->viewValue(); });
					//echo "<pre>" .print_r($data,1) . "</pre>";
					//Yii::log($campo. ' : '.$tmp->getPkName().'->'.$tmp->viewName());
				}
				
				echo $form->dropDownList($model, $campo, $data, array('empty'=>'seleccione...'));		
				
// 				if( $campo == "fkAplicacion")
// 				{
// 					//CUANDO VOY A MOSTRAR UN DESPLEGABLE DE APLICACION
// 					//SOLO MUESTRO LA APLICACION PARA LA QUE ME HE LOGEADO
// 					$filtroApp = array(
// 								"IdAplicacion"=>Yii::$app->user->getAplicacion(),
// 							);
// 					echo $form->dropDownList($model,$campo, CHtml::listData($tmp->findAllByAttributes($filtroApp), $tmp->getPkName(), $tmp->viewName()));
// 				}
// 				else
// 				{
// 					echo $form->dropDownList($model,$campo, CHtml::listData($tmp->findAll(), $tmp->getPkName(), $tmp->viewName()));
// 				}
			}
			else
			{			
// 				Yii::log("TIPODATO: $campo -> $dbType ");

				switch( $dbType )
				{					
					case "integer":
					case "numeric":
					case "bigint":
						$defaultValue = intval("0".$metadatos->tableSchema->columns[$campo]->defaultValue,10);
						if( strpos(strtolower($campo), "buscadesde") !== false || strpos(strtolower($campo), "buscahasta") !== false ){
							echo $form->labelEx($model, $campo);
							echo $form->numberField($model, $campo, array('min'=>0, 'max'=>99));
						}
						else
						{
							if( strpos(strtolower($campo), 'quitar')!==false )
							{
								if( $model->$campo === 2){
									echo $form->labelEx($model, $campo);
									echo $form->dropDownList($model,$campo, CHtml::listData($tmp->findAll(), $tmp->getPkName(), $tmp->viewName()));
								}
								else
								{
									echo $form->labelEx($model, $campo);									
									echo $form->checkBox($model, $campo);
								}
							}
							else
							{
								if( strpos(strtolower($campo), 'idNTC_') !== false ){
									/*Yii::log("MODELOEXTRA: " . print_r($model,1) );*/
									echo $form->hiddenField($model, $campo);
								}
								else{
									echo $form->labelEx($model, $campo);
									if($model->getIsNewRecord()){
										echo $form->numberField($model, $campo, array('min'=>0, 'value'=>$defaultValue));
									}
									else{
										echo $form->numberField($model, $campo, array('min'=>0));
									}
								}
							}
						}
						break;
					case "boolean":
						switch( strtolower($campo) ){
							case "sexo":
								if( !isset($model->$campo) || $model->$campo == ''){
									$model->$campo = 0;
								}
								
								$arrValores = array(
									array("Nombre"=>"Hombre", "Valor"=>1),
									array("Nombre"=>"Mujer", "Valor"=>0)
								);
								
								echo $form->labelEx($model, $campo);
								echo $form->dropDownList($model, $campo, CHtml::listData($arrValores, 'Valor', 'Nombre') );
								break;
							case "tipoubicacion":
								$arrValores = array(
										array("Nombre"=>"GPS", "Valor"=>1),
										array("Nombre"=>"NOGPS", "Valor"=>0)
								);
								
								echo $form->labelEx($model, $campo);
								echo $form->dropDownList($model, $campo, CHtml::listData($arrValores, 'Valor', 'Nombre') );
								break;
							case "estado":
								$arrValores = array(
										array("Nombre"=>"ONLINE", "Valor"=>1),
										array("Nombre"=>"OFFLINE", "Valor"=>0)
								);
								
								echo $form->labelEx($model, $campo);
								echo $form->dropDownList($model, $campo, CHtml::listData($arrValores, 'Valor', 'Nombre') );
								break;
							default:
								echo $form->labelEx($model, $campo);
								echo $form->checkBox($model, $campo);
						}

						break;
					
					case "timestamp":
						$yearRange = 'c-100:c+10';
						if(strlen($model->$campo)>0 ){
							$arrFecha = explode(" ",$model->$campo);
							$model->$campo = date("d/m/Y", strtotime($arrFecha[0]));
							if(count($arrFecha) > 1)
								$model->$campo .= " ".$arrFecha[1];
						}
						
						echo $form->labelEx($model, $campo);
						Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
						$this->widget('CJuiDateTimePicker',array(
								'model'=>$model, //Model object
								'attribute'=>$campo, //attribute name
								'mode'=>'datetime', //use "time","date" or "datetime" (default)
								'options'=>array(
										'timeFormat'=>"hh:mm:ss",
 										'dateFormat'=>'dd/mm/yy',
 										'buttonText'=>'Calendario',
 										'showOn'=>'button',
 										'showButtonPanel'=>true,
										'yearRange'=> $yearRange,
										'changeMonth' => true,
										'changeYear' => true,
								),
								'language'=>'es',
						));
						
						break;
					case "date":
						// CAMPO FECHA
						$yearRange = 'c-100:c+10';
						//if(strlen($model->$campo)>0){
						//	$model->$campo = date("d/m/Y", strtotime($model->$campo.'00:00:00'));
						//}
						
						echo $form->labelEx($model, $campo);
						//Yii::log('CAMPO: '.$campo.' = '.$model->$campo);
						Yii::import('application.extensions.CJuiDatePicker.CJuiDatePicker');
						$this->widget('zii.widgets.jui.CJuiDatePicker', array(
								'model'=>$model,   // model object
								'attribute'=>$campo,
								'value'=>$model->$campo,
								'options'=>array(
										'autoSize'=>true,
										'dateFormat'=>'dd/mm/yy',
										'defaultDate'=>$model->$campo,
										'buttomImageOnly'=>true,
										'buttonText'=>'Select',
										'showAnim'=>'fold',
										'showOn'=>'button',
										'showButtonPanel'=>true,
										'yearRange'=> $yearRange, 
										'changeMonth' => true,
										'changeYear' => true,
								),
								'language'=>'es',
						));
						break;
						case "datetime":
							// CAMPO DATETIME
							$yearRange = 'c-100:c+10';
							if(strlen($model->$campo)>0 ){
								$model->$campo = date("d/m/Y h:i:s", strtotime($model->$campo));
							}
						
							echo $form->labelEx($model, $campo);
							Yii::import('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker');
							$this->widget('application.extensions.CJuiDateTimePicker.CJuiDateTimePicker', array(
									'model'=>$model,   // model object
									'attribute'=>$campo,
									'value'=>$model->$campo,
									'options'=>array(
											'autoSize'=>true,
											'dateFormat'=>'dd/mm/yy',
											'timeFormat'=>'hh:mm:ss',
											//'defaultDate'=>date('d/m/y', strtodate($model->$campo)),
											'buttomImageOnly'=>true,
											'buttonText'=>'Select',
											'showAnim'=>'fold',
											'showOn'=>'button',
											'showButtonPanel'=>true,
											'yearRange'=> $yearRange,
											'changeMonth' => true,
											'changeYear' => true,
									),
									'language'=>'es',
							));
							break;						
					case "text":
						if( $campo == 'EstilosCSS' ){
							echo $form->labelEx($model, $campo, array("style"=>"margin-top:5px; vertical-align:top; width:20%;"));
							echo $form->textArea($model, $campo);
							
							Yii::$app->clientScript->registerScript(
									"codemirror_update_create",
									"
										var myTextArea = $('#" . $model->getModelName() . "_" . $campo . "').get()[0];
										var params = {
												lineNumbers: true,
												matchBrackets: true,
												mode: 'css',
												autoCloseBrackets: true,
												indentWithTabs: true,
												tabSize:8
										};
										//console.log( myTextArea );
										try{
											var myCodeMirror = CodeMirror.fromTextArea(myTextArea, params);
										}catch(err){
												console.log(err);
										}
									",
									CClientScript::POS_READY
							);
						}
						else{
							$claseInput = "";
							if($camposIdioma){
								$claseInput = "inputTraduccion";
							}
							echo $form->labelEx($model, $campo, array("style"=>"vertical-align:top;"));
							
							$claseTiny = "";

							if(sizeof($arrTraduccion["idiomas"]) > 0){
								if(sizeof($arrTraduccion["idiomas"]) == 1)
									$claseTiny = "tiny50";
								else
									$claseTiny = "tinyMulti";
								
								$botonesTiny = array(
										'theme_advanced_buttons1'=>'fontsizeselect,forecolor,backcolor,|,bold,italic,underline,strikethrough,|,sub,sup,|',
										'theme_advanced_buttons2'=>'justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent,|,hr,nonbreaking,blockquote',
										'theme_advanced_buttons3'=>'cut,copy,paste,|,search,replace,|,undo,redo,|,image,|,link,unlink,anchor',
										'theme_advanced_buttons4'=>'tablecontrols',
										);
							}else{
								$botonesTiny = array(
									'theme_advanced_buttons1'=>'fontsizeselect,forecolor,backcolor,|,bold,italic,underline,strikethrough,|,sub,sup,|,justifyleft,justifycenter,justifyright,justifyfull,|,bullist,numlist,|,outdent,indent,|,hr,nonbreaking,blockquote',
									'theme_advanced_buttons2'=>'cut,copy,paste,|,search,replace,|,undo,redo,|,image,|,link,unlink,anchor,|,tablecontrols',
									'theme_advanced_buttons3'=>'',
									'theme_advanced_buttons4'=>'',
								);
							}
							
							echo "<div class=\"tinymce_container ".$claseTiny.($enabled ? '' : ' readonly')."\">";
							
							if ($enabled)
							{
								$this->widget('application.extensions.tinymce.TinyMce',
									array(
										'model'=>$model,
										'attribute'=>$campo,
										'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
										//'plugins'=>array('safari','style','table','save','advlink','emotions','spellchecker','media','searchreplace','print','contextmenu','paste','directionality','noneditable','nonbreaking','xhtmlxtras'),
										'settings' => array_merge(array(
											'spellCheckLangs'=>MetodosComunes::activeRecordsToList(Idioma::model()->findAll('Quitar=false'), null, 'idNTC_Idioma'),
											'extended_valid_elements'=>'a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]',
											'selector'=>'textarea',
											'force_p_newlines' => FALSE,
											'force_br_newlines' => TRUE,
											'forced_root_block' => FALSE,
											'verify_html' => FALSE,
											'convert_newlines_to_brs' => FALSE,
											'remove_linebreaks' => FALSE,
											'remove_trailing_nbsp' => FALSE,
										),$botonesTiny),
									)
								);
							}
							else
							{
								echo $model->$campo;
							}
							echo "</div>";
							if($arrTraduccion){
								foreach($arrTraduccion["idiomas"] as $idioma){
									//$modelTraduccion = new GenericModel();
									$model->traduccion[$arrTraduccion[$idioma]["idsTraducciones"][$campo]] = $arrTraduccion[$idioma]["camposIdioma"][$campo];

									echo "<div class=\"tinymce_container ".$claseTiny.($enabled ? '' : ' readonly')."\">";
									if ($enabled)
									{
									$this->widget('application.extensions.tinymce.TinyMce',
											array(
													'model'=>$model,
													'attribute'=>"traduccion[".$arrTraduccion[$idioma]["idsTraducciones"][$campo]."]",
													'htmlOptions'=>array('rows'=>6, 'cols'=>50, 'class'=>'tinymce'),
													'settings' => array_merge(array(
															'spellCheckLangs'=>MetodosComunes::activeRecordsToList(Idioma::model()->findAll('Quitar=false'), null, 'idNTC_Idioma'),
															'extended_valid_elements'=>'a[name|href|target|title],img[class|src|border=0|alt|title|hspace|vspace|width|height|align|onmouseover|onmouseout|name],hr[class|width|size|noshade],font[face|size|color|style],span[class|align|style]',
															'selector'=>'textarea',
															'force_p_newlines' => FALSE,
															'force_br_newlines' => TRUE,
															'forced_root_block' => FALSE,
															'verify_html' => FALSE,
															'convert_newlines_to_brs' => FALSE,
															'remove_linebreaks' => FALSE,
															'remove_trailing_nbsp' => FALSE,
													),$botonesTiny),
											)
									);
									}
									else
									{
										echo $model->traduccion[$arrTraduccion[$idioma]["idsTraducciones"][$campo]];
									}
									echo "</div>";
								}
							}
							
						}
	 						
						break;
					default: 
						// CAMPOS PASSWORD
						if( strpos(strtolower($campo), "contrase") !== false || strpos(strtolower($campo), "passw") !== false)
						{
							echo $form->labelEx($model, $campo);
							echo $form->passwordField($model, $campo);
							break;
						}
						else{
							if( strtolower($campo) == "valor" && $model->getModelName()=="ParametroConfiguracion" ){
								echo $form->labelEx($model, $campo, array("style"=>"margin-top:5px; vertical-align:top; width:18%;"));
								echo $form->textArea($model, $campo);
								
								Yii::$app->clientScript->registerScript(
										"codemirror_update_create",
										"
										var myTextArea = $('#" . $model->getModelName() . "_" . $campo . "').get()[0];
										var params = {
        										lineNumbers: true,
        										matchBrackets: true,
        										mode: { name:'javascript',json: true },
												autoCloseBrackets: true,
												indentWithTabs: true,
												tabSize:8
      									};
										//console.log( myTextArea );
										try{
											var myCodeMirror = CodeMirror.fromTextArea(myTextArea, params);
										}catch(err){
											console.log(err);
										}
										",
										CClientScript::POS_READY
								);
							}
							else
							{
								// CAMPO POR DEFECTO
								echo $form->labelEx($model, $campo);
								
								$claseInput = "";
								if(sizeof($arrTraduccion["idiomas"]) == 1 ){
									$claseInput = "inputTraduccion";
								}elseif(sizeof($arrTraduccion["idiomas"]) > 1 ){
									$claseInput = "inputTraduccionMulti";
								}
								
								if(	$metadatos->tableSchema->columns[$campo]->size > 150){
									echo $form->textArea($model, $campo, array("class"=>$claseInput, "readonly"=>($enabled ? '' : 'readonly')));
								}else
									echo $form->textField($model, $campo, array("class"=>$claseInput, "readonly"=>($enabled ? '' : 'readonly')));
								
								if($arrTraduccion){
									foreach($arrTraduccion["idiomas"] as $idioma){
										if(	$metadatos->tableSchema->columns[$campo]->size > 150){
											?>
											<textarea name="traduccion[<?=$arrTraduccion[$idioma]["idsTraducciones"][$campo]?>]" class="<?=$claseInput?>" <?php echo ($enabled ? '' : 'readonly'); ?>><?=$arrTraduccion[$idioma]["camposIdioma"][$campo]?></textarea>
											<?
										}else{
											?>
											<input name="traduccion[<?=$arrTraduccion[$idioma]["idsTraducciones"][$campo]?>]" class="<?=$claseInput?>" <?php echo ($enabled ? '' : 'readonly'); ?> type="text" maxlength="80" value="<?=$arrTraduccion[$idioma]["camposIdioma"][$campo]?>">
											<?
										}
									}
								}
							}
						}
				}
			} 
// 			Yii::log('METADATOS CAMPO: '.print_r($metadatos->tableSchema->columns[$campo],1));
			$comentario = $metadatos->tableSchema->columns[$campo]->comment;
			if(isset($comentario) && $comentario!=''){
				//echo CHtml::link('+info','#',array('class'=>'info_link','title'=>$metadatos->tableSchema->columns[$campo]->comment));
				echo CHtml::tag('span', array('class'=>'info_link','title'=>$metadatos->tableSchema->columns[$campo]->comment), '+info', true);
			}
			echo $form->error($model, $campo);
	?>
	</div>
	<?php
		}
		$contador++;
	}
	?>
	<div class="row buttons" style="overflow:hidden;">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t("Botones", "Crear") : Yii::t("Botones", "Guardar"), array("class"=>"btn btn-success", "style"=> "clear:none; float:left") ); ?>
		<?php echo CHtml::link("Cancelar", "javascript:void(0)", array("onclick"=>"window.history.back();", "class"=>"btn btn-success fondo-rojo btn-cancelar", "style"=> "clear:none; float:left; font-size: 16px; padding: 8px;")); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- form -->