<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Carrito */

$this->title = 'Update Carrito: ' . $model->idNTC_Carrito;
$this->params['breadcrumbs'][] = ['label' => 'Carritos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Carrito, 'url' => ['view', 'id' => $model->idNTC_Carrito]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="carrito-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
