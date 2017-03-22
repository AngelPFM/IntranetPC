<?php

/**
 * Controlador para GoolgeCharts
 * @author Jesus Mira
 *
 */
class ChartController extends Controller
{
	public function actionGetData(){
		if(Yii::app()->request->isAjaxRequest && isset($_POST['model']) && isset($_POST['columns'])){
			if(isset($_POST['model']) && $_POST['model']!=''){
				$model = $_POST['model'];
				$dataModel = new $model;
				$columns = $_POST['columns'];
				if(isset($_POST['criteria']) && $_POST['criteria']!=''){
					$data = $dataModel->findAll(CJSON::decode($_POST['criteria']));
				}
				else{
					$data = $dataModel->findAll();
				}
				$metadata = $dataModel->getMetaData();
				foreach($columns as $col){
					
					if(isset($metadata->columns[$col])){
						$type = $metadata->columns[$col]->type;
						if($type=='integer') $type='number';
					}
					else{
						$type = 'number';
					}
					$cols[] = array('id'=>'col_'.$col, 'label'=>$dataModel->getAttributeLabel($col), 'pattern'=>'', 'type'=>$type );
				}
				
				foreach ($data as $value){
					$cells = array();
					
					foreach($columns as $col){
						$cells[] = array('v'=>$value->$col);
					}
					$rows[] = array('c'=>$cells);
				}
				echo CJSON::encode(array('cols'=>$cols, 'rows'=>$rows));
			}
		}
	}
}