<?php
/* @var $this SiteController */

$this->title = Yii::$app->name;
?>
    <?php if (true) { ?>
    <section id="cuerpo">
        <?php
        if (is_array($reports)):
            $left = true;
            $first = true;
            $thisChart = 0;
            foreach ($reports as $report):
                $thisChart++;
                ?>
                <div class="chartcontainer <?php echo($left) ? 'left' : 'right'; ?> <?php echo($first) ? 'first' : ''; ?> <?php echo($thisChart == sizeof($reports)) ? 'last' : ''; ?> ">
                    <span class="titulo_chart"><?php echo $report->Titulo ?></span>
                    <div class="chart">
                        <?php
                        if ($report->fkChartType == 1) {
                            // Los Ejes se cambian V<->H para el Grafico de Áreas
                            $ejeV = 'hAxis';
                            $ejeH = 'vAxis';
                        } else {
                            $ejeV = 'vAxis';
                            $ejeH = 'hAxis';
                        }
                        ?>			
                        //<?php
//                        $arrColumnas = explode(',', $report->Columnas);
//                        $this->widget('ext.googleCharts.components.widgets.GoogleChart', array('type' => $report->fkChartType,
//                            'report' => $report->getPkValue(),
//                            'containerId' => 'chart' . $thisChart,
//// 																						'model'=>$report->Modelo,
//// 																						'columns'=>$report->Columnas,
//// 																						'condition'=>$report->Condition,
//// 																						'order'=>$report->Order,
//// 																						'group'=>$report->Group,
//// 																						'having'=>$report->Having,
//// 																						'limit'=>$report->Limit,
//// 																						'offset'=>$report->Offset, 
//                            'options' => array($ejeV => array('title' => GoogleChartsHelper::removeCamelCase(($arrColumnas[0])),
//                                    'titleTextStyle' => array('color' => 'red', 'lineheight: 20px;')),
//                                $ejeH => array('title' => GoogleChartsHelper::removeCamelCase(($arrColumnas[1])),
//                                    'titleTextStyle' => array('color' => 'red')),
//                                'width' => $report->Ancho,
//                                'height' => $report->Alto,
//                                'allowHtml' => (($report->AllowHtml) ? 'true' : 'false'),
//                        )));
//                        ?>
                    </div>
                </div>
                <?php
            endforeach;
        endif;
        ?>
    </section>

<?php } ?>