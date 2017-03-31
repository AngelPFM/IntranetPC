<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EscaparateSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Escaparates';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escaparate-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Escaparate', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Escaparate',
            //'fkNTC_Articulo',
            //'fkNTC_Categoria',
            'Titulo',
            //'Descripcion:ntext',
            // 'TextoBoton',
            // 'TextoDerecha',
            // 'Url:url',
             'Orden',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
