<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modulo2Search */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Modulo') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Modelo') ?>

    <?= $form->field($model, 'Sql') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'MaxPorPagina') ?>

    <?php // echo $form->field($model, 'Padre') ?>

    <?php // echo $form->field($model, 'Visitas') ?>

    <?php // echo $form->field($model, 'Orden') ?>

    <?php // echo $form->field($model, 'Ordenacion') ?>

    <?php // echo $form->field($model, 'TraduccionMultiple') ?>

    <?php // echo $form->field($model, 'Csv') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
