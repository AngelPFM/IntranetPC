<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstaticosCMS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estaticos-cms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fkNTC_Idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IsHTML')->textInput() ?>

    <?= $form->field($model, 'EstilosCSS')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'MetaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaRobots')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
