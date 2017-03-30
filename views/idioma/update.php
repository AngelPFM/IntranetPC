<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Idioma */

$this->title = 'Update Idioma: ' . $model->idNTC_Idioma;
$this->params['breadcrumbs'][] = ['label' => 'Idiomas', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_Idioma, 'url' => ['view', 'id' => $model->idNTC_Idioma]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="idioma-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
