<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Categoria */

$this->title = $model->idNTC_Categoria;
$this->params['breadcrumbs'][] = ['label' => 'Categorias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="categoria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Categoria], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Categoria], [
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
            'idNTC_Categoria',
            'Raiz',
            'fkNTC_padre',
            'Nombre',
            'Titulo',
            'Descripcion:ntext',
            'Frase',
            'TieneHijos',
            'TituloPagina',
            'IncluirEnMenu',
            'Activa',
            'MostrarArticulos',
            'fkNTC_CMS',
            'MetaTitle',
            'MetaKeywords',
            'MetaDescription',
            'MetaRobots',
            'ConComposicion',
            'Orden',
            'Quitar',
        ],
    ]) ?>

</div>
