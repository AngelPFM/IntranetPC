<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\NumSerie */

$this->title = 'Create Num Serie';
$this->params['breadcrumbs'][] = ['label' => 'Num Series', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="num-serie-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
