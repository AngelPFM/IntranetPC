<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PortesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="portes-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Portes') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Valor') ?>

    <?= $form->field($model, 'Default') ?>

    <?= $form->field($model, 'Texto') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
