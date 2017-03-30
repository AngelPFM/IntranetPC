<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioWeb */

$this->title = $model->idNTC_UsuarioWeb;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Webs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-web-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_UsuarioWeb], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_UsuarioWeb], [
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
            'idNTC_UsuarioWeb',
            'fkNTC_TipoUsuarioWeb',
            'fkNTC_Cliente',
            'Nombre',
            'Apellidos',
            'Email:email',
            'Hash',
            'MaxIntentos',
            'FechaValidezIni',
            'FechaValidezFin',
            'FechaRegistro',
            'FechaUltimoAcceso',
            'FechaActualAcceso',
            'Activo',
            'Quitar',
            'FechaNacimiento',
            'IdFacebook',
            'IdTwitter',
            'IdLinkedin',
            'IdGoogle',
            'IdGithub',
            'IdLive',
            'Telefono',
            'Cif',
            'Token',
            'FechaCad',
        ],
    ]) ?>

</div>
