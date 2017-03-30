<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Cliente */

$this->title = $model->idNTC_Cliente;
$this->params['breadcrumbs'][] = ['label' => 'Clientes', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Cliente], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Cliente], [
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
            'idNTC_Cliente',
            'NIF',
            'Nombre',
            'Apellidos',
            'Direccion',
            'fkNTC_Localidad',
            'Localidad',
            'fkNTC_Provincia',
            'Provincia',
            'CodigoPostal',
            'fkNTC_Pais',
            'PrefijoTelefono1',
            'Telefono1',
            'PrefijoTelefono2',
            'Telefono2',
            'Sexo',
            'fkNTC_FacturaACliente',
            'Contacto',
            'Email:email',
            'Fax',
            'fkNTC_TipoIvaNegocio',
            'PrecioIvaIncluido',
            'fkNTC_GrupoPrecioCliente',
            'fkNTC_GrupoDescuentoCliente',
            'fkNTC_Divisa',
            'fkNTC_Idioma',
            'CifFactura',
            'NombreFactura',
            'DireccionFactura',
            'CodPostalFactura',
            'LocalidadFactura',
            'fkNTC_ProvinciaFactura',
            'ProvinciaFactura',
            'fkNTC_PaisFactura',
            'PaisFactura',
            'fkNTC_LocalidadFactura',
            'fkNTC_ConfiguracionIva',
            'Quitar',
            'FechaRegistro',
        ],
    ]) ?>

</div>
