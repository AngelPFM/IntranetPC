<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EstaticosCMS */

$this->title = 'Create Estaticos Cms';
$this->params['breadcrumbs'][] = ['label' => 'Estaticos Cms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="estaticos-cms-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
