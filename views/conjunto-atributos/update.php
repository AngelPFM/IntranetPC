<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConjuntoAtributos */

$this->title = 'Update Conjunto Atributos: ' . $model->idNTC_ConjuntoAtributos;
$this->params['breadcrumbs'][] = ['label' => 'Conjunto Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_ConjuntoAtributos, 'url' => ['view', 'id' => $model->idNTC_ConjuntoAtributos]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="conjunto-atributos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
