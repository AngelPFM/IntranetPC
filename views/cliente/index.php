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
        <?= Html::a('Crear Cliente', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Cliente',
             'FechaRegistro',
            
            
            'Nombre',
            'Apellidos',
            'Direccion',
             
            ['label'=>'.Localidad', 
                'attribute'=>'fkNTC_Localidad'],
             'Localidad',
             
            [
                'label'=>'.Provincia',
                'attribute'=>'NTC_Provincia',
                'value'=>function($data ){
                                   return $data->provincia->Nombre;
                            },
                'filter'=>  yii\helpers\ArrayHelper::map(app\models\Provincia::find()->all(),'idNTC_Provincia','Nombre')                   
                                    
                  ],
             'Provincia',
             'CodigoPostal',
            
            ['label'=>'.Pais', 
                'attribute'=>'fkNTC_Pais'],
             
             
            ['label'=>'Pref Tlf', 
                'attribute'=>'PrefijoTelefono1'],
            
             
            ['label'=>'Teléfono', 
                'attribute'=>'Telefono1'],
             
            ['label'=>'CIF/NIF', 
                'attribute'=>'CifFactura'],
            // 'Telefono1',
            // 'PrefijoTelefono2',
            // 'Telefono2',
             
                ['label'=>'Sexo',
                'value'=> function ($data){
                    if($data->Sexo==0)
                        return "<span> M</span>";
                    else
                        return  "<span> F</span>";
                },
                        
                'format'=>'raw',
                'attribute'=>'Sexo'],
            // 'fkNTC_FacturaACliente',
             'Contacto',
             'Email:email',
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
