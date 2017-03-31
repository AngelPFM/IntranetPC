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
            
            'Agrupacion',
           // 'idNTC_Empresa',
            'Nombre',
            'Dominio',
            'Descripcion',
            'Slogan',
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
             'Fax',
            // 'Agrupacion',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
