<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CarritoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrito-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Carrito') ?>

    <?= $form->field($model, 'fkNTC_UsuarioWeb') ?>

    <?= $form->field($model, 'fkNTC_Cliente') ?>

    <?= $form->field($model, 'SessionId') ?>

    <?= $form->field($model, 'fkNTC_DocumentoVenta') ?>

    <?php // echo $form->field($model, 'Fecha') ?>

    <?php // echo $form->field($model, 'Abandonado') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
