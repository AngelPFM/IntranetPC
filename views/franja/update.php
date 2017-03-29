<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Franja */

$this->title = 'Update Franja: ' . $model->idNTC_Franja;
$this->params['breadcrumbs'][] = ['label' => 'Franjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Franja, 'url' => ['view', 'id' => $model->idNTC_Franja]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="franja-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
