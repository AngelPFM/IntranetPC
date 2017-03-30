<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OpcionAtributo */

$this->title = 'Update Opcion Atributo: ' . $model->idNTC_OpcionAtributo;
$this->params['breadcrumbs'][] = ['label' => 'Opcion Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_OpcionAtributo, 'url' => ['view', 'id' => $model->idNTC_OpcionAtributo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="opcion-atributo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
