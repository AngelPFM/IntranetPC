<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ModuloEnvioProvincia */

$this->title = 'Update Modulo Envio Provincia: ' . $model->pkNTC_ModuloEnvioProvincia;
$this->params['breadcrumbs'][] = ['label' => 'Modulo Envio Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->pkNTC_ModuloEnvioProvincia, 'url' => ['view', 'id' => $model->pkNTC_ModuloEnvioProvincia]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="modulo-envio-provincia-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
