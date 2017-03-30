<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\TipoIvaProducto */

$this->title = 'Create Tipo Iva Producto';
$this->params['breadcrumbs'][] = ['label' => 'Tipo Iva Productos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tipo-iva-producto-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
