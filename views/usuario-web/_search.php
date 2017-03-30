<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioWebSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-web-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_UsuarioWeb') ?>

    <?= $form->field($model, 'fkNTC_TipoUsuarioWeb') ?>

    <?= $form->field($model, 'fkNTC_Cliente') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Apellidos') ?>

    <?php // echo $form->field($model, 'Email') ?>

    <?php // echo $form->field($model, 'Hash') ?>

    <?php // echo $form->field($model, 'MaxIntentos') ?>

    <?php // echo $form->field($model, 'FechaValidezIni') ?>

    <?php // echo $form->field($model, 'FechaValidezFin') ?>

    <?php // echo $form->field($model, 'FechaRegistro') ?>

    <?php // echo $form->field($model, 'FechaUltimoAcceso') ?>

    <?php // echo $form->field($model, 'FechaActualAcceso') ?>

    <?php // echo $form->field($model, 'Activo') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'FechaNacimiento') ?>

    <?php // echo $form->field($model, 'IdFacebook') ?>

    <?php // echo $form->field($model, 'IdTwitter') ?>

    <?php // echo $form->field($model, 'IdLinkedin') ?>

    <?php // echo $form->field($model, 'IdGoogle') ?>

    <?php // echo $form->field($model, 'IdGithub') ?>

    <?php // echo $form->field($model, 'IdLive') ?>

    <?php // echo $form->field($model, 'Telefono') ?>

    <?php // echo $form->field($model, 'Cif') ?>

    <?php // echo $form->field($model, 'Token') ?>

    <?php // echo $form->field($model, 'FechaCad') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
