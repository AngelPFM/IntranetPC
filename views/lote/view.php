<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Lote */

$this->title = $model->idNTC_Lote;
$this->params['breadcrumbs'][] = ['label' => 'Lotes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lote-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Lote], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Lote], [
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
            'idNTC_Lote',
            'Nombre',
            'ReferenciaLote',
            'Descripcion:ntext',
            'Quitar',
            'Nuevo_DesdeFecha',
            'Nuevo_HastaFecha',
            'surtido_libre',
            'Stock',
            'Look',
            'Modificado',
        ],
    ]) ?>

</div>
