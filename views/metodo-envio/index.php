<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MetodoEnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Metodo Envios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodo-envio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Metodo Envio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_MetodoEnvio',
            'fkNTC_ProveedorEnvio',
            'Nombre',
            'Descripcion:ntext',
            'fkNTC_TipoValoracion',
            // 'fkNTC_TipoCalculo',
            // 'PesoMaxPaquete',
            // 'PesoMinPaquete',
            // 'fkNTC_TipoTarifa',
            // 'fkNTC_UnidadMedida',
            // 'TipoCosteManipulacion',
            // 'CosteManipulacion',
            // 'TiempoPreparacion',
            // 'ImporteMinEnvioGratuito',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
