<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OpcionAtributo */

$this->title = 'Create Opcion Atributo';
$this->params['breadcrumbs'][] = ['label' => 'Opcion Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="opcion-atributo-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
