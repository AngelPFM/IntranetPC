<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ContactoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacto-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Contacto') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Apellidos') ?>

    <?= $form->field($model, 'Telefono') ?>

    <?= $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Asunto') ?>

    <?php // echo $form->field($model, 'Comentario') ?>

    <?php // echo $form->field($model, 'fkNTC_UsuarioWeb') ?>

    <?php // echo $form->field($model, 'fkNTC_Cliente') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'FechaAlta') ?>

    <?php // echo $form->field($model, 'IpContacto') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
