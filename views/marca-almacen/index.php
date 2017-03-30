<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\MarcaAlmacenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Marca Almacens';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-almacen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Marca Almacen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_MarcaAlmacen',
            'fkNTC_Marca',
            'fkNTC_Almacen',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
