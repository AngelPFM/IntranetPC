<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaEnvioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifa-envio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_TarifaEnvio') ?>

    <?= $form->field($model, 'fkNTC_ProveedorEnvio') ?>

    <?= $form->field($model, 'fkNTC_MetodoEnvio') ?>

    <?= $form->field($model, 'fkNTC_Pais') ?>

    <?= $form->field($model, 'fkNTC_Provincia') ?>

    <?php // echo $form->field($model, 'fkNTC_ZonaEnvio') ?>

    <?php // echo $form->field($model, 'fkNTC_ModuloEnvio') ?>

    <?php // echo $form->field($model, 'CodigoPostal') ?>

    <?php // echo $form->field($model, 'PesoDesde') ?>

    <?php // echo $form->field($model, 'PrecioEnvio') ?>

    <?php // echo $form->field($model, 'PrecioEnvioPlus') ?>

    <?php // echo $form->field($model, 'fkNTC_Divisa') ?>

    <?php // echo $form->field($model, 'DiasEnvio') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
