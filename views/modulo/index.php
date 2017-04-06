<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Modulo2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Módulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Módulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

           // 'idNTC_Modulo',
            'Nombre',
            
           ['label'=>'Modelo', 
                'value'=> function ($data){
                    if($data->Modelo)
                        return $data->Modelo->Nombre;
                    else
                        return '-';
                },
                'attribute'=>'Modelo'],
           // 'Sql',
            
                        
                ['label'=>'Descripción', 
                'value'=> function ($data){
                    if($data->Descripcion)
                        return $data->Descripcion->Nombre;
                    else
                        return '-';
                },
                'attribute'=>'Descripcion'],
            'MaxPorPagina',
             'Padre',
             'Visitas',
             'Orden',
            // 'Ordenacion',
            // 'TraduccionMultiple',
            // 'Csv',
             'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
