<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProvinciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="provincia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Provincia') ?>

    <?= $form->field($model, 'fkNTC_Pais') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Quitar') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoIvaNegocio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
