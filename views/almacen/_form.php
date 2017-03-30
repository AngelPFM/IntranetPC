<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Almacen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="almacen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Direccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Localidad')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Provincia')->textInput() ?>

    <?= $form->field($model, 'CodigoPostal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Pais')->textInput() ?>

    <?= $form->field($model, 'Contacto')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Transito')->textInput() ?>

    <?= $form->field($model, 'Telefono')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Fax')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'Activa')->textInput() ?>

    <?= $form->field($model, 'fkNTC_UsuarioWeb')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
