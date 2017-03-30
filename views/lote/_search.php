<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lote-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Lote') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'ReferenciaLote') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'Nuevo_DesdeFecha') ?>

    <?php // echo $form->field($model, 'Nuevo_HastaFecha') ?>

    <?php // echo $form->field($model, 'surtido_libre') ?>

    <?php // echo $form->field($model, 'Stock') ?>

    <?php // echo $form->field($model, 'Look') ?>

    <?php // echo $form->field($model, 'Modificado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
