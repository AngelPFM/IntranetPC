<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MenuSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'idNTC_Menu') ?>

    <?= $form->field($model, 'Nombre') ?>

    <?= $form->field($model, 'fkNTC_Padre') ?>

    <?= $form->field($model, 'fkNTC_TipoMenu') ?>

    <?= $form->field($model, 'fkNTC_Idioma') ?>

    <?php // echo $form->field($model, 'Descripcion') ?>

    <?php // echo $form->field($model, 'Frase') ?>

    <?php // echo $form->field($model, 'Url') ?>

    <?php // echo $form->field($model, 'Externo') ?>

    <?php // echo $form->field($model, 'Titulo') ?>

    <?php // echo $form->field($model, 'TieneHijos') ?>

    <?php // echo $form->field($model, 'Expandido') ?>

    <?php // echo $form->field($model, 'RequiereLogin') ?>

    <?php // echo $form->field($model, 'TablaTotales') ?>

    <?php // echo $form->field($model, 'fkNTC_UsuarioWeb') ?>

    <?php // echo $form->field($model, 'FiltroTotales') ?>

    <?php // echo $form->field($model, 'TablaCategorias') ?>

    <?php // echo $form->field($model, 'FiltroCategorias') ?>

    <?php // echo $form->field($model, 'Orden') ?>

    <?php // echo $form->field($model, 'Independiente') ?>

    <?php // echo $form->field($model, 'Ancho') ?>

    <?php // echo $form->field($model, 'HtmlClass') ?>

    <?php // echo $form->field($model, 'MetaTitle') ?>

    <?php // echo $form->field($model, 'MetaDescription') ?>

    <?php // echo $form->field($model, 'MetaKeywords') ?>

    <?php // echo $form->field($model, 'MetaRobots') ?>

    <?php // echo $form->field($model, 'Quitar') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
