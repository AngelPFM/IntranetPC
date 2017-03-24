<?php 
use yii\web\View;

	$baseUrl = \yii\helpers\Url::base();
	$this->registerJSFile($baseUrl.'/js/supersized.3.2.6.js');
	$this->registerCssFile($baseUrl.'/css/supersized.css');
	$this->registerCssFile($baseUrl.'/css/login.css');
	
	$this->registerJS('supersized',
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
                View::POS_HEAD
	);
?>
<div class="login">
	<div class="logo-empresa"></div>
	<div class="form">
        <?php
                      
                use yii\helpers\Html;
                use yii\widgets\ActiveForm;

                  $form = ActiveForm::begin([
                  'id' => 'login-form',
                  'options' => ['class' => 'form-horizontal'],
])          ?>
                  


		
		<div class="row campos">
			<?= $form->field($model, 'username')->label('Usuario') ?>
                  
		</div>
	
		<div class="row campos">
			
                  <?= $form->field($model, 'password')->passwordInput()->label('Contraseña') ?>
		</div>
	
		<div class="row rememberMe">
			
			 <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?>

		</div>

		<div class="row buttons">
			<?= Html::submitButton('Entrar', ['class' => 'btn btn-primary']) ?>
		</div>
	
		<?php ActiveForm::end() ?> 
	</div><!-- form -->
</div>