<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Modulo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="modulo-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Modelo')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Sql')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Descripcion')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'MaxPorPagina')->textInput() ?>

    <?= $form->field($model, 'Padre')->textInput() ?>

    <?= $form->field($model, 'Visitas')->textInput() ?>

    <?= $form->field($model, 'Orden')->textInput() ?>

    <?= $form->field($model, 'Ordenacion')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'TraduccionMultiple')->textInput() ?>

    <?= $form->field($model, 'Csv')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
