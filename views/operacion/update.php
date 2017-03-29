<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */

$this->title = 'Update Operacion: ' . $model->idNTC_Operacion;
$this->params['breadcrumbs'][] = ['label' => 'Operacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Operacion, 'url' => ['view', 'id' => $model->idNTC_Operacion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="operacion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
