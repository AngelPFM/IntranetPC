<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\FormaPago */

$this->title = $model->idNTC_FormaPago;
$this->params['breadcrumbs'][] = ['label' => 'Forma Pagos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="forma-pago-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_FormaPago], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_FormaPago], [
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
            'idNTC_FormaPago',
            'Nombre',
            'Descripcion',
            'InfoAdicional:ntext',
            'Recargo',
            'PorDefecto',
            'fkNTC_TerminoPago',
            'Activa',
            'Quitar',
            'EnProduccion',
            'UrlTest:url',
            'UrlProduccion:url',
            'ValidacionPasiva',
            'TokenValidacion',
            'UrlOK:url',
            'UrlKO:url',
            'Gratuita',
        ],
    ]) ?>

</div>
