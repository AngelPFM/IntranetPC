<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaVentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="tarifa-venta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_TarifaVenta') ?>

    <?= $form->field($model, 'fkNTC_TipoTarifaVenta') ?>

    <?= $form->field($model, 'fkNTC_GrupoPrecioCliente') ?>

    <?= $form->field($model, 'fkNTC_Cliente') ?>

    <?= $form->field($model, 'fkNTC_Articulo') ?>

    <?php // echo $form->field($model, 'fkNTC_UnidadMedida') ?>

    <?php // echo $form->field($model, 'fkNTC_Divisa') ?>

    <?php // echo $form->field($model, 'CantidadMinima') ?>

    <?php // echo $form->field($model, 'PrecioVenta') ?>

    <?php // echo $form->field($model, 'PrecioCoste') ?>

    <?php // echo $form->field($model, 'fkNTC_Pais') ?>

    <?php // echo $form->field($model, 'FechaInicial') ?>

    <?php // echo $form->field($model, 'FechaFinal') ?>

    <?php // echo $form->field($model, 'PermiteDtoFactura') ?>

    <?php // echo $form->field($model, 'PermiteDtoLinea') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
