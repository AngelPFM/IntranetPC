<?php 
	$baseUrl = Yii::app()->theme->baseUrl;
	$cs = Yii::app()->getClientScript();
	$cs->registerScriptFile($baseUrl.'/js/supersized.3.2.6.js');
	$cs->registerCssFile($baseUrl.'/css/supersized.css');
	$cs->registerCssFile($baseUrl.'/css/login.css');
	
	Yii::app()->clientScript->registerScript('supersized',
	'var fondos = eval("[{image:\'' . $baseUrl . '/images/fondo.jpg\', title : \'\', fid:\'\' }]");
			$(function(){
			    $.supersized({
			        slides                  : fondos,
			        image_protect           :      0,
			        performance             :      3,
			        autoplay				:      0,
			        slide_interval          :   5000,
			        transition              :      1,
			        transition_speed		:   1500,
			        slide_links				:	   0,
			        thumbnail_navigation    :      0});
			});',
			CClientScript::POS_HEAD
	);
?>
<div class="login">
	<div class="logo-empresa"></div>
	<div class="form">
		<?php $form=$this->beginWidget('CActiveForm', array(
			'id'=>'login-form',
			'enableClientValidation'=>true,
			'clientOptions'=>array(
				'validateOnSubmit'=>true,
			),
		)); 
		?>
		
		<div class="row campos">
			<?php echo $form->labelEx($model,'username'); ?>
			<?php echo $form->textField($model,'username'); ?>
		</div>
	
		<div class="row campos">
			<?php echo $form->labelEx($model,'password'); ?>
			<?php echo $form->passwordField($model,'password'); ?>
		</div>
	
		<div class="row rememberMe">
			
			<?php echo $form->checkBox($model,'rememberMe'); ?>
			<label class="check" for="IntranetLoginForm_rememberMe"></label>
			<?php echo $form->label($model,'rememberMe'); ?>
		</div>
		<div class="contenedor-errores">
			<?php echo $form->error($model,'username'); ?>
			<?php echo $form->error($model,'password'); ?>
			<?php echo $form->error($model,'rememberMe'); ?>
		</div>
		<div class="row buttons">
			<?php echo CHtml::submitButton('Entrar'); ?>
		</div>
	
		<?php $this->endWidget();?>
	</div><!-- form -->
</div>