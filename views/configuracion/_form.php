<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuracion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idNTC_Configuracion')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Empresa')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoAltaUsuarios')->textInput() ?>

    <?= $form->field($model, 'AvisoAltas')->textInput() ?>

    <?= $form->field($model, 'MaxIntentosLogin')->textInput() ?>

    <?= $form->field($model, 'EdadMinimaUsuarios')->textInput() ?>

    <?= $form->field($model, 'EdadMaximaUsuarios')->textInput() ?>

    <?= $form->field($model, 'PeriodoPrevioValidezCtas')->textInput() ?>

    <?= $form->field($model, 'PeriodoValidezCtas')->textInput() ?>

    <?= $form->field($model, 'fkNTC_PaisPorDefecto')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TiendaPorDefecto')->textInput() ?>

    <?= $form->field($model, 'fkNTC_FormaPago')->textInput() ?>

    <?= $form->field($model, 'fkNTC_MetodoEnvio')->textInput() ?>

    <?= $form->field($model, 'fkNTC_GrupoPrecioCliente')->textInput() ?>

    <?= $form->field($model, 'fkNTC_GrupoDescuentoCliente')->textInput() ?>

    <?= $form->field($model, 'VerArticulosSinPrecio')->textInput() ?>

    <?= $form->field($model, 'VerArticulosSinStock')->textInput() ?>

    <?= $form->field($model, 'VerVariantesSinStock')->textInput() ?>

    <?= $form->field($model, 'MinutosCaducidadCarritos')->textInput() ?>

    <?= $form->field($model, 'EmailContacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Divisa')->textInput() ?>

    <?= $form->field($model, 'Translate')->textInput() ?>

    <?= $form->field($model, 'Maintenance')->textInput() ?>

    <?= $form->field($model, 'MaintenanceIPs')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'PrefijoTablas')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'RutaDocumentos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'NumeroPostPagina')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
