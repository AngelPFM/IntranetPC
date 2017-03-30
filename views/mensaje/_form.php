<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Mensaje */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensaje-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_OrigenMensaje')->textInput() ?>

    <?= $form->field($model, 'Language')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Translation')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
