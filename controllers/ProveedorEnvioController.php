<?php

/**
 * Controlador para el modelo ProveedorEnvio
 * @author Jesús Mira
 *
 */
class ProveedorEnvioController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'ProveedorEnvio');
	}

	public function actionChange(){
		if(Yii::app()->request->isAjaxRequest && isset($_GET['id']) && isset($_GET['model'])){
			$id = $_GET['id'];
			$modelName = $_GET['model'];
			$proveedor = ProveedorEnvio::model()->findByPk($id);
	
			if(isset($proveedor)){
				$relaciones = $proveedor->relations();
				foreach($relaciones as $relacion=>$attrib){
					// 					Yii::log('relacion: '.print_r($attrib,1));
					if($attrib[1]==$modelName){
						$listaRelacionados = $proveedor->$relacion();
						$model = new $modelName();
						$data = CHtml::listData($listaRelacionados, $model->getPkName(), $model->viewName());
						echo CHtml::activeDropDownList($model, $model->getPkName(), $data, array('empty'=>'seleccione...'));
						break;
					}
				}
			}
		}
		Yii::app()->end();
	}	
	
}
