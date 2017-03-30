<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ClienteSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Cliente') ?>

    <?= $form->field($model, 'NIF') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Apellidos') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?php // echo $form->field($model, 'fkNTC_Localidad') ?>

    <?php // echo $form->field($model, 'Localidad') ?>

    <?php // echo $form->field($model, 'fkNTC_Provincia') ?>

    <?php // echo $form->field($model, 'Provincia') ?>

    <?php // echo $form->field($model, 'CodigoPostal') ?>

    <?php // echo $form->field($model, 'fkNTC_Pais') ?>

    <?php // echo $form->field($model, 'PrefijoTelefono1') ?>

    <?php // echo $form->field($model, 'Telefono1') ?>

    <?php // echo $form->field($model, 'PrefijoTelefono2') ?>

    <?php // echo $form->field($model, 'Telefono2') ?>

    <?php // echo $form->field($model, 'Sexo') ?>

    <?php // echo $form->field($model, 'fkNTC_FacturaACliente') ?>

    <?php // echo $form->field($model, 'Contacto') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Fax') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoIvaNegocio') ?>

    <?php // echo $form->field($model, 'PrecioIvaIncluido') ?>

    <?php // echo $form->field($model, 'fkNTC_GrupoPrecioCliente') ?>

    <?php // echo $form->field($model, 'fkNTC_GrupoDescuentoCliente') ?>

    <?php // echo $form->field($model, 'fkNTC_Divisa') ?>

    <?php // echo $form->field($model, 'fkNTC_Idioma') ?>

    <?php // echo $form->field($model, 'CifFactura') ?>

    <?php // echo $form->field($model, 'NombreFactura') ?>

    <?php // echo $form->field($model, 'DireccionFactura') ?>

    <?php // echo $form->field($model, 'CodPostalFactura') ?>

    <?php // echo $form->field($model, 'LocalidadFactura') ?>

    <?php // echo $form->field($model, 'fkNTC_ProvinciaFactura') ?>

    <?php // echo $form->field($model, 'ProvinciaFactura') ?>

    <?php // echo $form->field($model, 'fkNTC_PaisFactura') ?>

    <?php // echo $form->field($model, 'PaisFactura') ?>

    <?php // echo $form->field($model, 'fkNTC_LocalidadFactura') ?>

    <?php // echo $form->field($model, 'fkNTC_ConfiguracionIva') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'FechaRegistro') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
