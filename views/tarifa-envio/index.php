<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TarifaEnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarifa Envios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifa-envio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Tarifa Envio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_TarifaEnvio',
            
            ['label'=>'Proveedor', 
                'attribute'=>'fkNTC_ProveedorEnvio'],
            
            
            ['label'=>'Método de Envío', 
                'attribute'=>'fkNTC_MetodoEnvio'],
            
            ['label'=>'País', 
                'attribute'=>'fkNTC_Pais'],
            
            ['label'=>'Provincia', 
                'attribute'=>'fkNTC_Provincia'],
            // 'fkNTC_ZonaEnvio',
            // 'fkNTC_ModuloEnvio',
            'CodigoPostal',
             'PesoDesde',
             'PrecioEnvio',
            // 'PrecioEnvioPlus',
            // 'fkNTC_Divisa',
             'DiasEnvio',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
