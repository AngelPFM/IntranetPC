<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ModuloEnvioProvinciaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modulo-envio-provincia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'pkNTC_ModuloEnvioProvincia') ?>

    <?= $form->field($model, 'fkNTC_Provincia') ?>

    <?= $form->field($model, 'fkNTC_ModuloEnvio') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
