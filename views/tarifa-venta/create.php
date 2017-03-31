<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TarifaVenta */

$this->title = 'Create Tarifa Venta';
$this->params['breadcrumbs'][] = ['label' => 'Tarifa Ventas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tarifa-venta-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
