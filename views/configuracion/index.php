<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ConfiguracionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Configuraciones';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuracion-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Configuración', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Configuracion',
           
            ['label'=>'Empresa', 
                'attribute'=>'fkNTC_Empresa'],
            //'fkNTC_TipoAltaUsuarios',
            
            //'AvisoAltas',
            //'MaxIntentosLogin',
            // 'EdadMinimaUsuarios',
            // 'EdadMaximaUsuarios',
             'PeriodoPrevioValidezCtas',
             'PeriodoValidezCtas',
             'EdadMinimaUsuarios',
             'EdadMaximaUsuarios',
             
            ['label'=>'Pais por defecto', 
                'attribute'=>'fkNTC_PaisPorDefecto'],
            // 'fkNTC_TiendaPorDefecto',
            
            ['label'=>'Forma de pago por def', 
                'attribute'=>'fkNTC_FormaPago'],
            
             
            ['label'=>'Metodo Envio por Def.', 
                'attribute'=>'fkNTC_MetodoEnvio'],
            // 'fkNTC_GrupoPrecioCliente',
            // 'fkNTC_GrupoDescuentoCliente',
            // 'VerArticulosSinPrecio',
            // 'VerArticulosSinStock',
            // 'VerVariantesSinStock',
             'MinutosCaducidadCarritos',
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
