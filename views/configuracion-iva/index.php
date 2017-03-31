<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConfiguracionIvaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configuracion Iva';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuracion-iva-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Configuracion Iva', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

            //'idNTC_ConfiguracionIva',
            //'fkNTC_TipoIVAProducto',
            //'fkNTC_TipoIVANegocio',
            'Nombre',
            
            ['label'=>'Tipo Iva Producto', 
                'attribute'=>'fkNTC_TipoIVAProducto'],
            
            ['label'=>'Tipo Iva Negocio', 
                'attribute'=>'fkNTC_TipoIVANegocio'],
            
            ['label'=>'% Iva', 
                'attribute'=>'PorcIva'],
            
             
            ['label'=>'Tipo Calculo Iva', 
                'attribute'=>'fkNTC_TipoCalculoIVA'],
            
            
            
            ['label'=>'% Rec. Equiv.', 
                'attribute'=>'PorcRecargoEquivalencia'],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
