<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaVenta */

$this->title = $model->idNTC_TarifaVenta;
$this->params['breadcrumbs'][] = ['label' => 'Tarifa Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifa-venta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_TarifaVenta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_TarifaVenta], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idNTC_TarifaVenta',
            'fkNTC_TipoTarifaVenta',
            'fkNTC_GrupoPrecioCliente',
            'fkNTC_Cliente',
            'fkNTC_Articulo',
            'fkNTC_UnidadMedida',
            'fkNTC_Divisa',
            'CantidadMinima',
            'PrecioVenta',
            'PrecioCoste',
            'fkNTC_Pais',
            'FechaInicial',
            'FechaFinal',
            'PermiteDtoFactura',
            'PermiteDtoLinea',
            'Quitar',
        ],
    ]) ?>

</div>
