<?php

/**
 * Controlador para el modelo Provincia
 * @author Manuel Mestres
 *
 */
class ProvinciaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Provincia');
	}
	
	public function actionChange(){
		if(Yii::$app->request->isAjaxRequest && isset($_GET['id']) && isset($_GET['model'])){
			$id = $_GET['id'];
			$modelName = $_GET['model'];
			$provincia = Provincia::model()->findByPk($id);

			if(isset($provincia)){
				$relaciones = $provincia->relations();
				foreach($relaciones as $relacion=>$attrib){
// 					Yii::log('relacion: '.print_r($attrib,1));
					if($attrib[1]==$modelName){
						$listaRelacionados = $provincia->$relacion();
						$model = new $modelName();
						$data = CHtml::listData($listaRelacionados, $model->getPkName(), $model->viewName());
						echo CHtml::activeDropDownList($model, $model->getPkName(), $data, array('empty'=>'seleccione...'));
						break;
					}
				}
			}
		}
		Yii::$app->end();
	}	
}
