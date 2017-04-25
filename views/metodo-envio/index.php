<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MetodoEnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Metodos Envíos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodo-envio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Método Envío', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

           // 'idNTC_MetodoEnvio',
           
            'Nombre',
            'Descripcion:ntext',
            
            ['label'=>'Proveedor Envío', 
                'attribute'=>'fkNTC_ProveedorEnvio'],
             
            
            //'fkNTC_TipoValoracion',
            // 'fkNTC_TipoCalculo',
            // 'PesoMaxPaquete',
             'PesoMinPaquete',
            // 'fkNTC_TipoTarifa',
            // 'fkNTC_UnidadMedida',
            // 'TipoCosteManipulacion',
             
            ['label'=>'CosteManipulacion', 
                'value'=> function ($data){
                    if($data->CosteManipulacion)
                        return $data->CosteManipulacion;
                    else
                        return '-';
                },
                'attribute'=>'Apellidos'],  
            // 'TiempoPreparacion',
            // 'ImporteMinEnvioGratuito',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
