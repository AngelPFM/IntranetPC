<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EmpresaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="empresa-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Empresa') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Dominio') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'Slogan') ?>

    <?php // echo $form->field($model, 'HorarioContacto') ?>

    <?php // echo $form->field($model, 'Latitud') ?>

    <?php // echo $form->field($model, 'Longitud') ?>

    <?php // echo $form->field($model, 'Direccion1') ?>

    <?php // echo $form->field($model, 'DireccionDos') ?>

    <?php // echo $form->field($model, 'CP') ?>

    <?php // echo $form->field($model, 'Localizacion') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Emaillook') ?>

    <?php // echo $form->field($model, 'Titulo') ?>

    <?php // echo $form->field($model, 'BajoTitulo') ?>

    <?php // echo $form->field($model, 'NumerosDeCuenta') ?>

    <?php // echo $form->field($model, 'metaRobots') ?>

    <?php // echo $form->field($model, 'metaKeywords') ?>

    <?php // echo $form->field($model, 'metaDescription') ?>

    <?php // echo $form->field($model, 'metaTitle') ?>

    <?php // echo $form->field($model, 'metaContent') ?>

    <?php // echo $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Fax') ?>

    <?php // echo $form->field($model, 'Agrupacion') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
