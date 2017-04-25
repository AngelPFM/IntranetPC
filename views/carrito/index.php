<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarritoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carrito';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrito-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Carrito', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

           // 'idNTC_Carrito',
            //'fkNTC_UsuarioWeb',
            
            ['label'=>'Cliente', 
                'attribute'=>'fkNTC_Cliente'],
            [
                'label'=>'Cliente',
                'attribute'=>'fkNTC_Cliente',
                'value'=>function($data){
                                   return $data->cliente->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Cliente::find()->all(),'idNTC_Cliente','Nombre')                   
                                    
                  ],
            
            
            
            
         
             'Fecha',
             
                                    
             ['label'=>'Abandonado',
                'value'=> function ($data){
                    if($data->Abandonado==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format'=>'raw',
                'attribute'=>'Abandonado'],
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
