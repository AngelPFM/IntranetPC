<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OperacionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Operaciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Operacion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_Operacion',
            'fkNTC_Cliente',
            'fkNTC_DocumentoVenta',
            'fkNTC_FormaPago',
            'fkNTC_Tienda',
            // 'fkNTC_Divisa',
            // 'FechaOperacion',
            // 'FechaEstado',
            // 'ImporteMoneda',
            // 'ImporteEur',
            // 'Referencia',
            // 'ReferenciaPago',
            // 'Descripcion',
            // 'EstadoPago',
            // 'Aplicada',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
