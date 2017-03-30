<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Dominio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Slogan')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'HorarioContacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Latitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Longitud')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionDos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CP')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Localizacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Emaillook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'BajoTitulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumerosDeCuenta')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'metaRobots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metaKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'metaContent')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Agrupacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
