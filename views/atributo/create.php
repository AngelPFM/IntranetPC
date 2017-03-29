<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Atributo */

$this->title = 'Create Atributo';
$this->params['breadcrumbs'][] = ['label' => 'Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atributo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
