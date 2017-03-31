<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ConfiguracionIva */

$this->title = 'Update Configuracion Iva: ' . $model->idNTC_ConfiguracionIva;
$this->params['breadcrumbs'][] = ['label' => 'Configuracion Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_ConfiguracionIva, 'url' => ['view', 'id' => $model->idNTC_ConfiguracionIva]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="configuracion-iva-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
