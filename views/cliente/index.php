<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ClienteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clientes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cliente-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_Cliente',
            'NIF',
            'Nombre',
            'Apellidos',
            'Direccion',
            // 'fkNTC_Localidad',
            // 'Localidad',
            // 'fkNTC_Provincia',
            // 'Provincia',
            // 'CodigoPostal',
            // 'fkNTC_Pais',
            // 'PrefijoTelefono1',
            // 'Telefono1',
            // 'PrefijoTelefono2',
            // 'Telefono2',
            // 'Sexo',
            // 'fkNTC_FacturaACliente',
            // 'Contacto',
            // 'Email:email',
            // 'Fax',
            // 'fkNTC_TipoIvaNegocio',
            // 'PrecioIvaIncluido',
            // 'fkNTC_GrupoPrecioCliente',
            // 'fkNTC_GrupoDescuentoCliente',
            // 'fkNTC_Divisa',
            // 'fkNTC_Idioma',
            // 'CifFactura',
            // 'NombreFactura',
            // 'DireccionFactura',
            // 'CodPostalFactura',
            // 'LocalidadFactura',
            // 'fkNTC_ProvinciaFactura',
            // 'ProvinciaFactura',
            // 'fkNTC_PaisFactura',
            // 'PaisFactura',
            // 'fkNTC_LocalidadFactura',
            // 'fkNTC_ConfiguracionIva',
            // 'Quitar',
            // 'FechaRegistro',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
