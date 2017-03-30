<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BloqueCMSSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bloque-cms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_BloqueCMS') ?>

    <?= $form->field($model, 'fkNTC_Menu') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?= $form->field($model, 'Frase') ?>

    <?php // echo $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'Independiente') ?>

    <?php // echo $form->field($model, 'Ancho') ?>

    <?php // echo $form->field($model, 'Orden') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
