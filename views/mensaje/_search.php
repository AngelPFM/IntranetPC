<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MensajeSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="mensaje-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Mensaje') ?>

    <?= $form->field($model, 'fkNTC_OrigenMensaje') ?>

    <?= $form->field($model, 'Language') ?>

    <?= $form->field($model, 'Translation') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
