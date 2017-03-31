<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ContactoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Contactos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacto-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Contacto', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
           
             'FechaAlta',
             'Asunto:ntext',
            //'idNTC_Contacto',
            'Nombre',
            'Apellidos',
            'Telefono',
            'Email:email',
            // 'Asunto:ntext',
            // 'Comentario:ntext',
            // 'fkNTC_UsuarioWeb',
            // 'fkNTC_Cliente',
            // 'Quitar',
            // 'FechaAlta',
            // 'IpContacto',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
