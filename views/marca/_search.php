<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marca-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Marca') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Imagen') ?>

    <?= $form->field($model, 'Orden') ?>

    <?= $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
