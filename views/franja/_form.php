<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Franja */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="franja-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'PrecioxPar')->textInput() ?>

    <?= $form->field($model, 'Incremento')->textInput() ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
