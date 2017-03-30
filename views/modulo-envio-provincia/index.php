<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModuloEnvioProvinciaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Modulo Envio Provincias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-envio-provincia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Modulo Envio Provincia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'pkNTC_ModuloEnvioProvincia',
            'fkNTC_Provincia',
            'fkNTC_ModuloEnvio',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
