<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Almacen */

$this->title = 'Actualizar Almacen: ' . $model->idNTC_Almacen;
$this->params['breadcrumbs'][] = ['label' => 'Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Almacen, 'url' => ['view', 'id' => $model->idNTC_Almacen]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="almacen-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
