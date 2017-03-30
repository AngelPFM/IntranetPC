<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ModuloEnvioProvincia */

$this->title = 'Create Modulo Envio Provincia';
$this->params['breadcrumbs'][] = ['label' => 'Modulo Envio Provincias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="modulo-envio-provincia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
