<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AtributoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atributo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Atributo') ?>

    <?= $form->field($model, 'Codigo') ?>

    <?= $form->field($model, 'Etiqueta') ?>

    <?= $form->field($model, 'Requerido') ?>

    <?= $form->field($model, 'Buscable') ?>

    <?php // echo $form->field($model, 'Comparable') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoDatosAtributo') ?>

    <?php // echo $form->field($model, 'TieneOpciones') ?>

    <?php // echo $form->field($model, 'ValorPorDefecto') ?>

    <?php // echo $form->field($model, 'Validacion') ?>

    <?php // echo $form->field($model, 'AplicarATodos') ?>

    <?php // echo $form->field($model, 'DefineProducto') ?>

    <?php // echo $form->field($model, 'FormatoOpciones') ?>

    <?php // echo $form->field($model, 'MostrarEnFicha') ?>

    <?php // echo $form->field($model, 'esColor') ?>

    <?php // echo $form->field($model, 'esTalla') ?>

    <?php // echo $form->field($model, 'TablaAsociada') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
