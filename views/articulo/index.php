<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Articulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            //'idNTC_Articulo',
            //'fkNTC_TipoArticulo',
            ['label'=>'Imagen', 
                'format'=>'raw',
                'value'=>function($data){
        
                    $imagen = \app\models\Fichero::find()->where(['fkNTC_TipoFichero'=>40, 'fkNTC_Articulo'=>$data->idNTC_Articulo])->one();
    
                    return "<img src='https://www.poligonodecarrus.com/uploads/".$imagen->Fichero."' style='width:50px;'/>";
                }],
            'Referencia',
            ['label'=>'Referencia provedor', 
                'attribute'=>'ReferenciaProveedor']
            ,
            'ReferenciaColor',
             'Nombre',
            [
                'label'=>'Almacen',
                'attribute'=>'fkNTC_Almacen',
                'value'=>function($data){
                                   return $data->almacen->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Almacen::find()->where(['Quitar'=>0])->orderBy('Nombre')->all(),'idNTC_Almacen','Nombre')                    
                                    
                  ],
            [
                'label' => 'Marca',
                'attribute' => 'fkNTC_Marca',
                'value'=> function($data){
                                return $data->marca->Nombre;
                },
                
                 
            ],
                                    
                                    
            // 'Descripcion',
            // 'DescripcionCorta',
            // 'Nuevo_DesdeFecha',
            // 'Nuevo_HastaFecha',
            // 'Habilitado',
            // 'HabilitadoProfesionales',
            // 'fkNTC_ConjuntoAtributos',
            // 'fkNTC_TipoIVAProducto',
            // 'MetaTitle',
            // 'MetaKeywords',
            // 'MetaDescription',
            // 'MetaRobots',
            // 'fkNTC_UnidadMedida',
            // 'fkNTC_UnidadMedidaVenta',
            // 'GestionExistencias',
            // 'CantidadMinimaCarrito',
            // 'CantidadMaximaCarrito',
            // 'IncrementoCantidad',
            // 'CantidadIncremento',
            // 'CantidadMarcaSinStock',
            // 'DivisibleParaEnvio',
            // 'PedidosArticulosAgotados',
            // 'AvisoClienteArticuloPedidoAgotado',
            // 'Quitar',
            // 'fkNTC_Almacen',
            // 'fkNTC_Marca',
            // 'App',
            // 'Stock',
            // 'Art_modificado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
