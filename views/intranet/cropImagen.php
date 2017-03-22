<?php 
	$imageUrl = $param["url"];//'http://static.gambrro.es/fotos/pequenosWeb/265_322.jpeg';
	
	$form = new FotoPerfil();

	echo CHtml::errorSummary($form); 
    echo CHtml::beginForm($param["urlCrop"], 'POST');
    echo CHtml::activeHiddenField($form, 'idNTC_UsuarioCommon', array('value'=>$param["id"]) );
    echo CHtml::activeHiddenField($form, 'fotoOrig', array('value'=>$imageUrl) );
    echo CHtml::activeHiddenField($form, 'cropX', array('value' => '0'));
    echo CHtml::activeHiddenField($form, 'cropY', array('value' => '0'));
    echo CHtml::activeHiddenField($form, 'cropW', array('value' => '100'));
    echo CHtml::activeHiddenField($form, 'cropH', array('value' => '100'));
    echo CHtml::activeHiddenField($form, 'nombreFichero', array('value' => $param["name"]));
    echo CHtml::activeHiddenField($form, 'imageType', array('value' => $param["type"]));
    
    
   	$previewWidth = 100;
	$previewHeight = 100;
	
    $this->widget('ext.yii-jcrop.jCropWidget',
    			array(
			        'imageUrl'=>$imageUrl,
					'formElementX'=>'FotoPerfil_cropX',
    				'formElementY'=>'FotoPerfil_cropY',
    				'formElementWidth'=>'FotoPerfil_cropW',
    				'formElementHeight'=>'FotoPerfil_cropH',
			        'previewId'=>'avatar-preview', //optional preview image ID, see preview div below
			        'previewWidth'=>100,
			        'previewHeight'=>100,
			        'jCropOptions'=>array(
			            'aspectRatio'=>1, 
			            /*'boxWidth'=>400,
			            'boxHeight'=>400,*/
			            'setSelect'=>array(0, 0, 100, 100),
			        ),
    			)
    );
?>
<!-- Begin optional preview box -->
<div style="display:inline-block; position:relative; overflow:hidden; width:<?=$previewWidth?>px; height:<?=$previewHeight?>px; margin-right:25px; margin-top: 10px; margin-bottom: 10px;">
	<img id="avatar-preview" src="<?=$imageUrl?>" style=" height: 0px; margin-left: 0px; margin-top: 0px;  width: 0px;">
</div>
<!-- End optional preview box -->
<?php echo CHtml::submitButton('Enviar Foto', array('class'=>'btn btn-success', 'style'=>'display:inline-block;margin-top:11px;vertical-align:top; '));?>
<?php echo CHtml::button('Cancelar', array('onClick'=>'js:window.location.reload();', 'class'=>'btn btn-danger', 'style'=>'display:inline-block;margin-top:11px;vertical-align:top;')); ?>
<?php echo CHtml::endForm() ?>