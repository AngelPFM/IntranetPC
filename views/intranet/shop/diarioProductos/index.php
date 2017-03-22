<?php
$this->pageTitle = $this->modelName;

$fnClick = "return(false);";
if( !isset($campos["Fichero"]) ){
	$fnClick = "window.location='" . Yii::app()->urlManager->createUrl($modelName) . "/' + $.fn.yiiGridView.getSelection(id)";
	if($esSubListado){
		$arrReferrer = explode("?", $_SERVER["HTTP_REFERER"]);
		$fnClick .= "+'?return=".$arrReferrer[0]."&modRet=".$model->modelName."&keyRet=".$campoProcedencia."'";
	}
	$fnClick .= ";";
}

$modelName = $model->getModelName();

$parametrosGridView = array(
		'baseScriptUrl'=>Yii::app()->theme->baseUrl . '/gridview',
		'id'=>'header-form',
		'dataProvider'=>$headerDataProvider,
		'columns'=>$headerColumns,
		'summaryCssClass'=>'no-display',
		'rowCssClass'=>array('even'),
		'enablePagination'=>false,
		'enableSorting'=>false,
);

$this->widget('zii.widgets.grid.CGridView',
		$parametrosGridView
); ?>
<div class="form"> <?php
$form = $this->beginWidget('CActiveForm', array(
	'id'=>$this->modelName.'-edit-form',
	'enableAjaxValidation'=>false,
));
	
	$parametrosGridView = array(
							'baseScriptUrl'=>Yii::app()->theme->baseUrl . '/gridview',
							'id'=>'diario_form',							
							'dataProvider'=>$dataProvider,
							'columns'=>$headers,
							'rowCssClass'=>array('odd'),
							'summaryCssClass'=>'no-display',
							'hideHeader'=>true,
							'enablePagination'=>false,
							'enableSorting'=>false, 
						);
	
	$this->widget('zii.widgets.grid.CGridView', 
			$parametrosGridView
	); 
	
	if(sizeof($errorList)>0): ?>
		<div class="errorSummary">
		<p>Por favor corrija los siguientes errores de ingreso:</p>
		<?php
			foreach($errorList as $lineNumber=>$lineErrors): ?>
				<ul>
					<li><span style="font-weight: bold;">Linea <?php echo $lineNumber ?></span>
						<ul>
						<?php foreach($lineErrors as $campo=>$errores): ?>
							<li style="padding-left: 20px;"><span style="text-decoration: underline;"><?php echo $model->getAttributeLabel($campo); ?>:</span> 
								<?php foreach($errores as $error): ?>
										<span class="errorText"><?php echo $error ?></span>
								<?php endforeach;?>
							</li>
						<?php endforeach;?>
						</ul>
					</li>
				</ul>
			<?php 
			endforeach; ?>
		</div> <?php 		
	endif;	
	echo Chtml::submitButton('Aplicar', array("class"=>"btn btn-success") ); 	
$this->endWidget(); ?>
</div>