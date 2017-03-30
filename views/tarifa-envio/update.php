<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaEnvio */

$this->title = 'Update Tarifa Envio: ' . $model->idNTC_TarifaEnvio;
$this->params['breadcrumbs'][] = ['label' => 'Tarifa Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_TarifaEnvio, 'url' => ['view', 'id' => $model->idNTC_TarifaEnvio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarifa-envio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
