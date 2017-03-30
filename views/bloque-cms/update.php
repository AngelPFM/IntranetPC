<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\BloqueCMS */

$this->title = 'Update Bloque Cms: ' . $model->idNTC_BloqueCMS;
$this->params['breadcrumbs'][] = ['label' => 'Bloque Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_BloqueCMS, 'url' => ['view', 'id' => $model->idNTC_BloqueCMS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="bloque-cms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
