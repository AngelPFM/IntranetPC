<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\DocumentoVenta */

$this->title = 'Update Documento Venta: ' . $model->idNTC_DocumentoVenta;
$this->params['breadcrumbs'][] = ['label' => 'Documento Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_DocumentoVenta, 'url' => ['view', 'id' => $model->idNTC_DocumentoVenta]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="documento-venta-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
