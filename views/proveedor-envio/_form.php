<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProveedorEnvio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedor-envio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UrlProduccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UrlPruebas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CuentaCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Key')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'SandBox')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
