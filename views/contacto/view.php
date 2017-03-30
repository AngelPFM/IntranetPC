<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = $model->idNTC_Contacto;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="contacto-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_Contacto], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_Contacto], [
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
            'idNTC_Contacto',
            'Nombre',
            'Apellidos',
            'Telefono',
            'Email:email',
            'Asunto:ntext',
            'Comentario:ntext',
            'fkNTC_UsuarioWeb',
            'fkNTC_Cliente',
            'Quitar',
            'FechaAlta',
            'IpContacto',
        ],
    ]) ?>

</div>
