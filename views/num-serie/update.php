<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\NumSerie */

$this->title = 'Update Num Serie: ' . $model->idNTC_NumSerie;
$this->params['breadcrumbs'][] = ['label' => 'Num Series', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_NumSerie, 'url' => ['view', 'id' => $model->idNTC_NumSerie]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="num-serie-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
