<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentoVenta */

$this->title = $model->idNTC_DocumentoVenta;
$this->params['breadcrumbs'][] = ['label' => 'Documento Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-venta-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_DocumentoVenta], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_DocumentoVenta], [
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
            'idNTC_DocumentoVenta',
            'fkNTC_TipoDocumentoVenta',
            'Numero',
            'Fecha',
            'fkNTC_NumSerie',
            'fkNTC_TipoEstadoPedido',
            'fkNTC_ClienteVenta',
            'NombreCliente',
            'DireccionCliente',
            'CodPostalCliente',
            'LocalidadCliente',
            'ProvinciaCliente',
            'PaisCliente',
            'fkNTC_ClienteFactura',
            'CifFactura',
            'NombreFactura',
            'DireccionFactura',
            'CodPostalFactura',
            'LocalidadFactura',
            'fkNTC_ProvinciaFactura',
            'ProvinciaFactura',
            'fkNTC_PaisFactura',
            'PaisFactura',
            'fkNTC_Tienda',
            'fkNTC_TerminosPago',
            'fkNTC_FormaPago',
            'FechaVencimiento',
            'PorcentajeDtoPP',
            'FechaDtoPP',
            'AlbaranValorado',
            'EnviarFactura',
            'Look',
            'fkNTC_DireccionEnvio',
            'DireccionEnvio',
            'CodPostalEnvio',
            'LocalidadEnvio',
            'ProvinciaEnvio',
            'PaisEnvio',
            'EnvioAtencionA',
            'fkNTC_Almacen',
            'fkNTC_TarifaEnvio',
            'FechaEnvio',
            'fkNTC_Divisa',
            'Peso',
            'FechaRegistro',
            'Comentario:ntext',
            'EnvioParcial',
            'EnviadoCompletamente',
            'FechaEntrega',
            'ConfirmadaRecepcion',
            'Importe',
            'ImporteIvaIncl',
            'Tracking',
            'Enviado',
            'fkNTC_GrupoPrecioCliente',
            'fkNTC_GrupoDtoCliente',
            'fkNTC_Portes',
            'SobreAgencia',
            'TelefonoAgencia',
            'NombreAgencia',
            'ImportePortes',
            'ImportePortesSI',
            'IvaImporte',
            'ImporteRecargo',
            'LogAlm',
            'ImporteSLA',
            'Total',
            'PcIVA',
            'ImpCR',
            'ga',
        ],
    ]) ?>

</div>
