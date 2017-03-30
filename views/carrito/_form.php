<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Carrito */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="carrito-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_UsuarioWeb')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Cliente')->textInput() ?>

    <?= $form->field($model, 'SessionId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_DocumentoVenta')->textInput() ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'Abandonado')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
