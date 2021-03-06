<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\NumSerie */

$this->title = $model->idNTC_NumSerie;
$this->params['breadcrumbs'][] = ['label' => 'Num Series', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="num-serie-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_NumSerie], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_NumSerie], [
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
            'idNTC_NumSerie',
            'Nombre',
            'Descripcion',
            'Desde',
            'Hasta',
            'Ultimo',
        ],
    ]) ?>

</div>
