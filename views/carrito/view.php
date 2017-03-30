<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Carrito */

$this->title = $model->idNTC_Carrito;
$this->params['breadcrumbs'][] = ['label' => 'Carritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="carrito-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Carrito], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Carrito], [
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
            'idNTC_Carrito',
            'fkNTC_UsuarioWeb',
            'fkNTC_Cliente',
            'SessionId',
            'fkNTC_DocumentoVenta',
            'Fecha',
            'Abandonado',
            'Quitar',
        ],
    ]) ?>

</div>
