<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\TarifaEnvio */

$this->title = $model->idNTC_TarifaEnvio;
$this->params['breadcrumbs'][] = ['label' => 'Tarifa Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifa-envio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_TarifaEnvio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_TarifaEnvio], [
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
            'idNTC_TarifaEnvio',
            'fkNTC_ProveedorEnvio',
            'fkNTC_MetodoEnvio',
            'fkNTC_Pais',
            'fkNTC_Provincia',
            'fkNTC_ZonaEnvio',
            'fkNTC_ModuloEnvio',
            'CodigoPostal',
            'PesoDesde',
            'PrecioEnvio',
            'PrecioEnvioPlus',
            'fkNTC_Divisa',
            'DiasEnvio',
            'Quitar',
        ],
    ]) ?>

</div>
