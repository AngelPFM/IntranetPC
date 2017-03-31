<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Contacto */

$this->title = 'Actualizar Contacto: ' . $model->idNTC_Contacto;
$this->params['breadcrumbs'][] = ['label' => 'Contactos', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Contacto, 'url' => ['view', 'id' => $model->idNTC_Contacto]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="contacto-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
