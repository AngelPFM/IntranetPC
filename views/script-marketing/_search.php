<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptMarketingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="script-marketing-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_ScriptMarketing') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'fkNTC_Idioma') ?>

    <?= $form->field($model, 'fkNTC_Pais') ?>

    <?= $form->field($model, 'Header') ?>

    <?php // echo $form->field($model, 'Footer') ?>

    <?php // echo $form->field($model, 'PaginaPedidoOk') ?>

    <?php // echo $form->field($model, 'Home') ?>

    <?php // echo $form->field($model, 'Registro') ?>

    <?php // echo $form->field($model, 'look') ?>

    <?php // echo $form->field($model, 'Script') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
