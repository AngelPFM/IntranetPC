<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="categoria-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Raiz')->textInput() ?>

    <?= $form->field($model, 'fkNTC_padre')->textInput() ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Frase')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TieneHijos')->textInput() ?>

    <?= $form->field($model, 'TituloPagina')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'IncluirEnMenu')->textInput() ?>

    <?= $form->field($model, 'Activa')->textInput() ?>

    <?= $form->field($model, 'MostrarArticulos')->textInput() ?>

    <?= $form->field($model, 'fkNTC_CMS')->textInput() ?>

    <?= $form->field($model, 'MetaTitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaKeywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaDescription')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'MetaRobots')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ConComposicion')->textInput() ?>

    <?= $form->field($model, 'Orden')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
