<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NumSerieSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Num Series';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="num-serie-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Num Serie', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_NumSerie',
            'Nombre',
            'Descripcion',
            'Desde',
            'Hasta',
            // 'Ultimo',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
