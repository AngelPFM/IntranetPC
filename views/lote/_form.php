<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Lote */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="lote-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReferenciaLote')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'Nuevo_DesdeFecha')->textInput() ?>

    <?= $form->field($model, 'Nuevo_HastaFecha')->textInput() ?>

    <?= $form->field($model, 'surtido_libre')->textInput() ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <?= $form->field($model, 'Look')->textInput() ?>

    <?= $form->field($model, 'Modificado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
