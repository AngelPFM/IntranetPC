<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Atributo */

$this->title = 'Actualizar Atributo: ' . $model->idNTC_Atributo;
$this->params['breadcrumbs'][] = ['label' => 'Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Atributo, 'url' => ['view', 'id' => $model->idNTC_Atributo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="atributo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
