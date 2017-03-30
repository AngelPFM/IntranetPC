<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Escaparate */

$this->title = $model->idNTC_Escaparate;
$this->params['breadcrumbs'][] = ['label' => 'Escaparates', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="escaparate-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Escaparate], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Escaparate], [
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
            'idNTC_Escaparate',
            'fkNTC_Articulo',
            'fkNTC_Categoria',
            'Titulo',
            'Descripcion:ntext',
            'TextoBoton',
            'TextoDerecha',
            'Url:url',
            'Orden',
            'Quitar',
        ],
    ]) ?>

</div>
