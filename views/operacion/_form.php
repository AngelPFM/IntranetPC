<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="operacion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_Cliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_DocumentoVenta')->textInput() ?>

    <?= $form->field($model, 'fkNTC_FormaPago')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Tienda')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Divisa')->textInput() ?>

    <?= $form->field($model, 'FechaOperacion')->textInput() ?>

    <?= $form->field($model, 'FechaEstado')->textInput() ?>

    <?= $form->field($model, 'ImporteMoneda')->textInput() ?>

    <?= $form->field($model, 'ImporteEur')->textInput() ?>

    <?= $form->field($model, 'Referencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReferenciaPago')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EstadoPago')->textInput() ?>

    <?= $form->field($model, 'Aplicada')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
