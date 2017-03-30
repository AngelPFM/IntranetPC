<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProveedorEnvio */

$this->title = 'Update Proveedor Envio: ' . $model->idNTC_ProveedorEnvio;
$this->params['breadcrumbs'][] = ['label' => 'Proveedor Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_ProveedorEnvio, 'url' => ['view', 'id' => $model->idNTC_ProveedorEnvio]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="proveedor-envio-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
