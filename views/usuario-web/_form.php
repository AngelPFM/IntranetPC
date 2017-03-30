<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioWeb */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="usuario-web-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_TipoUsuarioWeb')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Cliente')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Hash')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MaxIntentos')->textInput() ?>

    <?= $form->field($model, 'FechaValidezIni')->textInput() ?>

    <?= $form->field($model, 'FechaValidezFin')->textInput() ?>

    <?= $form->field($model, 'FechaRegistro')->textInput() ?>

    <?= $form->field($model, 'FechaUltimoAcceso')->textInput() ?>

    <?= $form->field($model, 'FechaActualAcceso')->textInput() ?>

    <?= $form->field($model, 'Activo')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'FechaNacimiento')->textInput() ?>

    <?= $form->field($model, 'IdFacebook')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdTwitter')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdLinkedin')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdGoogle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdGithub')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IdLive')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput() ?>

    <?= $form->field($model, 'Cif')->textInput() ?>

    <?= $form->field($model, 'Token')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FechaCad')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
