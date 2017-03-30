<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LoteArticuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lote-articulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_LoteArticulo') ?>

    <?= $form->field($model, 'fkNTC_Lote') ?>

    <?= $form->field($model, 'fkNTC_Articulo') ?>

    <?= $form->field($model, 'Cantidad') ?>

    <?= $form->field($model, 'fkNTC_Variante') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
