<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OpcionAtributoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="opcion-atributo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_OpcionAtributo') ?>

    <?= $form->field($model, 'fkNTC_Atributo') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Opcion') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'Medida') ?>

    <?php // echo $form->field($model, 'Orden') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
