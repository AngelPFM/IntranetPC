<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Empresa */

$this->title = $model->idNTC_Empresa;
$this->params['breadcrumbs'][] = ['label' => 'Empresas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Empresa], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Empresa], [
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
            'idNTC_Empresa',
            'Nombre',
            'Dominio',
            'Descripcion',
            'Slogan',
            'HorarioContacto',
            'Latitud',
            'Longitud',
            'Direccion1',
            'DireccionDos',
            'CP',
            'Localizacion',
            'Email:email',
            'Emaillook:email',
            'Titulo',
            'BajoTitulo',
            'NumerosDeCuenta:ntext',
            'metaRobots',
            'metaKeywords',
            'metaDescription',
            'metaTitle',
            'metaContent',
            'Telefono',
            'Fax',
            'Agrupacion',
        ],
    ]) ?>

</div>
