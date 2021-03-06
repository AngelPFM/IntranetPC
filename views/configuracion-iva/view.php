<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ConfiguracionIva */

$this->title = $model->idNTC_ConfiguracionIva;
$this->params['breadcrumbs'][] = ['label' => 'Configuracion Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuracion-iva-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_ConfiguracionIva], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_ConfiguracionIva], [
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
            'idNTC_ConfiguracionIva',
            'fkNTC_TipoIVAProducto',
            'fkNTC_TipoIVANegocio',
            'Nombre',
            'PorcIva',
            'fkNTC_TipoCalculoIVA',
            'PorcRecargoEquivalencia',
        ],
    ]) ?>

</div>
