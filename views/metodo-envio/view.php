<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MetodoEnvio */

$this->title = $model->idNTC_MetodoEnvio;
$this->params['breadcrumbs'][] = ['label' => 'Metodo Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodo-envio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_MetodoEnvio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_MetodoEnvio], [
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
            'idNTC_MetodoEnvio',
            'fkNTC_ProveedorEnvio',
            'Nombre',
            'Descripcion:ntext',
            'fkNTC_TipoValoracion',
            'fkNTC_TipoCalculo',
            'PesoMaxPaquete',
            'PesoMinPaquete',
            'fkNTC_TipoTarifa',
            'fkNTC_UnidadMedida',
            'TipoCosteManipulacion',
            'CosteManipulacion',
            'TiempoPreparacion',
            'ImporteMinEnvioGratuito',
            'Quitar',
        ],
    ]) ?>

</div>
