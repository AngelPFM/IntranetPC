<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\CategoriaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Categoria') ?>

    <?= $form->field($model, 'Raiz') ?>

    <?= $form->field($model, 'fkNTC_padre') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'Titulo') ?>

    <?php // echo $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'Frase') ?>

    <?php // echo $form->field($model, 'TieneHijos') ?>

    <?php // echo $form->field($model, 'TituloPagina') ?>

    <?php // echo $form->field($model, 'IncluirEnMenu') ?>

    <?php // echo $form->field($model, 'Activa') ?>

    <?php // echo $form->field($model, 'MostrarArticulos') ?>

    <?php // echo $form->field($model, 'fkNTC_CMS') ?>

    <?php // echo $form->field($model, 'MetaTitle') ?>

    <?php // echo $form->field($model, 'MetaKeywords') ?>

    <?php // echo $form->field($model, 'MetaDescription') ?>

    <?php // echo $form->field($model, 'MetaRobots') ?>

    <?php // echo $form->field($model, 'ConComposicion') ?>

    <?php // echo $form->field($model, 'Orden') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
