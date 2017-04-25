<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Lote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Lote',
            ['label'=>'Imagen', 
                'format'=>'raw',
                'value'=>function($data){
        
                    $imagen = \app\models\Fichero::find()->where(['fkNTC_TipoFichero'=>40, 'fkNTC_Articulo'=>$data->lotesArticulos[0]->articulo->idNTC_Articulo])->one();
    
                    return "<img src='https://www.poligonodecarrus.com/uploads/".$imagen->Fichero."' style='width:50px;'/>";
                }],
            'Nombre',
            
            'ReferenciaLote',
           
                        
            
            ['label'=>'Descripción', 
                'value'=> function ($data){
                    if($data->Descripcion)
                        return $data->Descripcion;
                    else
                        return '-';
                },
                'attribute'=>'Descripcion'],
            
             ['label'=>'Quitar',
                'value'=> function ($data){
                    if($data->Quitar==1)
                            return '<span style="color: #5CB85C"; class="glyphicon glyphicon-ok"></span>';
                    else
                        return  '<span style="color: #D9534F"; class="glyphicon glyphicon-remove"></span>';
                },
                'format'=>'raw',
                'attribute'=>'Quitar'
                        ],
            // 'Nuevo_DesdeFecha',
            // 'Nuevo_HastaFecha',
             
            ['label'=>'Surtido Libre',
                'value'=> function ($data){
                    if($data->surtido_libre==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                        
                'format'=>'raw',
                'attribute'=>'surtido_libre'],
            // 'Stock',
            // 'Look',
            // 'Modificado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
