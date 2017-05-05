<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EmpresaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Empresas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="empresa-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nueva Empresa', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            
            ['label'=>'Ver',
                'value'=> function ($data){
                    if($data!=0)
                            return "<a style='width=50px'; class='btn btn-info' href='index.php?r=empresa/view&id=".$data->idNTC_Empresa."'>Ver</a>";
                    
                },
                'format'=>'raw',
                
                        ],
            'Agrupacion',
           // 'idNTC_Empresa',
            'Nombre',
            'Dominio',
            
            ['label' => 'Descripcion',
                'value' => function ($data) {
                    if ($data->Descripcion)
                        return $data->Descripcion;
                    else
                        return '-';
                },
                'attribute' => 'Descripcion'],
           
                        ['label' => 'Slogan',
                'value' => function ($data) {
                    if ($data->Slogan)
                        return $data->Slogan;
                    else
                        return '-';
                },
                'attribute' => 'Slogan'],
             'HorarioContacto',
            // 'Latitud',
            // 'Longitud',
            // 'Direccion1',
            // 'DireccionDos',
            // 'CP',
            // 'Localizacion',
             'Email:email',
            // 'Emaillook:email',
            // 'Titulo',
            // 'BajoTitulo',
            // 'NumerosDeCuenta:ntext',
            // 'metaRobots',
            // 'metaKeywords',
            // 'metaDescription',
            // 'metaTitle',
            // 'metaContent',
             'Telefono',
             
                        ['label' => 'Fax',
                'value' => function ($data) {
                    if ($data->Fax)
                        return $data->Fax;
                    else
                        return '-';
                },
                'attribute' => 'Fax'],
            // 'Agrupacion',

            ['class' => 'yii\grid\ActionColumn',
             'template'=>'{delete} {update}',
                
               ],
        ],
    ]); ?>
</div>
