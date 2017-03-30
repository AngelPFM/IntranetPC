<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LoteArticulo */

$this->title = 'Update Lote Articulo: ' . $model->idNTC_LoteArticulo;
$this->params['breadcrumbs'][] = ['label' => 'Lote Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_LoteArticulo, 'url' => ['view', 'id' => $model->idNTC_LoteArticulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lote-articulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
