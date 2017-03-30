<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\MetodoEnvio */

$this->title = 'Create Metodo Envio';
$this->params['breadcrumbs'][] = ['label' => 'Metodo Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="metodo-envio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
