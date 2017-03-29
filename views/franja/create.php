<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Franja */

$this->title = 'Crear Franja';
$this->params['breadcrumbs'][] = ['label' => 'Franjas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="franja-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
