<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaVenta */

$this->title = 'Update Tarifa Venta: ' . $model->idNTC_TarifaVenta;
$this->params['breadcrumbs'][] = ['label' => 'Tarifa Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_TarifaVenta, 'url' => ['view', 'id' => $model->idNTC_TarifaVenta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tarifa-venta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
