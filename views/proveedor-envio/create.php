<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProveedorEnvio */

$this->title = 'Create Proveedor Envio';
$this->params['breadcrumbs'][] = ['label' => 'Proveedor Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proveedor-envio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
