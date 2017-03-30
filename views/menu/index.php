<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MenuSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Menus';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Menu', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_Menu',
            'Nombre',
            'fkNTC_Padre',
            'fkNTC_TipoMenu',
            'fkNTC_Idioma',
            // 'Descripcion:ntext',
            // 'Frase',
            // 'Url:url',
            // 'Externo',
            // 'Titulo',
            // 'TieneHijos',
            // 'Expandido',
            // 'RequiereLogin',
            // 'TablaTotales',
            // 'fkNTC_UsuarioWeb',
            // 'FiltroTotales',
            // 'TablaCategorias',
            // 'FiltroCategorias',
            // 'Orden',
            // 'Independiente',
            // 'Ancho',
            // 'HtmlClass',
            // 'MetaTitle',
            // 'MetaDescription',
            // 'MetaKeywords',
            // 'MetaRobots',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
