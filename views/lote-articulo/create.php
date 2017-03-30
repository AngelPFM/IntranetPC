<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LoteArticulo */

$this->title = 'Create Lote Articulo';
$this->params['breadcrumbs'][] = ['label' => 'Lote Articulos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lote-articulo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
