<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FranjasSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Franja';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="franja-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Franja', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Franja',
            
            ['label'=>'Precio por par', 
                'attribute'=>'PrecioxPar'],
            'Incremento',
            //'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
