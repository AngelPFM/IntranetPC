<?php

$this->Widget('ext.highcharts.HighchartsWidget', array(
	'options'=>array(
		'title' => array('text' => 'Usuarios Registrados'),
		'xAxis' => array(
				'categories' => array('Enero', 'Febrero', 'Marzo', 'Abril')
		),
		'yAxis' => array(
				'title' => array('text' => 'Registros')
		),
		'series' => array(
				array('data' => array(10, 230, 4000, 50000)),
		),
		'credits' => array(
			'enabled'=>false,
		)
	)
));

/*
// Chart with pie
$this->widget('ext.amcharts.EAmChartWidget',
		array(
				'width' => 700,
				'height' => 400,
				'Chart'=>array(
						'dataProvider'=>  array("platanos"=>5, "naranjas"=>6),
						'titleField' => 'Country',
						'valueField' => 'Medals',
						'type' => 'pie'
				)
		));
*/