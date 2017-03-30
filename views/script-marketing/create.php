<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ScriptMarketing */

$this->title = 'Create Script Marketing';
$this->params['breadcrumbs'][] = ['label' => 'Script Marketings', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-marketing-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
