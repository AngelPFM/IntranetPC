<?php

/**
 * Controlador para el modelo Fichero
 * @author Manuel Mestres
 *
 */
class FicheroController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Fichero');
	}
	
	public function actionUpload() {
		if(isset($_POST["tipo"]) &&
			isset($_POST["fichero"]) &&
			isset($_POST["modelId"]) &&
			isset($_POST["tabla"])){
			
			$transaction = Yii::app()->db->beginTransaction();
			
			try
			{
				$tipo = $_POST["tipo"];
				$nombreFichero = $_POST["fichero"];
				$modelId = $_POST["modelId"];
				$tabla = $_POST["tabla"];
				
	//  			$sql = "INSERT INTO ".Yii::app()->params["prefijoTablasBd"]."Fichero SET Fichero = '" . $fichero . "', 
	//  					".Yii::app()->params["prefijoTablasBd"]."TipoFichero='" . $tipo . "',
	//  					Id".$tabla." = ".$modelId;
	//  			$comando = Yii::app()->db->createCommand($sql);
	 			
	 			$nombreCampoTipoFichero = "fk".Yii::app()->params["prefijoTablasBd"]."TipoFichero";
	 			$nombreCampoIdTabla = "fk".$tabla;
	 			
	 			$fichero = new Fichero();
	 			$fichero->Fichero = $nombreFichero;
	 			$fichero->$nombreCampoTipoFichero = $tipo;
	 			$fichero->$nombreCampoIdTabla = $modelId;
	 			$fichero->Quitar = 0;
	 			
	//  			die(F::pre($fichero,true));
	 			
	//  		Yii::log('UPLOAD FICHERO: '.print_r($fichero->getAttributes(),1));
	 			
	 			if($fichero->save()){
					if( $fichero->getPkValue() > 0 ){
						$tipoFichero = new TipoFichero();
						$tipoFichero = $tipoFichero->findByAttributes(array("id".Yii::app()->params["prefijoTablasBd"]."TipoFichero" => $tipo));
						
						if ($tipoFichero->EsImagen == 1)
						{
							$image = Yii::app()->image->load(realpath(Yii::app()->getBasePath() . "/../uploads/".$nombreFichero));
							
							if($tipoFichero->Width != "" || $tipoFichero->Height != ""){
								if($tipoFichero->Width == "") $tipoFichero->Width = NULL;
								if($tipoFichero->Height == "") $tipoFichero->Height = NULL;
								
								$image->resize($tipoFichero->Width, $tipoFichero->Height);
                                                                
							}elseif($tipoFichero->MaxWidth != "" || $tipoFichero->MaxHeight != ""){
								if($tipoFichero->MaxWidth == "") $tipoFichero->MaxWidth = NULL;
								if($tipoFichero->MaxHeight == "") $tipoFichero->MaxHeight = NULL;
								
								if(($tipoFichero->MaxWidth != NULL && $image->__get("width") > $tipoFichero->MaxWidth) ||
									($tipoFichero->MaxHeight != NULL && $image->__get("height") > $tipoFichero->MaxWidth))
									$image->resize($tipoFichero->MaxWidth, $tipoFichero->MaxHeight,Image::AUTO);
							}
		
							$fichero->Nombre = md5($fichero->getPkValue().rand(0,100)."3dIdS").".".$image->__get("ext");
                                                        $fichero->Fichero = $fichero->Nombre;
							$image->save(Yii::app()->getBasePath().Yii::app()->params["rutaFicheros"].$fichero->Nombre);
							$image = Yii::app()->image->load(Yii::app()->getBasePath().Yii::app()->params["rutaFicheros"].$fichero->Nombre);
							$fichero->Width = $image->__get("width");
							$fichero->Height = $image->__get("height");
							$fichero->FechaIns = date("d/m/Y H:i:s");

                                                        if($tipoFichero->thumbWidth != "" || $tipoFichero->thumbHeight != "" ) {
                                                            $imagethumb = Yii::app()->image->load(realpath(Yii::app()->getBasePath() . "/../uploads/".$nombreFichero));
                                                            $imagethumb->resize($tipoFichero->thumbWidth, $tipoFichero->thumbHeight);
                                                            $imagethumb->save(Yii::app()->getBasePath().Yii::app()->params["rutaFicheros"]."thumb_".$fichero->Nombre);
                                                        }
                                                        
                                                        if($tipoFichero->midWidth != "" || $tipoFichero->midHeight != "" ) {
                                                            $imagemid = Yii::app()->image->load(realpath(Yii::app()->getBasePath() . "/../uploads/".$nombreFichero));
                                                            $imagemid->resize($tipoFichero->midWidth, $tipoFichero->midHeight);
                                                            $imagemid->save(Yii::app()->getBasePath().Yii::app()->params["rutaFicheros"]."mid_".$fichero->Nombre);
                                                        }
                                                        
                                                }
						else
						{
							$fichero->Nombre = $nombreFichero;
							$fichero->FechaIns = date("d/m/Y H:i:s");
							
							copy(Yii::app()->getBasePath() . "/../uploads/".$fichero->Nombre, Yii::app()->getBasePath().Yii::app()->params["rutaFicheros"].$fichero->Nombre);
						}
						
						if (isset($_POST['idioma']))
						{
							$fichero->Idioma = $_POST['idioma'];
						}
						
						$fichero->save();
						unlink(Yii::app()->getBasePath() . "/../uploads/".$nombreFichero);
						
						echo "OK#".$nombreCampoIdTabla."#".$modelId;
						
						$transaction->commit();
					}
					else{
						$transaction->rollback();
						echo Yii::t('mensaje','mensajeErrorSubirFichero','messages');
					}
	 			}
	 			else{
	 				$transaction->rollback();
	 				print_r($fichero->getErrors()); 			
	 			}
			}
			catch(Exception $ex)
			{
				$transaction->rollback();
				print_r($ex->getMessage());
			}
		}
	}
	
	public function actionQuitar(){
		if($_GET["id"] != "" &&
			$_GET["quitar"] != ""){
			$fichero = new Fichero();
			if($fichero = $fichero->findByPk($_GET["id"])){
				$fichero->Quitar = $_GET["quitar"];
				if($fichero->save())
					echo "1";
				else{
					echo print_r($fichero->getErrors(),1);
				}
			}
		}
	}
}