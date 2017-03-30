<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Portes */

$this->title = 'Update Portes: ' . $model->idNTC_Portes;
$this->params['breadcrumbs'][] = ['label' => 'Portes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Portes, 'url' => ['view', 'id' => $model->idNTC_Portes]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="portes-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
