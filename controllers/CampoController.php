<?php

/**
 * Controlador para el modelo Campo
 * @author Oscar Tordera
 *
 */
class CampoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Campo');
	}
	
	public function actionCheckeaAjax($mod="", $rol=0, $campo=0, $state=0, $escenario=""){
		//Yii::log("Modulo(" . $mod . ") Rol(" . $rol . ") Campo(" . $campo . ") Estado(" . $state . ") Escenario(" . $escenario . ")" );
		
		$elcampo = Campo::model()->findAllByAttributes(array("fkNTC_Rol"=>$rol, "fkNTC_Modulo"=>$mod, "Nombre"=>$campo, "Escenario"=>$escenario));
		
		//Yii::log("ELCAMPO: " . print_r($elcampo,1));
		
		if( count($elcampo) > 0 )
		{
			if( $state == 1 )
			{
				$elcampo[0]->Quitar = 0; 
			}
			else 
			{
				$elcampo[0]->Quitar = 1;
			}
			
			echo ($elcampo[0]->save())?'1':'0';
		}
		else
		{
			if( $state == 1 )
			{
				$campoInsertar = new Campo();
				$campoInsertar->fkNTC_Modulo = (int)$mod;
				$campoInsertar->fkNTC_Rol    = (int)$rol;
				$campoInsertar->Nombre       = $campo;
				$campoInsertar->Escenario    = $escenario;
	
				Yii::log("CAMPOINSERTAR: " . print_r($campoInsertar,1));
				echo ($campoInsertar->save())?'1':'0';
			}
			else
			{
				echo '1';
			}
		}
	}
	
	public function actionGuardarOrden()
	{
		$idModulo = $_GET["mod"];
		$idRol = $_GET["rol"];
		
		$arrNombreCampo = explode(";",$_GET["orden"]);
		
		$orden = 1;
		foreach($arrNombreCampo as $nombreCampo)
		{
			if($nombreCampo != ""){
				$campos = Campo::model()->findAllByAttributes(array("fk".Yii::$app->params["prefijoTablasBd"]."Modulo"=>$idModulo,
															"fk".Yii::$app->params["prefijoTablasBd"]."Rol"=>$idRol, 
															"Nombre"=>$nombreCampo));
				
				$arrExcenarios = array("view", "index", "update", "create", "search");
				$arrBorrar = array();
				
				foreach($campos as $campo)
				{
					if(in_array($campo->Escenario, $arrExcenarios)){
// 	 					echo $campo->Nombre."-".$campo->Escenario."<br>";
						$campo->Orden = $orden;
						$campo->save();
						$arrBorrar[] = $campo->Escenario;
					}
				}
				 $vectorRestantes = array_diff($arrExcenarios, $arrBorrar);
// 				 echo "<br>RESTANTES: ".print_r($vectorRestantes,1);
				 foreach($vectorRestantes as $escenario){
				 	$campoNuevo = new Campo();
				 	
				 	$nombreModulo = "fk".Yii::$app->params["prefijoTablasBd"]."Modulo";
				 	$campoNuevo->$nombreModulo = $idModulo;
				 	$nombreRol = "fk".Yii::$app->params["prefijoTablasBd"]."Rol";
				 	$campoNuevo->$nombreRol = $idRol;
				 	$campoNuevo->Nombre = $nombreCampo;
				 	$campoNuevo->Quitar = 1;
				 	$campoNuevo->Escenario = $escenario;
				 	$campoNuevo->Orden = $orden;
				 	$campoNuevo->save();
				 }
				
				$orden++;
			}
		}
	}
}
