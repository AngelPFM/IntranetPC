<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MarcaAlmacenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marca Almacenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-almacen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Marca Almacen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_MarcaAlmacen',
            [
                'label'=>'Marca',
                'attribute'=>'fkNTC_Marca',
                'value'=>function($data){
                                   return $data->marca->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Marca::find()->where(['Quitar'=>0])->orderBy('Nombre')->all(),'idNTC_Marca','Nombre')                    
                                    
                  ],
            //'fkNTC_Marca',
            //'fkNTC_Almacen',
                                    [
                'label'=>'Almacen',
                'attribute'=>'fkNTC_Almacen',
                'value'=>function($data){
                                   return $data->almacen->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Almacen::find()->where(['Quitar'=>0])->orderBy('Nombre')->all(),'idNTC_Almacen','Nombre')                    
                                    
                  ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
