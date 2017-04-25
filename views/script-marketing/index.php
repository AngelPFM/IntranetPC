<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScriptMarketingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Script Marketings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-marketing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Script Marketing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

           // 'idNTC_ScriptMarketing',
            
            ['label'=>'Nombre', 
                'value'=> function ($data){
                    if($data->Nombre)
                        return $data->Nombre;
                    else
                        return '-';
                },
                'attribute'=>'Nombre'],
           
            
            ['label'=>'Footer',
                'value'=> function ($data){
                    if($data->Footer==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
            
           
                        
                'format'=>'raw',
                'attribute'=>'Footer'],
            
            ['label'=>'Header',
                'value'=> function ($data){
                    if($data->Header==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format'=>'raw',
                'attribute'=>'Header'],
                        
             ['label'=>'Idioma', 
                'value'=> function ($data){
                    if($data->fkNTC_Idioma)
                        return $data->idioma->Nombre;
                    else
                        return '-';
                },
                'attribute'=>'fkNTC_Idioma'],       
                        
            
            ['label'=>'País', 
                'value'=> function ($data){
                    if($data->fkNTC_Pais)
                        return $data->pais->Nombre;
                    else
                        return '-';
                },
                'attribute'=>'fkNTC_Pais'],
            
            // 'Footer',
             
             ['label'=>'Pagina Pedido Ok',
                'value'=> function ($data){
                    if($data->PaginaPedidoOk==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format'=>'raw',
                'attribute'=>'PaginaPedidoOk'],
                                    
             
              ['label'=>'Home',
                'value'=> function ($data){
                    if($data->Home==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format'=>'raw',
                'attribute'=>'Home'],          
             
             ['label'=>'Registro',
                'value'=> function ($data){
                    if($data->Registro==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format'=>'raw',
                'attribute'=>'Registro'], 
            // 'look',
            // 'Script:ntext',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
