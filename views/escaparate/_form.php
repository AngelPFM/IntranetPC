<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Escaparate */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escaparate-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_Articulo')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Categoria')->textInput() ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'TextoBoton')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TextoDerecha')->textInput() ?>

    <?= $form->field($model, 'Url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Orden')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
