<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuloEnvio */

$this->title = 'Update Modulo Envio: ' . $model->idNTC_ModuloEnvio;
$this->params['breadcrumbs'][] = ['label' => 'Modulo Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_ModuloEnvio, 'url' => ['view', 'id' => $model->idNTC_ModuloEnvio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modulo-envio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
