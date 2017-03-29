<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentoVentaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-venta-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_DocumentoVenta') ?>

    <?= $form->field($model, 'fkNTC_TipoDocumentoVenta') ?>

    <?= $form->field($model, 'Numero') ?>

    <?= $form->field($model, 'Fecha') ?>

    <?= $form->field($model, 'fkNTC_NumSerie') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoEstadoPedido') ?>

    <?php // echo $form->field($model, 'fkNTC_ClienteVenta') ?>

    <?php // echo $form->field($model, 'NombreCliente') ?>

    <?php // echo $form->field($model, 'DireccionCliente') ?>

    <?php // echo $form->field($model, 'CodPostalCliente') ?>

    <?php // echo $form->field($model, 'LocalidadCliente') ?>

    <?php // echo $form->field($model, 'ProvinciaCliente') ?>

    <?php // echo $form->field($model, 'PaisCliente') ?>

    <?php // echo $form->field($model, 'fkNTC_ClienteFactura') ?>

    <?php // echo $form->field($model, 'CifFactura') ?>

    <?php // echo $form->field($model, 'NombreFactura') ?>

    <?php // echo $form->field($model, 'DireccionFactura') ?>

    <?php // echo $form->field($model, 'CodPostalFactura') ?>

    <?php // echo $form->field($model, 'LocalidadFactura') ?>

    <?php // echo $form->field($model, 'fkNTC_ProvinciaFactura') ?>

    <?php // echo $form->field($model, 'ProvinciaFactura') ?>

    <?php // echo $form->field($model, 'fkNTC_PaisFactura') ?>

    <?php // echo $form->field($model, 'PaisFactura') ?>

    <?php // echo $form->field($model, 'fkNTC_Tienda') ?>

    <?php // echo $form->field($model, 'fkNTC_TerminosPago') ?>

    <?php // echo $form->field($model, 'fkNTC_FormaPago') ?>

    <?php // echo $form->field($model, 'FechaVencimiento') ?>

    <?php // echo $form->field($model, 'PorcentajeDtoPP') ?>

    <?php // echo $form->field($model, 'FechaDtoPP') ?>

    <?php // echo $form->field($model, 'AlbaranValorado') ?>

    <?php // echo $form->field($model, 'EnviarFactura') ?>

    <?php // echo $form->field($model, 'Look') ?>

    <?php // echo $form->field($model, 'fkNTC_DireccionEnvio') ?>

    <?php // echo $form->field($model, 'DireccionEnvio') ?>

    <?php // echo $form->field($model, 'CodPostalEnvio') ?>

    <?php // echo $form->field($model, 'LocalidadEnvio') ?>

    <?php // echo $form->field($model, 'ProvinciaEnvio') ?>

    <?php // echo $form->field($model, 'PaisEnvio') ?>

    <?php // echo $form->field($model, 'EnvioAtencionA') ?>

    <?php // echo $form->field($model, 'fkNTC_Almacen') ?>

    <?php // echo $form->field($model, 'fkNTC_TarifaEnvio') ?>

    <?php // echo $form->field($model, 'FechaEnvio') ?>

    <?php // echo $form->field($model, 'fkNTC_Divisa') ?>

    <?php // echo $form->field($model, 'Peso') ?>

    <?php // echo $form->field($model, 'FechaRegistro') ?>

    <?php // echo $form->field($model, 'Comentario') ?>

    <?php // echo $form->field($model, 'EnvioParcial') ?>

    <?php // echo $form->field($model, 'EnviadoCompletamente') ?>

    <?php // echo $form->field($model, 'FechaEntrega') ?>

    <?php // echo $form->field($model, 'ConfirmadaRecepcion') ?>

    <?php // echo $form->field($model, 'Importe') ?>

    <?php // echo $form->field($model, 'ImporteIvaIncl') ?>

    <?php // echo $form->field($model, 'Tracking') ?>

    <?php // echo $form->field($model, 'Enviado') ?>

    <?php // echo $form->field($model, 'fkNTC_GrupoPrecioCliente') ?>

    <?php // echo $form->field($model, 'fkNTC_GrupoDtoCliente') ?>

    <?php // echo $form->field($model, 'fkNTC_Portes') ?>

    <?php // echo $form->field($model, 'SobreAgencia') ?>

    <?php // echo $form->field($model, 'TelefonoAgencia') ?>

    <?php // echo $form->field($model, 'NombreAgencia') ?>

    <?php // echo $form->field($model, 'ImportePortes') ?>

    <?php // echo $form->field($model, 'ImportePortesSI') ?>

    <?php // echo $form->field($model, 'IvaImporte') ?>

    <?php // echo $form->field($model, 'ImporteRecargo') ?>

    <?php // echo $form->field($model, 'LogAlm') ?>

    <?php // echo $form->field($model, 'ImporteSLA') ?>

    <?php // echo $form->field($model, 'Total') ?>

    <?php // echo $form->field($model, 'PcIVA') ?>

    <?php // echo $form->field($model, 'ImpCR') ?>

    <?php // echo $form->field($model, 'ga') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
