<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Pais */

$this->title = $model->idNTC_Pais;
$this->params['breadcrumbs'][] = ['label' => 'Pais', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pais-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Pais], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Pais], [
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
            'idNTC_Pais',
            'Nombre',
            'fkNTC_Idioma',
            'Iso2',
            'Iso3',
            'Prefijo',
            'ccTLD',
            'fkNTC_Divisa',
            'fkNTC_TipoIvaNegocio',
            'Quitar',
        ],
    ]) ?>

</div>
