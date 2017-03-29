<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentoVenta */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="documento-venta-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_TipoDocumentoVenta')->textInput() ?>

    <?= $form->field($model, 'Numero')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fecha')->textInput() ?>

    <?= $form->field($model, 'fkNTC_NumSerie')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoEstadoPedido')->textInput() ?>

    <?= $form->field($model, 'fkNTC_ClienteVenta')->textInput() ?>

    <?= $form->field($model, 'NombreCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodPostalCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LocalidadCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProvinciaCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PaisCliente')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_ClienteFactura')->textInput() ?>

    <?= $form->field($model, 'CifFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NombreFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodPostalFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LocalidadFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_ProvinciaFactura')->textInput() ?>

    <?= $form->field($model, 'ProvinciaFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_PaisFactura')->textInput() ?>

    <?= $form->field($model, 'PaisFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Tienda')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TerminosPago')->textInput() ?>

    <?= $form->field($model, 'fkNTC_FormaPago')->textInput() ?>

    <?= $form->field($model, 'FechaVencimiento')->textInput() ?>

    <?= $form->field($model, 'PorcentajeDtoPP')->textInput() ?>

    <?= $form->field($model, 'FechaDtoPP')->textInput() ?>

    <?= $form->field($model, 'AlbaranValorado')->textInput() ?>

    <?= $form->field($model, 'EnviarFactura')->textInput() ?>

    <?= $form->field($model, 'Look')->textInput() ?>

    <?= $form->field($model, 'fkNTC_DireccionEnvio')->textInput() ?>

    <?= $form->field($model, 'DireccionEnvio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodPostalEnvio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LocalidadEnvio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ProvinciaEnvio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PaisEnvio')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'EnvioAtencionA')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Almacen')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TarifaEnvio')->textInput() ?>

    <?= $form->field($model, 'FechaEnvio')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Divisa')->textInput() ?>

    <?= $form->field($model, 'Peso')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FechaRegistro')->textInput() ?>

    <?= $form->field($model, 'Comentario')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'EnvioParcial')->textInput() ?>

    <?= $form->field($model, 'EnviadoCompletamente')->textInput() ?>

    <?= $form->field($model, 'FechaEntrega')->textInput() ?>

    <?= $form->field($model, 'ConfirmadaRecepcion')->textInput() ?>

    <?= $form->field($model, 'Importe')->textInput() ?>

    <?= $form->field($model, 'ImporteIvaIncl')->textInput() ?>

    <?= $form->field($model, 'Tracking')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Enviado')->textInput() ?>

    <?= $form->field($model, 'fkNTC_GrupoPrecioCliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_GrupoDtoCliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Portes')->textInput() ?>

    <?= $form->field($model, 'SobreAgencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TelefonoAgencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NombreAgencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ImportePortes')->textInput() ?>

    <?= $form->field($model, 'ImportePortesSI')->textInput() ?>

    <?= $form->field($model, 'IvaImporte')->textInput() ?>

    <?= $form->field($model, 'ImporteRecargo')->textInput() ?>

    <?= $form->field($model, 'LogAlm')->textInput() ?>

    <?= $form->field($model, 'ImporteSLA')->textInput() ?>

    <?= $form->field($model, 'Total')->textInput() ?>

    <?= $form->field($model, 'PcIVA')->textInput() ?>

    <?= $form->field($model, 'ImpCR')->textInput() ?>

    <?= $form->field($model, 'ga')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
