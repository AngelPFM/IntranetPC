<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Articulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="articulo-form">

    <?php $form = ActiveForm::begin(); ?>

    

    <?= $form->field($model, 'Referencia')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReferenciaProveedor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ReferenciaColor')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'DescripcionCorta')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Nuevo_DesdeFecha')->textInput() ?>

    <?= $form->field($model, 'Nuevo_HastaFecha')->textInput() ?>

    <?= $form->field($model, 'Habilitado')->textInput() ?>

    <?= $form->field($model, 'HabilitadoProfesionales')->textInput() ?>

    <?= $form->field($model, 'fkNTC_ConjuntoAtributos')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoIVAProducto')->textInput() ?>

    <?= $form->field($model, 'MetaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaRobots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_UnidadMedida')->textInput() ?>

    <?= $form->field($model, 'fkNTC_UnidadMedidaVenta')->textInput() ?>

    <?= $form->field($model, 'GestionExistencias')->textInput() ?>

    <?= $form->field($model, 'CantidadMinimaCarrito')->textInput() ?>

    <?= $form->field($model, 'CantidadMaximaCarrito')->textInput() ?>

    <?= $form->field($model, 'IncrementoCantidad')->textInput() ?>

    <?= $form->field($model, 'CantidadIncremento')->textInput() ?>

    <?= $form->field($model, 'CantidadMarcaSinStock')->textInput() ?>

    <?= $form->field($model, 'DivisibleParaEnvio')->textInput() ?>

    <?= $form->field($model, 'PedidosArticulosAgotados')->textInput() ?>

    <?= $form->field($model, 'AvisoClienteArticuloPedidoAgotado')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Almacen')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Marca')->textInput() ?>

    <?= $form->field($model, 'App')->textInput() ?>

    <?= $form->field($model, 'Stock')->textInput() ?>

    <?= $form->field($model, 'Art_modificado')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
