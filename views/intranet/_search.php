<div class="wide form">
<?php 
	$form=$this->beginWidget('CActiveForm', array(
		'action'=>Yii::app()->createUrl($this->route),
		'method'=>'get',
	)); 
	$c = 1;
	
	$metadatosTmp      = $model->retornaMetaData(1);
	
	$model->unsetAttributes();
	foreach( $campos as $campo=>$valor ){
		$metadatos = $metadatosTmp;
// 		echo '<pre>metadatos '.print_r($metadatos,1).'</pre>';
?>
		<div class="bloque-row" style="text-align:left; display:inline-block; margin:5px;">
		<?php echo $form->label($model, $campo, array('style'=>'text-align:left;')); ?><br/>
		<?php
		if( $valor !== 0){
			//Yii::log("VALOR en _Search " . $valor );
			$tmp = array();
			
			$ttmp = $valor::model()->findAll();
			
			$tmp2 = new $valor();
			$nombre = $tmp2->viewName();
			$tmp2->$nombre = "-";
			$tmp[0] = $tmp2;
			
			$tmp = array_merge($tmp, $ttmp);//array_push($tmp, $ttmp);

			echo $form->dropDownList($model,$campo, CHtml::listData($tmp, $tmp[0]->getPkName(), $tmp[0]->viewName()));
		}
		else
		{
			$filtro = array();
 			switch( $metadatos->tableSchema->columns[$campo]->dbType){
				case "boolean":
					Yii::log('BOOLEAN');
					switch( strtolower($campo) ){
						case "sexo":
							$filtro = array(""=>"-", "'0'"=>"M","'1'"=>"H");
							break;
						default:
							echo $form->textField($model, $campo);
							break;
					}
					
					break;
				default:
					if(strtolower($campo) == "quitar"){
						Yii::log('CAMPO QUITAR: '.(($valor)? 'SI':'NO'));
						$filtro = array('' => 'Todos', 0 => 'No quitado', 1 => 'Quitado' /*, 2=>'Desactivado'*/);
					}
 			}
				
 			if( count($filtro) > 0 ){
 				echo $form->dropDownList($model,$campo, $filtro);
 			}
 			else{
 				echo $form->textField($model, $campo);
 			}
		}
		?>		
		</div>
<?php
		if( $c%5 == 0 && false ){
		?><br/><?php 
		}
		$c++; 
	}
?>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Buscar'); ?>
	</div>
<?php $this->endWidget(); ?>
</div><!-- search-form -->