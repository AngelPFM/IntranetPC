<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ArticuloSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articulos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Crear Articulo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'idNTC_Articulo',
            //'fkNTC_TipoArticulo',
            'Referencia',
            'ReferenciaProveedor',
            'ReferenciaColor',
            // 'Nombre',
            // 'Descripcion',
            // 'DescripcionCorta',
            // 'Nuevo_DesdeFecha',
            // 'Nuevo_HastaFecha',
            // 'Habilitado',
            // 'HabilitadoProfesionales',
            // 'fkNTC_ConjuntoAtributos',
            // 'fkNTC_TipoIVAProducto',
            // 'MetaTitle',
            // 'MetaKeywords',
            // 'MetaDescription',
            // 'MetaRobots',
            // 'fkNTC_UnidadMedida',
            // 'fkNTC_UnidadMedidaVenta',
            // 'GestionExistencias',
            // 'CantidadMinimaCarrito',
            // 'CantidadMaximaCarrito',
            // 'IncrementoCantidad',
            // 'CantidadIncremento',
            // 'CantidadMarcaSinStock',
            // 'DivisibleParaEnvio',
            // 'PedidosArticulosAgotados',
            // 'AvisoClienteArticuloPedidoAgotado',
            // 'Quitar',
            // 'fkNTC_Almacen',
            // 'fkNTC_Marca',
            // 'App',
            // 'Stock',
            // 'Art_modificado',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
