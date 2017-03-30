<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EscaparateSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="escaparate-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Escaparate') ?>

    <?= $form->field($model, 'fkNTC_Articulo') ?>

    <?= $form->field($model, 'fkNTC_Categoria') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'TextoBoton') ?>

    <?php // echo $form->field($model, 'TextoDerecha') ?>

    <?php // echo $form->field($model, 'Url') ?>

    <?php // echo $form->field($model, 'Orden') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
