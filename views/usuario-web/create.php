<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UsuarioWeb */

$this->title = 'Create Usuario Web';
$this->params['breadcrumbs'][] = ['label' => 'Usuario Webs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="usuario-web-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
