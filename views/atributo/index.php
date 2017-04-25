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
        <?= Html::a('Nuevo Atributo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Atributo',
            'Codigo',
            'Etiqueta',
            
            ['label'=>'Requerido',
                'value'=> function ($data){
                    if($data->Requerido==1)
                            return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format'=>'raw',
                'attribute'=>'Requerido'
                        ],
            
            ['label'=>'Buscable',
                'value'=> function ($data){
                    if($data->Buscable==1)
                            return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                'format'=>'raw',
                'attribute'=>'Buscable'
                        ],
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
