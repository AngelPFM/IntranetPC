<?php

/**
 * Controlador para el modelo Accion
 * @author Oscar Tordera
 *
 */
class AccionController extends GenericController
{
    
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Accion');
	}
	
	
	public function actionCheckeaAjax($mod="", $rol=0, $accion=0, $state=0){
		Yii::log("Modulo(" . $mod . ") Rol(" . $rol . ") Accion(" . $accion . ") Estado(" . $state . ")" );
		
		$laaccion = Accion::model()->findByAttributes(array("fkNTC_Rol"=>$rol, "fkNTC_Modulo"=>$mod, "Nombre"=>$accion));
		
		if( isset($laaccion) )
		{
			Yii::log("Accion: " . print_r($laaccion->attributes,1) );
			
			if( $state == 1 )
			{
				$laaccion->Quitar = 0;
			}	
			else
			{
				$laaccion->Quitar = 1;
			}
			
			echo ($laaccion->save())?'1':'0';
		}
		else
		{
			if( $state == 1 )
			{
				$accionInsertar = new Accion();
				$accionInsertar->fkNTC_Modulo = (int)$mod;
				$accionInsertar->fkNTC_Rol = (int)$rol;
				$accionInsertar->Nombre = $accion;
	
				echo ($accionInsertar->save())?'1':'0';
			}	
		}
	}
}
