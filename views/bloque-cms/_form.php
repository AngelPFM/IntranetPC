<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\BloqueCMS */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="bloque-cms-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_Menu')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Frase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Independiente')->textInput() ?>

    <?= $form->field($model, 'Ancho')->textInput() ?>

    <?= $form->field($model, 'Orden')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
