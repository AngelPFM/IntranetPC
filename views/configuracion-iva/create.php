<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ConfiguracionIva */

$this->title = 'Create Configuracion Iva';
$this->params['breadcrumbs'][] = ['label' => 'Configuracion Ivas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="configuracion-iva-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
