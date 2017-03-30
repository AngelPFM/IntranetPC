<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\FormaPagoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="forma-pago-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_FormaPago') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'InfoAdicional') ?>

    <?= $form->field($model, 'Recargo') ?>

    <?php // echo $form->field($model, 'PorDefecto') ?>

    <?php // echo $form->field($model, 'fkNTC_TerminoPago') ?>

    <?php // echo $form->field($model, 'Activa') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'EnProduccion') ?>

    <?php // echo $form->field($model, 'UrlTest') ?>

    <?php // echo $form->field($model, 'UrlProduccion') ?>

    <?php // echo $form->field($model, 'ValidacionPasiva') ?>

    <?php // echo $form->field($model, 'TokenValidacion') ?>

    <?php // echo $form->field($model, 'UrlOK') ?>

    <?php // echo $form->field($model, 'UrlKO') ?>

    <?php // echo $form->field($model, 'Gratuita') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
