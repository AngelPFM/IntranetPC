<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EstaticosCMSSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="estaticos-cms-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_EstaticosCMS') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?= $form->field($model, 'Descripcion') ?>

    <?= $form->field($model, 'fkNTC_Idioma') ?>

    <?php // echo $form->field($model, 'IsHTML') ?>

    <?php // echo $form->field($model, 'EstilosCSS') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <?php // echo $form->field($model, 'MetaTitle') ?>

    <?php // echo $form->field($model, 'MetaDescription') ?>

    <?php // echo $form->field($model, 'MetaKeywords') ?>

    <?php // echo $form->field($model, 'MetaRobots') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
