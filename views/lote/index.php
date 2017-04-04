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
        
                    $imagen = \app\models\Fichero::find()->where(['fkNTC_TipoFichero'=>40, 'fkNTC_Articulo'=>$data->idNTC_Articulo])->one();
    
                    return "<img src='https://www.poligonodecarrus.com/uploads/".$imagen->Fichero."' style='width:50px;'/>";
                }],
            'Nombre',
            
            'ReferenciaLote',
            'Descripcion:ntext',
            'Quitar',
            // 'Nuevo_DesdeFecha',
            // 'Nuevo_HastaFecha',
             'surtido_libre',
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
