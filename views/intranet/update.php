<?php
	$this->menu=Yii::app()->user->obtieneBotonesOperaciones($this->modelName, array('index', 'create', 'view'),$model->getPkValue());
 
	echo $this->renderPartial(
		'/intranet/_form', 
		array(
			'model'=>$model,
			'campos'=>$campos,
			'metadatos'=>$metadatos,
                        'arrTraduccion'=>$arrTraduccion,
// 			'metadatosExtra'=>$metadatosExtra,
// 			'modelExtra'=>$modelExtra,
// 			'modelExtraErrores'=>$modelExtraErrores
		)); 
?>