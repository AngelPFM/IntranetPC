<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AlmacenSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="almacen-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Almacen') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?= $form->field($model, 'Direccion') ?>

    <?= $form->field($model, 'fkNTC_Localidad') ?>

    <?php // echo $form->field($model, 'fkNTC_Provincia') ?>

    <?php // echo $form->field($model, 'CodigoPostal') ?>

    <?php // echo $form->field($model, 'fkNTC_Pais') ?>

    <?php // echo $form->field($model, 'Contacto') ?>

    <?php // echo $form->field($model, 'Transito') ?>

    <?php // echo $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Fax') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'Activa') ?>

    <?php // echo $form->field($model, 'fkNTC_UsuarioWeb') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
