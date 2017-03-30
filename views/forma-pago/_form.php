<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormaPago */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forma-pago-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idNTC_FormaPago')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'InfoAdicional')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Recargo')->textInput() ?>

    <?= $form->field($model, 'PorDefecto')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TerminoPago')->textInput() ?>

    <?= $form->field($model, 'Activa')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <?= $form->field($model, 'EnProduccion')->textInput() ?>

    <?= $form->field($model, 'UrlTest')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UrlProduccion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ValidacionPasiva')->textInput() ?>

    <?= $form->field($model, 'TokenValidacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UrlOK')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'UrlKO')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Gratuita')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
