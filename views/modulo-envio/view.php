<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ModuloEnvio */

$this->title = $model->idNTC_ModuloEnvio;
$this->params['breadcrumbs'][] = ['label' => 'Modulo Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-envio-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_ModuloEnvio], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_ModuloEnvio], [
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
            'idNTC_ModuloEnvio',
            'Nombre',
            'Quitar',
        ],
    ]) ?>

</div>
