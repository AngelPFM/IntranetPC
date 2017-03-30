<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */

$this->title = $model->idNTC_Configuracion;
$this->params['breadcrumbs'][] = ['label' => 'Configuracions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuracion-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Configuracion], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Configuracion], [
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
            'idNTC_Configuracion',
            'fkNTC_Empresa',
            'fkNTC_TipoAltaUsuarios',
            'AvisoAltas',
            'MaxIntentosLogin',
            'EdadMinimaUsuarios',
            'EdadMaximaUsuarios',
            'PeriodoPrevioValidezCtas',
            'PeriodoValidezCtas',
            'fkNTC_PaisPorDefecto',
            'fkNTC_TiendaPorDefecto',
            'fkNTC_FormaPago',
            'fkNTC_MetodoEnvio',
            'fkNTC_GrupoPrecioCliente',
            'fkNTC_GrupoDescuentoCliente',
            'VerArticulosSinPrecio',
            'VerArticulosSinStock',
            'VerVariantesSinStock',
            'MinutosCaducidadCarritos',
            'EmailContacto:email',
            'fkNTC_Divisa',
            'Translate',
            'Maintenance',
            'MaintenanceIPs',
            'PrefijoTablas',
            'RutaDocumentos',
            'NumeroPostPagina',
        ],
    ]) ?>

</div>
