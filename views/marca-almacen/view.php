<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaAlmacen */

$this->title = $model->idNTC_MarcaAlmacen;
$this->params['breadcrumbs'][] = ['label' => 'Marca Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-almacen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_MarcaAlmacen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_MarcaAlmacen], [
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
            'idNTC_MarcaAlmacen',
            'fkNTC_Marca',
            'fkNTC_Almacen',
        ],
    ]) ?>

</div>
