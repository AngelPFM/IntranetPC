<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cliente-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'NIF')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Localidad')->textInput() ?>

    <?= $form->field($model, 'Localidad')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Provincia')->textInput() ?>

    <?= $form->field($model, 'Provincia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodigoPostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Pais')->textInput() ?>

    <?= $form->field($model, 'PrefijoTelefono1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono1')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PrefijoTelefono2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sexo')->textInput() ?>

    <?= $form->field($model, 'fkNTC_FacturaACliente')->textInput() ?>

    <?= $form->field($model, 'Contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_TipoIvaNegocio')->textInput() ?>

    <?= $form->field($model, 'PrecioIvaIncluido')->textInput() ?>

    <?= $form->field($model, 'fkNTC_GrupoPrecioCliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_GrupoDescuentoCliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Divisa')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CifFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NombreFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DireccionFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'CodPostalFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'LocalidadFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_ProvinciaFactura')->textInput() ?>

    <?= $form->field($model, 'ProvinciaFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_PaisFactura')->textInput() ?>

    <?= $form->field($model, 'PaisFactura')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_LocalidadFactura')->textInput() ?>

    <?= $form->field($model, 'fkNTC_ConfiguracionIva')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'FechaRegistro')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
