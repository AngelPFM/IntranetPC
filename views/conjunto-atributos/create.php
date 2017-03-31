<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ConjuntoAtributos */

$this->title = 'Crear Conjunto Atributos';
$this->params['breadcrumbs'][] = ['label' => 'Conjunto Atributos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="conjunto-atributos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
