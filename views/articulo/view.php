<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Articulo */

$this->title = $model->idNTC_Articulo;
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="articulo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Articulo], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Articulo], [
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
            'idNTC_Articulo',
            'fkNTC_TipoArticulo',
            'Referencia',
            'ReferenciaProveedor',
            'ReferenciaColor',
            'Nombre',
            'Descripcion',
            'DescripcionCorta',
            'Nuevo_DesdeFecha',
            'Nuevo_HastaFecha',
            'Habilitado',
            'HabilitadoProfesionales',
            'fkNTC_ConjuntoAtributos',
            'fkNTC_TipoIVAProducto',
            'MetaTitle',
            'MetaKeywords',
            'MetaDescription',
            'MetaRobots',
            'fkNTC_UnidadMedida',
            'fkNTC_UnidadMedidaVenta',
            'GestionExistencias',
            'CantidadMinimaCarrito',
            'CantidadMaximaCarrito',
            'IncrementoCantidad',
            'CantidadIncremento',
            'CantidadMarcaSinStock',
            'DivisibleParaEnvio',
            'PedidosArticulosAgotados',
            'AvisoClienteArticuloPedidoAgotado',
            'Quitar',
            'fkNTC_Almacen',
            'fkNTC_Marca',
            'App',
            'Stock',
            'Art_modificado',
        ],
    ]) ?>

</div>
