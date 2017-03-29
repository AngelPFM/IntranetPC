<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\RolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Rols';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rol-index">

    <h1>Roles</h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Rol', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idNTC_Rol',
            
            'Nombre',
            //'Quitar',    
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
