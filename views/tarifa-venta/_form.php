<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaVenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifa-venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_TipoTarifaVenta')->textInput() ?>

    <?= $form->field($model, 'fkNTC_GrupoPrecioCliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Cliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Articulo')->textInput() ?>

    <?= $form->field($model, 'fkNTC_UnidadMedida')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Divisa')->textInput() ?>

    <?= $form->field($model, 'CantidadMinima')->textInput() ?>

    <?= $form->field($model, 'PrecioVenta')->textInput() ?>

    <?= $form->field($model, 'PrecioCoste')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Pais')->textInput() ?>

    <?= $form->field($model, 'FechaInicial')->textInput() ?>

    <?= $form->field($model, 'FechaFinal')->textInput() ?>

    <?= $form->field($model, 'PermiteDtoFactura')->textInput() ?>

    <?= $form->field($model, 'PermiteDtoLinea')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
