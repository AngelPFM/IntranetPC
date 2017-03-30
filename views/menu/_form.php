<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="menu-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Padre')->textInput() ?>

    <?= $form->field($model, 'fkNTC_TipoMenu')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Frase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Url')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Externo')->textInput() ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TieneHijos')->textInput() ?>

    <?= $form->field($model, 'Expandido')->textInput() ?>

    <?= $form->field($model, 'RequiereLogin')->textInput() ?>

    <?= $form->field($model, 'TablaTotales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_UsuarioWeb')->textInput() ?>

    <?= $form->field($model, 'FiltroTotales')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TablaCategorias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'FiltroCategorias')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Orden')->textInput() ?>

    <?= $form->field($model, 'Independiente')->textInput() ?>

    <?= $form->field($model, 'Ancho')->textInput() ?>

    <?= $form->field($model, 'HtmlClass')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaRobots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
