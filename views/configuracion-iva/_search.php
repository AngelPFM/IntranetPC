<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConfiguracionIvaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuracion-iva-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_ConfiguracionIva') ?>

    <?= $form->field($model, 'fkNTC_TipoIVAProducto') ?>

    <?= $form->field($model, 'fkNTC_TipoIVANegocio') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'PorcIva') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoCalculoIVA') ?>

    <?php // echo $form->field($model, 'PorcRecargoEquivalencia') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
