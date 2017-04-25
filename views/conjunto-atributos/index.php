<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConjuntoAtributosSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Conjunto Atributos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conjunto-atributos-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Conjunto Atributos', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_ConjuntoAtributos',
            'Nombre',
            
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
