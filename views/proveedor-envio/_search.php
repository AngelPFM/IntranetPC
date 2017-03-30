<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProveedorEnvioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="proveedor-envio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_ProveedorEnvio') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'UrlProduccion') ?>

    <?= $form->field($model, 'UrlPruebas') ?>

    <?= $form->field($model, 'IdCliente') ?>

    <?php // echo $form->field($model, 'CuentaCliente') ?>

    <?php // echo $form->field($model, 'Key') ?>

    <?php // echo $form->field($model, 'Password') ?>

    <?php // echo $form->field($model, 'SandBox') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
