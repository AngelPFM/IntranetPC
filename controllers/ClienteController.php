<?php

class ClienteController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Cliente');
	}
        
        public function actionLoginAs($id){
		if($id != ""){
			$sesion = Yii::app()->session->sessionId;
			$loginsAs = LoginAs::model()->findAllByAttributes(array("Quitar"=>0, "Session"=>$sesion));
			if($loginsAs)
				foreach($loginsAs as $loginAs)
					$loginAs->delete();
			
			$loginAs = new LoginAs();
			$loginAs->Session = $sesion;
			$loginAs->setAttribute("fk".F::miApp()."Cliente", $id);
			if($loginAs->save()){
				Yii::app()->request->redirect(Yii::app()->getBaseUrl(true)."/../site/LoginAs/".$id);
			}else
				F::pre($loginAs->getErrors());
		}
		
	}
}