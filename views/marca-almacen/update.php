<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\MarcaAlmacen */

$this->title = 'Update Marca Almacen: ' . $model->idNTC_MarcaAlmacen;
$this->params['breadcrumbs'][] = ['label' => 'Marca Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_MarcaAlmacen, 'url' => ['view', 'id' => $model->idNTC_MarcaAlmacen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="marca-almacen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
