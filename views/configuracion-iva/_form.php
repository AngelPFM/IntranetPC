<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConfiguracionIva */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuracion-iva-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_TipoIVAProducto')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoIVANegocio')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PorcIva')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoCalculoIVA')->textInput() ?>

    <?= $form->field($model, 'PorcRecargoEquivalencia')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
