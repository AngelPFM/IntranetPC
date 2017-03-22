<?php
$metadatos = $model->retornaMetaData();

$this->menu = Yii::app()->user->obtieneBotonesOperaciones($this->modelName, array('create'), null, array($campoProcedencia => $valorProcedencia), $campoProcedencia, $this->mod);
$this->pageTitle = "Listado de " . $this->modelName;

            if ($urlExportar != "") {
                echo CHtml::link('Exportar CSV', $urlExportar, array('class' => 'export-button', "onclick" => ""));
            }

if (count($camposBusqueda) > 0) {
    echo CHtml::link('Busqueda avanzada', '#', array('class' => 'search-button'));
    ?>
    <section id="buscador" class="buscador_listado" <?php echo (isset($_GET[$model->getModelName()])) ? 'style="display:block;"' : '' ?>>
        <?php
        $this->renderPartial(
                '/intranet/_search', array(
            'model' => $model,
            'campos' => $camposBusqueda,
            'metadatos' => $metadatos,
                )
        );
        ?>
    </section>
        <?php
    }

    if (count($this->menu) > 0) {
        ?>
    <section id="operaciones">
        <section id="dentro_operaciones">
    <?php
    $this->widget('zii.widgets.CMenu', array(
        'items' => $this->menu,
        'htmlOptions' => array('class' => 'operations'),
    ));
    ?>
        </section>
    </section>
    <?php
}

$fnClick = "return(false);";
if (!isset($campos["Fichero"])) {
    $fnClick = "window.location='" . Yii::app()->urlManager->createUrl($modelName) . "/' + $.fn.yiiGridView.getSelection(id)";
    if ($esSubListado) {
        $arrReferrer = explode("?", $_SERVER["HTTP_REFERER"]);
        $fnClick .= "+'?return=" . $arrReferrer[0] . "&modRet=" . $model->modelName . "&keyRet=" . $campoProcedencia . "'";
    }
    $fnClick .= ";";
}
$modelName = $model->getModelName();

$parametrosGridView = array(
    'baseScriptUrl' => Yii::app()->theme->baseUrl . '/gridview',
    'id' => 'buscador_listado',
    'dataProvider' => $dataProvider,
    'columns' => $headers,
    'enablePagination' => true,
    'enableSorting' => true,
    'summaryText' => "Mostrando {start} a {end}. Total({count})",
    'pager' => array(
        'class' => 'CLinkPager',
        'header' => 'Ir a la Página',
        'cssFile' => Yii::app()->theme->baseUrl . '/css/pager.css'
    ),
    //'selectionChanged'=>"function(id){" . $fnClick . "}",
    'afterAjaxUpdate' => "function(id, data) {quitaAutoFind(); manejaChecksBonitos();}",
);

if (!isset($esAjax)) {
    $modelFilter = new $modelName();
    $modelFilter->unsetAttributes();
    $parametrosGridView['filter'] = $modelFilter;
}
// 	Yii::log("PARAMETROSVISTA: " . print_r($parametrosGridView,1));

$this->widget('zii.widgets.grid.CGridView', $parametrosGridView);
  
if ($this->mod != "") {
    ?>
<div class="elemPorPagina">Elem./pag.<span val="10">10</span><span val="50">50</span><span val="100">100</span></div>
<?php }?>