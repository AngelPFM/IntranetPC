<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConfiguracionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configuracions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuracion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Configuracion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_Configuracion',
            'fkNTC_Empresa',
            'fkNTC_TipoAltaUsuarios',
            'AvisoAltas',
            'MaxIntentosLogin',
            // 'EdadMinimaUsuarios',
            // 'EdadMaximaUsuarios',
            // 'PeriodoPrevioValidezCtas',
            // 'PeriodoValidezCtas',
            // 'fkNTC_PaisPorDefecto',
            // 'fkNTC_TiendaPorDefecto',
            // 'fkNTC_FormaPago',
            // 'fkNTC_MetodoEnvio',
            // 'fkNTC_GrupoPrecioCliente',
            // 'fkNTC_GrupoDescuentoCliente',
            // 'VerArticulosSinPrecio',
            // 'VerArticulosSinStock',
            // 'VerVariantesSinStock',
            // 'MinutosCaducidadCarritos',
            // 'EmailContacto:email',
            // 'fkNTC_Divisa',
            // 'Translate',
            // 'Maintenance',
            // 'MaintenanceIPs',
            // 'PrefijoTablas',
            // 'RutaDocumentos',
            // 'NumeroPostPagina',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
