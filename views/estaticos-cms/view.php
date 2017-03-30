<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\EstaticosCMS */

$this->title = $model->idNTC_EstaticosCMS;
$this->params['breadcrumbs'][] = ['label' => 'Estaticos Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estaticos-cms-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_EstaticosCMS], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_EstaticosCMS], [
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
            'idNTC_EstaticosCMS',
            'Nombre',
            'Titulo',
            'Descripcion:ntext',
            'fkNTC_Idioma',
            'IsHTML',
            'EstilosCSS',
            'Quitar',
            'MetaTitle',
            'MetaDescription',
            'MetaKeywords',
            'MetaRobots',
        ],
    ]) ?>

</div>
