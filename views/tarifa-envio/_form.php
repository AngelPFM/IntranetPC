<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaEnvio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifa-envio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_ProveedorEnvio')->textInput() ?>

    <?= $form->field($model, 'fkNTC_MetodoEnvio')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Pais')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Provincia')->textInput() ?>

    <?= $form->field($model, 'fkNTC_ZonaEnvio')->textInput() ?>

    <?= $form->field($model, 'fkNTC_ModuloEnvio')->textInput() ?>

    <?= $form->field($model, 'CodigoPostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PesoDesde')->textInput() ?>

    <?= $form->field($model, 'PrecioEnvio')->textInput() ?>

    <?= $form->field($model, 'PrecioEnvioPlus')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Divisa')->textInput() ?>

    <?= $form->field($model, 'DiasEnvio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
