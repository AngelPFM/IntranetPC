<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModuloEnvioProvinciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Modulo Envío Provincias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-envio-provincia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Modulo Envío Provincia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'pkNTC_ModuloEnvioProvincia',
           [
                'label'=>'Provincia',
                'attribute'=>'pkNTC_ModuloEnvioProvincia',
                'value'=>function($data){
                                   return $data->provincia->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Provincia::find()->all(),'idNTC_Provincia','Nombre')                   
                                    
                  ],
            //'fkNTC_Provincia',
            //'fkNTC_ModuloEnvio',
             [
                'label'=>'Modulo Envío',
                'attribute'=>'fkNTC_ModuloEnvio',
                'value'=>function($data){
                                   return $data->moduloEnvio->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\ModuloEnvio::find()->all(),'idNTC_ModuloEnvio','Nombre')                   
                                    
                  ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
