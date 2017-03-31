<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ModuloEnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Módulo Envíos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-envio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Módulo Envío', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           

            //'idNTC_ModuloEnvio',
            'Nombre',
           // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
