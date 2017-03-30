<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ModuloEnvioProvincia */

$this->title = $model->pkNTC_ModuloEnvioProvincia;
$this->params['breadcrumbs'][] = ['label' => 'Modulo Envio Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-envio-provincia-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->pkNTC_ModuloEnvioProvincia], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->pkNTC_ModuloEnvioProvincia], [
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
            'pkNTC_ModuloEnvioProvincia',
            'fkNTC_Provincia',
            'fkNTC_ModuloEnvio',
        ],
    ]) ?>

</div>
