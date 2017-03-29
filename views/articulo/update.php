<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Articulo */

$this->title = 'Update Articulo: ' . $model->idNTC_Articulo;
$this->params['breadcrumbs'][] = ['label' => 'Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Articulo, 'url' => ['view', 'id' => $model->idNTC_Articulo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="articulo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
