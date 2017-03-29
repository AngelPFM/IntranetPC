<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Atributo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="atributo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Codigo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Etiqueta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Requerido')->textInput() ?>

    <?= $form->field($model, 'Buscable')->textInput() ?>

    <?= $form->field($model, 'Comparable')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoDatosAtributo')->textInput() ?>

    <?= $form->field($model, 'TieneOpciones')->textInput() ?>

    <?= $form->field($model, 'ValorPorDefecto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Validacion')->textInput() ?>

    <?= $form->field($model, 'AplicarATodos')->textInput() ?>

    <?= $form->field($model, 'DefineProducto')->textInput() ?>

    <?= $form->field($model, 'FormatoOpciones')->textInput() ?>

    <?= $form->field($model, 'MostrarEnFicha')->textInput() ?>

    <?= $form->field($model, 'esColor')->textInput() ?>

    <?= $form->field($model, 'esTalla')->textInput() ?>

    <?= $form->field($model, 'TablaAsociada')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
