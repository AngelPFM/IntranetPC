<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Atributo */

$this->title = $model->idNTC_Atributo;
$this->params['breadcrumbs'][] = ['label' => 'Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atributo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Atributo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Atributo], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'idNTC_Atributo',
            'Codigo',
            'Etiqueta',
            'Requerido',
            'Buscable',
            'Comparable',
            'fkNTC_TipoDatosAtributo',
            'TieneOpciones',
            'ValorPorDefecto',
            'Validacion',
            'AplicarATodos',
            'DefineProducto',
            'FormatoOpciones',
            'MostrarEnFicha',
            'esColor',
            'esTalla',
            'TablaAsociada',
            'Quitar',
        ],
    ]) ?>

</div>
