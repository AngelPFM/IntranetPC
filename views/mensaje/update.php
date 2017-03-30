<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Mensaje */

$this->title = 'Update Mensaje: ' . $model->idNTC_Mensaje;
$this->params['breadcrumbs'][] = ['label' => 'Mensajes', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Mensaje, 'url' => ['view', 'id' => $model->idNTC_Mensaje]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="mensaje-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
