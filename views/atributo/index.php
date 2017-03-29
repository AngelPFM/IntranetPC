<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AtributoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Atributos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atributo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Atributo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idNTC_Atributo',
            'Codigo',
            'Etiqueta',
            'Requerido',
            'Buscable',
            // 'Comparable',
            // 'fkNTC_TipoDatosAtributo',
            // 'TieneOpciones',
            // 'ValorPorDefecto',
            // 'Validacion',
            // 'AplicarATodos',
            // 'DefineProducto',
            // 'FormatoOpciones',
            // 'MostrarEnFicha',
            // 'esColor',
            // 'esTalla',
            // 'TablaAsociada',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
