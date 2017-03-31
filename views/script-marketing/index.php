<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ScriptMarketingSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Script Marketings';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="script-marketing-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Nuevo Script Marketing', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            

           // 'idNTC_ScriptMarketing',
            'Nombre',
            
            ['label'=>'Idioma', 
                'attribute'=>'fkNTC_Idioma'],
             'Footer',
            'Header',
            ['label'=>'Idioma', 
                'attribute'=>'fkNTC_Idioma'],
            
            ['label'=>'País', 
                'attribute'=>'fkNTC_Pais'],
            
            // 'Footer',
             'PaginaPedidoOk',
             'Home',
             'Registro',
            // 'look',
            // 'Script:ntext',
            // 'Quitar',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
