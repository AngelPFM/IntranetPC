<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Almacen */

$this->title = $model->idNTC_Almacen;
$this->params['breadcrumbs'][] = ['label' => 'Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="almacen-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Almacen], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Almacen], [
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
            'idNTC_Almacen',
            'Nombre',
            'Titulo',
            'Direccion',
            'fkNTC_Localidad',
            'fkNTC_Provincia',
            'CodigoPostal',
            'fkNTC_Pais',
            'Contacto',
            'Transito',
            'Telefono',
            'Fax',
            'Email:email',
            'Quitar',
            'Activa',
            'fkNTC_UsuarioWeb',
        ],
    ]) ?>

</div>
