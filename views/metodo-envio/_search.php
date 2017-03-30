<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MetodoEnvioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metodo-envio-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_MetodoEnvio') ?>

    <?= $form->field($model, 'fkNTC_ProveedorEnvio') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'fkNTC_TipoValoracion') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoCalculo') ?>

    <?php // echo $form->field($model, 'PesoMaxPaquete') ?>

    <?php // echo $form->field($model, 'PesoMinPaquete') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoTarifa') ?>

    <?php // echo $form->field($model, 'fkNTC_UnidadMedida') ?>

    <?php // echo $form->field($model, 'TipoCosteManipulacion') ?>

    <?php // echo $form->field($model, 'CosteManipulacion') ?>

    <?php // echo $form->field($model, 'TiempoPreparacion') ?>

    <?php // echo $form->field($model, 'ImporteMinEnvioGratuito') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
