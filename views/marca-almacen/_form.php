<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaAlmacen */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="marca-almacen-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'fkNTC_Marca')->textInput() ?>

    <?= $form->field($model, 'fkNTC_Almacen')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
