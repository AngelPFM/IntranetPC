<?php
$lang = Yii::$app->getLanguage();
Yii::$app->setLanguage('es');
$this->widget('xupload.XUpload', 
				array(
                    'url' => Yii::$app->createUrl("site/upload"),
					
                    'model' => $model,
					'formView' => 'formGaleria',
                    'attribute' => 'file',
                    'multiple' => true,
						
					'uploadView' => 'xupload.views.uploadGaleria',
					'uploadTemplate' => '#template-upload-galeria',
						
					'downloadView' => 'xupload.views.downloadGaleria',
					'downloadTemplate' => '#template-download-galeria',	
											
					'htmlOptions'=>array(
						'id'=> 'XUploadForm-form-galeria'
					),
					'autoUpload'=>true,
					'options'=>array(
						'autoUpload'=>true,
						'acceptFileTypes'=>"js:/(\.|\/)(gif|jpeg|png|jpg|pdf)$/i",
						'downloadTemplateId' => 'template-download-galeria',
						'uploadTemplateId' => 'template-upload-galeria',
				),
));
Yii::$app->setLanguage($lang);