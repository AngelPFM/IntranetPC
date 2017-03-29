<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OperacionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operacion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Operacion') ?>

    <?= $form->field($model, 'fkNTC_Cliente') ?>

    <?= $form->field($model, 'fkNTC_DocumentoVenta') ?>

    <?= $form->field($model, 'fkNTC_FormaPago') ?>

    <?= $form->field($model, 'fkNTC_Tienda') ?>

    <?php // echo $form->field($model, 'fkNTC_Divisa') ?>

    <?php // echo $form->field($model, 'FechaOperacion') ?>

    <?php // echo $form->field($model, 'FechaEstado') ?>

    <?php // echo $form->field($model, 'ImporteMoneda') ?>

    <?php // echo $form->field($model, 'ImporteEur') ?>

    <?php // echo $form->field($model, 'Referencia') ?>

    <?php // echo $form->field($model, 'ReferenciaPago') ?>

    <?php // echo $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'EstadoPago') ?>

    <?php // echo $form->field($model, 'Aplicada') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
