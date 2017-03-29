<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ArticuloSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Articulo') ?>

    <?= $form->field($model, 'fkNTC_TipoArticulo') ?>

    <?= $form->field($model, 'Referencia') ?>

    <?= $form->field($model, 'ReferenciaProveedor') ?>

    <?= $form->field($model, 'ReferenciaColor') ?>

    <?php // echo $form->field($model, 'Nombre') ?>

    <?php // echo $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'DescripcionCorta') ?>

    <?php // echo $form->field($model, 'Nuevo_DesdeFecha') ?>

    <?php // echo $form->field($model, 'Nuevo_HastaFecha') ?>

    <?php // echo $form->field($model, 'Habilitado') ?>

    <?php // echo $form->field($model, 'HabilitadoProfesionales') ?>

    <?php // echo $form->field($model, 'fkNTC_ConjuntoAtributos') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoIVAProducto') ?>

    <?php // echo $form->field($model, 'MetaTitle') ?>

    <?php // echo $form->field($model, 'MetaKeywords') ?>

    <?php // echo $form->field($model, 'MetaDescription') ?>

    <?php // echo $form->field($model, 'MetaRobots') ?>

    <?php // echo $form->field($model, 'fkNTC_UnidadMedida') ?>

    <?php // echo $form->field($model, 'fkNTC_UnidadMedidaVenta') ?>

    <?php // echo $form->field($model, 'GestionExistencias') ?>

    <?php // echo $form->field($model, 'CantidadMinimaCarrito') ?>

    <?php // echo $form->field($model, 'CantidadMaximaCarrito') ?>

    <?php // echo $form->field($model, 'IncrementoCantidad') ?>

    <?php // echo $form->field($model, 'CantidadIncremento') ?>

    <?php // echo $form->field($model, 'CantidadMarcaSinStock') ?>

    <?php // echo $form->field($model, 'DivisibleParaEnvio') ?>

    <?php // echo $form->field($model, 'PedidosArticulosAgotados') ?>

    <?php // echo $form->field($model, 'AvisoClienteArticuloPedidoAgotado') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'fkNTC_Almacen') ?>

    <?php // echo $form->field($model, 'fkNTC_Marca') ?>

    <?php // echo $form->field($model, 'App') ?>

    <?php // echo $form->field($model, 'Stock') ?>

    <?php // echo $form->field($model, 'Art_modificado') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
