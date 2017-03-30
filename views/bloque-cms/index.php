<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\BloqueCMSSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Bloque Cms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloque-cms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Bloque Cms', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_BloqueCMS',
            'fkNTC_Menu',
            'Nombre',
            'Titulo',
            'Frase',
            // 'Descripcion:ntext',
            // 'Independiente',
            // 'Ancho',
            // 'Orden',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
