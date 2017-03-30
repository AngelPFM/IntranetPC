<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\BloqueCMS */

$this->title = 'Create Bloque Cms';
$this->params['breadcrumbs'][] = ['label' => 'Bloque Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="bloque-cms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
