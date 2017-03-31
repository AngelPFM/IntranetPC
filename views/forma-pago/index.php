<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\FormaPagoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Forma de Pagos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forma-pago-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Forma de Pago', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_FormaPago',
            'Nombre',
            'Descripcion',
            'EnProduccion',
            'Activa',
            //'InfoAdicional:ntext',
            //'Recargo',
            // 'PorDefecto',
            
            ['label'=>'Termino de pago', 
                'attribute'=>'fkNTC_TerminoPago'],
            // 'Activa',
            // 'Quitar',
            // 'EnProduccion',
            // 'UrlTest:url',
            // 'UrlProduccion:url',
            // 'ValidacionPasiva',
            // 'TokenValidacion',
            // 'UrlOK:url',
            // 'UrlKO:url',
            // 'Gratuita',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
