<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ScriptMarketing */

$this->title = 'Update Script Marketing: ' . $model->idNTC_ScriptMarketing;
$this->params['breadcrumbs'][] = ['label' => 'Script Marketings', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idNTC_ScriptMarketing, 'url' => ['view', 'id' => $model->idNTC_ScriptMarketing]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="script-marketing-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
