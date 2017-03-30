<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OpcionAtributo */

$this->title = $model->idNTC_OpcionAtributo;
$this->params['breadcrumbs'][] = ['label' => 'Opcion Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opcion-atributo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_OpcionAtributo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_OpcionAtributo], [
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
            'idNTC_OpcionAtributo',
            'fkNTC_Atributo',
            'Nombre',
            'Opcion',
            'Descripcion',
            'Medida',
            'Orden',
            'Quitar',
        ],
    ]) ?>

</div>
