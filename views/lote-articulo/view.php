<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LoteArticulo */

$this->title = $model->idNTC_LoteArticulo;
$this->params['breadcrumbs'][] = ['label' => 'Lote Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lote-articulo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_LoteArticulo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_LoteArticulo], [
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
            'idNTC_LoteArticulo',
            'fkNTC_Lote',
            'fkNTC_Articulo',
            'Cantidad',
            'fkNTC_Variante',
            'Quitar',
        ],
    ]) ?>

</div>
