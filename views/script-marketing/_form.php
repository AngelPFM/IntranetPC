<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptMarketing */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="script-marketing-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Nombre')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Idioma')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'fkNTC_Pais')->textInput() ?>

    <?= $form->field($model, 'Header')->textInput() ?>

    <?= $form->field($model, 'Footer')->textInput() ?>

    <?= $form->field($model, 'PaginaPedidoOk')->textInput() ?>

    <?= $form->field($model, 'Home')->textInput() ?>

    <?= $form->field($model, 'Registro')->textInput() ?>

    <?= $form->field($model, 'look')->textInput() ?>

    <?= $form->field($model, 'Script')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'Quitar')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
