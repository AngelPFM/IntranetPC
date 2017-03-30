<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LocalidadSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="localidad-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Localidad') ?>

    <?= $form->field($model, 'fkNTC_Provincia') ?>

    <?= $form->field($model, 'fkNTC_Pais') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'CoordY') ?>

    <?php // echo $form->field($model, 'CoordX') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
