<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CategoriaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Categorias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Categoria', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idNTC_Categoria',
            'Raiz',
            //'fkNTC_padre',
            'Nombre',
            'Titulo',
            // 'Descripcion:ntext',
            // 'Frase',
            // 'TieneHijos',
            // 'TituloPagina',
            // 'IncluirEnMenu',
            // 'Activa',
            // 'MostrarArticulos',
            // 'fkNTC_CMS',
            // 'MetaTitle',
            // 'MetaKeywords',
            // 'MetaDescription',
            // 'MetaRobots',
            // 'ConComposicion',
            // 'Orden',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
