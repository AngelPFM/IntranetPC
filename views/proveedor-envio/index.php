<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProveedorEnvioSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Proveedor Envios';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedor-envio-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Proveedor Envio', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_ProveedorEnvio',
            'Nombre',
            'UrlProduccion:url',
            'UrlPruebas:url',
            'IdCliente',
            // 'CuentaCliente',
            // 'Key',
            // 'Password',
            // 'SandBox',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
