<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MetodoEnvio */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="metodo-envio-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_ProveedorEnvio')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fkNTC_TipoValoracion')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoCalculo')->textInput() ?>

    <?= $form->field($model, 'PesoMaxPaquete')->textInput() ?>

    <?= $form->field($model, 'PesoMinPaquete')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoTarifa')->textInput() ?>

    <?= $form->field($model, 'fkNTC_UnidadMedida')->textInput() ?>

    <?= $form->field($model, 'TipoCosteManipulacion')->textInput() ?>

    <?= $form->field($model, 'CosteManipulacion')->textInput() ?>

    <?= $form->field($model, 'TiempoPreparacion')->textInput() ?>

    <?= $form->field($model, 'ImporteMinEnvioGratuito')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
