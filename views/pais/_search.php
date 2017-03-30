<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PaisSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="pais-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Pais') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'fkNTC_Idioma') ?>

    <?= $form->field($model, 'Iso2') ?>

    <?= $form->field($model, 'Iso3') ?>

    <?php // echo $form->field($model, 'Prefijo') ?>

    <?php // echo $form->field($model, 'ccTLD') ?>

    <?php // echo $form->field($model, 'fkNTC_Divisa') ?>

    <?php // echo $form->field($model, 'fkNTC_TipoIvaNegocio') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
