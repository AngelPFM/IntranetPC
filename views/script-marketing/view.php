<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptMarketing */

$this->title = $model->idNTC_ScriptMarketing;
$this->params['breadcrumbs'][] = ['label' => 'Script Marketings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-marketing-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->idNTC_ScriptMarketing], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->idNTC_ScriptMarketing], [
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
            'idNTC_ScriptMarketing',
            'Nombre',
            'fkNTC_Idioma',
            'fkNTC_Pais',
            'Header',
            'Footer',
            'PaginaPedidoOk',
            'Home',
            'Registro',
            'look',
            'Script:ntext',
            'Quitar',
        ],
    ]) ?>

</div>
