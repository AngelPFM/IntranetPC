<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Operacion */

$this->title = $model->idNTC_Operacion;
$this->params['breadcrumbs'][] = ['label' => 'Operacions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operacion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Operacion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Operacion], [
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
            'idNTC_Operacion',
            'fkNTC_Cliente',
            'fkNTC_DocumentoVenta',
            'fkNTC_FormaPago',
            'fkNTC_Tienda',
            'fkNTC_Divisa',
            'FechaOperacion',
            'FechaEstado',
            'ImporteMoneda',
            'ImporteEur',
            'Referencia',
            'ReferenciaPago',
            'Descripcion',
            'EstadoPago',
            'Aplicada',
            'Quitar',
        ],
    ]) ?>

</div>
