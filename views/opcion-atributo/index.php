<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpcionAtributoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opción Atributos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opcion-atributo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Opción Atributo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idNTC_OpcionAtributo',
            //'fkNTC_Atributo',
            [
                'label'=>'Atributo',
                'attribute'=>'fkNTC_Atributo',
                'value'=>function($data){
                                   return $data->atributo->Etiqueta;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Atributo::find()->where(['Quitar'=>0])->orderBy('Etiqueta')->all(),'idNTC_Atributo','Etiqueta')                    
                                    
                  ],
            'Nombre',
            'Opcion',
            'Descripcion',
             'Medida',
             'Orden',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
