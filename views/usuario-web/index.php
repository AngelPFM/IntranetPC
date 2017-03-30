<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\UsuarioWebSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Usuario Webs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-web-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Usuario Web', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'idNTC_UsuarioWeb',
            'fkNTC_TipoUsuarioWeb',
            'fkNTC_Cliente',
            'Nombre',
            'Apellidos',
            // 'Email:email',
            // 'Hash',
            // 'MaxIntentos',
            // 'FechaValidezIni',
            // 'FechaValidezFin',
            // 'FechaRegistro',
            // 'FechaUltimoAcceso',
            // 'FechaActualAcceso',
            // 'Activo',
            // 'Quitar',
            // 'FechaNacimiento',
            // 'IdFacebook',
            // 'IdTwitter',
            // 'IdLinkedin',
            // 'IdGoogle',
            // 'IdGithub',
            // 'IdLive',
            // 'Telefono',
            // 'Cif',
            // 'Token',
            // 'FechaCad',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
