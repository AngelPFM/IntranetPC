<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Usuario') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'fkNTC_Rol') ?>

    <?= $form->field($model, 'MaxIntentos') ?>

    <?= $form->field($model, 'FechaValidezIni') ?>

    <?php // echo $form->field($model, 'FechaValidezFin') ?>

    <?php // echo $form->field($model, 'Hash') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
