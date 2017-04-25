<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OpcionAtributoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Opción Atributos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opcion-atributo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Opción Atributo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [


            //'idNTC_OpcionAtributo',
            //'fkNTC_Atributo',
            [
                'label' => 'Atributo',
                'attribute' => 'fkNTC_Atributo',
                'value' => function($data) {
                    return $data->atributo->Etiqueta;
                },
                'filter' => yii\helpers\ArrayHelper::map(app\models\Atributo::find()->where(['Quitar' => 0])->orderBy('Etiqueta')->all(), 'idNTC_Atributo', 'Etiqueta')
            ],
            'Nombre',
            'Opcion',
            ['label' => 'Descripcion',
                'value' => function ($data) {
                    if ($data->Descripcion)
                        return $data->Descripcion;
                    else
                        return '-';
                },
                'attribute' => 'Descripcion'],
            ['label' => 'Medida',
                'value' => function ($data) {
                    if ($data->Medida)
                        return $data->Medida;
                    else
                        return '-';
                },
                'attribute' => 'Medida'],
            'Orden',
            // 'Quitar',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]);
    ?>
</div>
