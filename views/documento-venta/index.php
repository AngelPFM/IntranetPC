<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\DocumentoVentaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Documento Ventas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="documento-venta-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Documento Venta', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idNTC_DocumentoVenta',
            //'fkNTC_TipoDocumentoVenta',
            'Numero',
            'Fecha',
            //'fkNTC_NumSerie',
            // 'fkNTC_TipoEstadoPedido',
            // 'fkNTC_ClienteVenta',
            // 'NombreCliente',
            // 'DireccionCliente',
            // 'CodPostalCliente',
            // 'LocalidadCliente',
            // 'ProvinciaCliente',
            // 'PaisCliente',
            // 'fkNTC_ClienteFactura',
            // 'CifFactura',
            // 'NombreFactura',
            // 'DireccionFactura',
            // 'CodPostalFactura',
            // 'LocalidadFactura',
            // 'fkNTC_ProvinciaFactura',
            // 'ProvinciaFactura',
            // 'fkNTC_PaisFactura',
            // 'PaisFactura',
            // 'fkNTC_Tienda',
            // 'fkNTC_TerminosPago',
            // 'fkNTC_FormaPago',
            // 'FechaVencimiento',
            // 'PorcentajeDtoPP',
            // 'FechaDtoPP',
            // 'AlbaranValorado',
            // 'EnviarFactura',
            // 'Look',
            // 'fkNTC_DireccionEnvio',
            // 'DireccionEnvio',
            // 'CodPostalEnvio',
            // 'LocalidadEnvio',
            // 'ProvinciaEnvio',
            // 'PaisEnvio',
            // 'EnvioAtencionA',
            // 'fkNTC_Almacen',
            // 'fkNTC_TarifaEnvio',
            // 'FechaEnvio',
            // 'fkNTC_Divisa',
            // 'Peso',
            // 'FechaRegistro',
            // 'Comentario:ntext',
            // 'EnvioParcial',
            // 'EnviadoCompletamente',
            // 'FechaEntrega',
            // 'ConfirmadaRecepcion',
            // 'Importe',
            // 'ImporteIvaIncl',
            // 'Tracking',
            // 'Enviado',
            // 'fkNTC_GrupoPrecioCliente',
            // 'fkNTC_GrupoDtoCliente',
            // 'fkNTC_Portes',
            // 'SobreAgencia',
            // 'TelefonoAgencia',
            // 'NombreAgencia',
            // 'ImportePortes',
            // 'ImportePortesSI',
            // 'IvaImporte',
            // 'ImporteRecargo',
            // 'LogAlm',
            // 'ImporteSLA',
            // 'Total',
            // 'PcIVA',
            // 'ImpCR',
            // 'ga',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
