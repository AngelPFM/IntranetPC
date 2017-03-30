<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\TipoIvaProducto */

$this->title = 'Update Tipo Iva Producto: ' . $model->idNTC_TipoIvaProducto;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Iva Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_TipoIvaProducto, 'url' => ['view', 'id' => $model->idNTC_TipoIvaProducto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-iva-producto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
