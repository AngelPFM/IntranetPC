<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\LoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lote-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Lote', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Lote',
            'Nombre',
            
            'ReferenciaLote',
            'Descripcion:ntext',
            'Quitar',
            // 'Nuevo_DesdeFecha',
            // 'Nuevo_HastaFecha',
            // 'surtido_libre',
            // 'Stock',
            // 'Look',
            // 'Modificado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
