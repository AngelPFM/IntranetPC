<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pais-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Iso2')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Iso3')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Prefijo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ccTLD')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Divisa')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoIvaNegocio')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
