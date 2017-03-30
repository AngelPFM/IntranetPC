<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EstaticosCMSSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Estaticos Cms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estaticos-cms-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Estaticos Cms', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_EstaticosCMS',
            'Nombre',
            'Titulo',
            'Descripcion:ntext',
            'fkNTC_Idioma',
            // 'IsHTML',
            // 'EstilosCSS',
            // 'Quitar',
            // 'MetaTitle',
            // 'MetaDescription',
            // 'MetaKeywords',
            // 'MetaRobots',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
