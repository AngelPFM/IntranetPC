<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\BloqueCMS */

$this->title = $model->idNTC_BloqueCMS;
$this->params['breadcrumbs'][] = ['label' => 'Bloque Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloque-cms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_BloqueCMS], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_BloqueCMS], [
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
            'idNTC_BloqueCMS',
            'fkNTC_Menu',
            'Nombre',
            'Titulo',
            'Frase',
            'Descripcion:ntext',
            'Independiente',
            'Ancho',
            'Orden',
            'Quitar',
        ],
    ]) ?>

</div>
