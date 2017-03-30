<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UsuarioWeb */

$this->title = 'Update Usuario Web: ' . $model->idNTC_UsuarioWeb;
$this->params['breadcrumbs'][] = ['label' => 'Usuario Webs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_UsuarioWeb, 'url' => ['view', 'id' => $model->idNTC_UsuarioWeb]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="usuario-web-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
