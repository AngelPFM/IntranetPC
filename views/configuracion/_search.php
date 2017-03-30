<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ConfiguracionSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="configuracion-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Configuracion') ?>

    <?= $form->field($model, 'fkNTC_Empresa') ?>

    <?= $form->field($model, 'fkNTC_TipoAltaUsuarios') ?>

    <?= $form->field($model, 'AvisoAltas') ?>

    <?= $form->field($model, 'MaxIntentosLogin') ?>

    <?php // echo $form->field($model, 'EdadMinimaUsuarios') ?>

    <?php // echo $form->field($model, 'EdadMaximaUsuarios') ?>

    <?php // echo $form->field($model, 'PeriodoPrevioValidezCtas') ?>

    <?php // echo $form->field($model, 'PeriodoValidezCtas') ?>

    <?php // echo $form->field($model, 'fkNTC_PaisPorDefecto') ?>

    <?php // echo $form->field($model, 'fkNTC_TiendaPorDefecto') ?>

    <?php // echo $form->field($model, 'fkNTC_FormaPago') ?>

    <?php // echo $form->field($model, 'fkNTC_MetodoEnvio') ?>

    <?php // echo $form->field($model, 'fkNTC_GrupoPrecioCliente') ?>

    <?php // echo $form->field($model, 'fkNTC_GrupoDescuentoCliente') ?>

    <?php // echo $form->field($model, 'VerArticulosSinPrecio') ?>

    <?php // echo $form->field($model, 'VerArticulosSinStock') ?>

    <?php // echo $form->field($model, 'VerVariantesSinStock') ?>

    <?php // echo $form->field($model, 'MinutosCaducidadCarritos') ?>

    <?php // echo $form->field($model, 'EmailContacto') ?>

    <?php // echo $form->field($model, 'fkNTC_Divisa') ?>

    <?php // echo $form->field($model, 'Translate') ?>

    <?php // echo $form->field($model, 'Maintenance') ?>

    <?php // echo $form->field($model, 'MaintenanceIPs') ?>

    <?php // echo $form->field($model, 'PrefijoTablas') ?>

    <?php // echo $form->field($model, 'RutaDocumentos') ?>

    <?php // echo $form->field($model, 'NumeroPostPagina') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
