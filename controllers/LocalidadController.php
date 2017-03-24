<?php

/**
 * Controlador para el modelo Localidad
 * @author Manuel Mestres
 *
 */
class LocalidadController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Localidad');
	}
	
	public function actionList(){
		if(Yii::$app->request->isAjaxRequest && isset($_POST['term']))
		{
			$name = $_POST['term'];
			$criteria = new CDbCriteria();
			$criteria->condition .= 'lower(Nombre) LIKE lower(:sterm)';
			$criteria->params = array(":sterm"=>"%$name%");
			$criteria->order = '"Nombre" ASC';
			$criteria->limit = 50;
			
			$localidadesArray = Localidad::model()->findAll($criteria);
			$returnVal = array();
			foreach($localidadesArray as $localidad)
			{
				$returnVal[] = array('label'=>$localidad->getAttribute('Nombre'),
						'value'=>$localidad->getAttribute('Nombre'),
						'id'=>$localidad->getAttribute('idNTC_Localidad'));
			}
			echo CJSON::encode($returnVal);
		}
	}
}
