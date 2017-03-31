<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\Modulo2Search */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Módulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Módulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

           // 'idNTC_Modulo',
            'Nombre',
            'Modelo',
           // 'Sql',
            'Descripcion:ntext',
            'MaxPorPagina',
             'Padre',
             'Visitas',
             'Orden',
            // 'Ordenacion',
            // 'TraduccionMultiple',
            // 'Csv',
             'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
