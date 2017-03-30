<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MarcaAlmacen */

$this->title = 'Create Marca Almacen';
$this->params['breadcrumbs'][] = ['label' => 'Marca Almacens', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="marca-almacen-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
