<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Configuracion */

$this->title = 'Actualizar Configuracion: ' . $model->idNTC_Configuracion;
$this->params['breadcrumbs'][] = ['label' => 'Configuracions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Configuracion, 'url' => ['view', 'id' => $model->idNTC_Configuracion]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="configuracion-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
