<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CarritoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Carritos';
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
            ['class' => 'yii\grid\SerialColumn'],

           // 'idNTC_Carrito',
            //'fkNTC_UsuarioWeb',
            
            ['label'=>'Cliente', 
                'attribute'=>'fkNTC_Cliente'],
            
            
            
            
         
             'Fecha',
             'Abandonado',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
