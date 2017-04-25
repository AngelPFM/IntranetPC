<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoteArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lote Artículos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lote-articulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Lote Artículo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

           //'idNTC_LoteArticulo',
            //'fkNTC_Lote',
            //'fkNTC_Articulo',
            'Cantidad',
            //'fkNTC_Variante',
            
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
