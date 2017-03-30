<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\EstaticosCMS */

$this->title = 'Update Estaticos Cms: ' . $model->idNTC_EstaticosCMS;
$this->params['breadcrumbs'][] = ['label' => 'Estaticos Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_EstaticosCMS, 'url' => ['view', 'id' => $model->idNTC_EstaticosCMS]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="estaticos-cms-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
