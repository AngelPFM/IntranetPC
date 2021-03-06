<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MetodoEnvio */

$this->title = 'Update Metodo Envio: ' . $model->idNTC_MetodoEnvio;
$this->params['breadcrumbs'][] = ['label' => 'Metodo Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_MetodoEnvio, 'url' => ['view', 'id' => $model->idNTC_MetodoEnvio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="metodo-envio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
