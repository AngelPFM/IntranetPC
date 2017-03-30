<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ModuloEnvio */

$this->title = 'Create Modulo Envio';
$this->params['breadcrumbs'][] = ['label' => 'Modulo Envios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-envio-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
