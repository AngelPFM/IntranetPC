<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AlmacenSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Almacenes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="almacen-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Almacen', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

            //'idNTC_Almacen',
            'Nombre',
            'CodigoPostal',
            
            'Direccion',
             'Contacto',
             
             ['label'=>'Transito',
                'value'=> function ($data){
                    if($data->Transito==1)
                        return "<span style='width=50px'; class='btn btn-success'>Sí</span>";
                    else
                        return  "<span style='width=50px'; class='btn btn-danger'>No</span>";
                },
                        
                'format'=>'raw',
                'attribute'=>'Transito'],
             'Telefono',
             'Email:email',
            //'Titulo',
            //'fkNTC_Localidad',
            // 'fkNTC_Provincia',
            // 'CodigoPostal',
            // 'fkNTC_Pais',
            // 'Contacto',
            // 'Transito',
            // 'Telefono',
            // 'Fax',
            // 'Email:email',
            // 'Quitar',
            // 'Activa',
            // 'fkNTC_UsuarioWeb',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
