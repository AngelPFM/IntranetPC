<?php
$this->widget('xupload.XUpload', array(
                    'url' => Yii::$app->createUrl("site/upload"),
                    'model' => $model,
                    'attribute' => 'file',
                    'multiple' => $multiple,
					'autoUpload'=>true,
					'parametros'=>$parametros,
					'htmlOptions'=>array("multiple"=>true),
// 					'parametros'=>array('ficheros'=> $ficheros, 'id'=>$id,'tabla' => $tabla),
					'options'=>array(
						'autoUpload' => true,
						'acceptFileTypes'=>"js:/(\.|\/)(gif|jpeg|png|jpg|pdf)$/i"
					)
));
?>