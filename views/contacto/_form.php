<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="contacto-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Apellidos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Asunto')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Comentario')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'fkNTC_UsuarioWeb')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Cliente')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'FechaAlta')->textInput() ?>

    <?= $form->field($model, 'IpContacto')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
