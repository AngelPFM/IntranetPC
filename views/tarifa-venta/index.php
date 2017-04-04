<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\TarifaVentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Tarifa Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifa-venta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Tarifa Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
          

            //'idNTC_TarifaVenta',
            ['label'=>'Tarifa Venta', 
                'attribute'=>'idNTC_TarifaVenta'],
            //'fkNTC_TipoTarifaVenta',
            
            ['label'=>'Grupo Precio Clienten', 
                'attribute'=>'fkNTC_GrupoPrecioCliente'],
            
            //'fkNTC_Cliente',
            
            ['label'=>'Artículo', 
                'attribute'=>'fkNTC_Articulo'],
            [
                'label'=>'Artículo',
                'attribute'=>'fkNTC_Articulo',
                'value'=>function($data){
                                   return $data->articulo->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Articulo::find()->where(['Quitar'=>0])->orderBy('Nombre')->all(),'idNTC_Articulo','Nombre')                    
                                    
                  ],
             
            ['label'=>'Unidad Medida', 
                'attribute'=>'fkNTC_UnidadMedida'],
             
            ['label'=>'País', 
                'value'=> function ($data){
                    if($data->fkNTC_Pais)
                        return $data->pais->Nombre;
                    else
                        return '-';
                },
                'attribute'=>'fkNTC_Pais'],
             
            ['label'=>'Divisa', 
                'value'=> function ($data){

                        return $data->divisa->Nombre;
                },
                'attribute'=>'fkNTC_Divisa'],
            
            
             'CantidadMinima',
            // 'PrecioVenta',
            // 'PrecioCoste',
            // 'fkNTC_Pais',
             
            ['label'=>'Activa desde', 
                'attribute'=>'FechaInicial'],
             
            ['label'=>'Activa hasta', 
                'attribute'=>'FechaFinal'],
             
            
            ['label'=>'PermitirDesc.Factura',
                'value'=> function ($data){
                    if($data->PermiteDtoFactura==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                        
                'format'=>'raw',
                'attribute'=>'PermiteDtoFactura'],
            
             
            ['label'=>'PermitirDesc.Linea',
                'value'=> function ($data){
                    if($data->PermiteDtoFactura==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format' => 'raw',
                'attribute' => 'PermiteDtoLinea'],        
            
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
