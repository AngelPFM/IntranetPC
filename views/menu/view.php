<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Menu */

$this->title = $model->idNTC_Menu;
$this->params['breadcrumbs'][] = ['label' => 'Menus', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="menu-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Menu], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Menu], [
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
            'idNTC_Menu',
            'Nombre',
            'fkNTC_Padre',
            'fkNTC_TipoMenu',
            'fkNTC_Idioma',
            'Descripcion:ntext',
            'Frase',
            'Url:url',
            'Externo',
            'Titulo',
            'TieneHijos',
            'Expandido',
            'RequiereLogin',
            'TablaTotales',
            'fkNTC_UsuarioWeb',
            'FiltroTotales',
            'TablaCategorias',
            'FiltroCategorias',
            'Orden',
            'Independiente',
            'Ancho',
            'HtmlClass',
            'MetaTitle',
            'MetaDescription',
            'MetaKeywords',
            'MetaRobots',
            'Quitar',
        ],
    ]) ?>

</div>
