<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PaisSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Paises';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear País', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Pais',
             
            ['label'=>'TipoIvaNegocio', 
                'attribute'=>'fkNTC_TipoIvaNegocio'],
            'Nombre',
            
            
            [
                'label'=>'Idioma',
                'attribute'=>'NTC_Idioma',
                'value'=>function($data){
                                   return $data->idioma->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Idioma::find()->all(),'idNTC_Idioma','Nombre')                   
                                    
                  ],
            'Iso2',
            'Iso3',
             'Prefijo',
             'ccTLD',
             
            ['label'=>'Divisa', 
                'attribute'=>'fkNTC_Divisa'],
            // 'fkNTC_TipoIvaNegocio',
            'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
