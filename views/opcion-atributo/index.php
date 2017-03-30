<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpcionAtributoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opcion Atributos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opcion-atributo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Opcion Atributo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_OpcionAtributo',
            'fkNTC_Atributo',
            'Nombre',
            'Opcion',
            'Descripcion',
            // 'Medida',
            // 'Orden',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
