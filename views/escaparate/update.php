<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Escaparate */

$this->title = 'Update Escaparate: ' . $model->idNTC_Escaparate;
$this->params['breadcrumbs'][] = ['label' => 'Escaparates', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Escaparate, 'url' => ['view', 'id' => $model->idNTC_Escaparate]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="escaparate-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
