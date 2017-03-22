<?php

class ArticuloController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Articulo');
	}
	
	public function actionChange(){
		if(Yii::app()->request->isAjaxRequest && isset($_GET['id']) && isset($_GET['model'])){
			$id = $_GET['id'];
			$modelName = $_GET['model'];
			$articulo = Articulo::model()->findByPk($id);
				
			if(isset($articulo)){
				$relaciones = $articulo->relations();
				foreach($relaciones as $relacion=>$attrib){
// 					Yii::log('relacion: '.print_r($attrib,1));
					if($attrib[1]==$modelName){
						$listaRelacionados = $articulo->$relacion();
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
	
	public function actionGetColores(){
		if(Yii::app()->request->isAjaxRequest && isset($_GET['id'])){
			
			$id = $_GET['id'];
			$articulo = Articulo::model()->findByPk($id);
			$modelName = "Variante";
			if(isset($articulo)){
				/*
				$model = new $modelName();
				$data = CHtml::listData($listaRelacionados, $model->getPkName(), $model->viewName());
				echo CHtml::activeDropDownList($model, $model->getPkName(), $data, array('empty'=>'seleccione...'));*/
				
				$sql = "SELECT DISTINCT NTC_OpcionAtributo.idNTC_OpcionAtributo, NTC_OpcionAtributo.Opcion
						FROM NTC_Variante
						LEFT JOIN NTC_DetalleVariante ON NTC_Variante.idNTC_Variante = NTC_DetalleVariante.fkNTC_Variante
						LEFT JOIN NTC_Atributo ON NTC_DetalleVariante.fkNTC_Atributo = NTC_Atributo.idNTC_Atributo
						LEFT JOIN NTC_OpcionAtributo ON NTC_DetalleVariante.fkNTC_OpcionAtributo = NTC_OpcionAtributo.idNTC_OpcionAtributo
						WHERE NTC_Variante.fkNTC_Articulo = ".$articulo->getPkValue()." AND esColor = 1";
				
				$opciones = OpcionAtributo::model()->findAllBySql($sql);
				
				$model = new $modelName();
				$data = CHtml::listData($opciones, "idNTC_OpcionAtributo", "Opcion");
				echo CHtml::activeDropDownList($model, $model->getPkName(), $data, array('empty'=>'seleccione...'));
				
			}
		}
		Yii::app()->end();
	}
	
	
	
	public function actionGenerarVariantes(){
		
		$idArticulo = $_REQUEST["idArticulo"];
		if($idArticulo){
			ob_start();
			$articulo = Articulo::model()->findByPk($idArticulo);
			ob_end_clean();
			if(isset($articulo)){
				$atributosConjunto = $articulo->conjuntoAtributos->atributosConjunto;

				$arrAtributos = array();
				foreach($atributosConjunto as $atributo){
					$atributo = $atributo->atributo;
					if($atributo->DefineProducto == 1){
						$arrAtributoTemp = array();
						$arrAtributoTemp["id"] = $atributo->getPkValue();
						$arrAtributoTemp["nombre"] = $atributo->viewValue();
						
						
						$opcionesAtributo = $atributo->opciones;
						foreach($opcionesAtributo as $opcionAtributo){
							$arrAtributoTemp["opciones"][] = array("idAtributo"=>$atributo->getPkValue(), "nombreAtributo"=>$atributo->viewValue(), "id"=>$opcionAtributo->getPkValue(), "nombre"=>$opcionAtributo->Nombre);
						}
					}
					
					$arrAtributos[] = $arrAtributoTemp;
				}
				$arrayMezcla = array();
				foreach($arrAtributos as $arrAtributo){
					$arrayMezcla = $this->combiarArrays($arrAtributo["opciones"], $arrayMezcla);
				}
				
				foreach($arrayMezcla as $combinacion){
					$sqlVariante = "SELECT * FROM (
										SELECT COUNT(*) as totalOpciones
										FROM NTC_Variante 
										LEFT JOIN NTC_DetalleVariante ON NTC_Variante.idNTC_Variante = NTC_DetalleVariante.fkNTC_Variante
										WHERE NTC_Variante.fkNTC_Articulo = ".$articulo->getPkValue()." 
										AND (";
					$numElementoCombinacion = 0;
					foreach($combinacion as $elementoCombinacion){
						if($numElementoCombinacion > 0)
							$sqlVariante .= " OR ";
						$sqlVariante .= "fkNTC_OpcionAtributo = ".$elementoCombinacion["id"];
						$numElementoCombinacion++;
					}
					$sqlVariante .= ") GROUP BY fkNTC_Variante) as selectVariante
									WHERE totalOpciones = ".sizeof($combinacion);
					
					
					$variante = Variante::model()->findBySql($sqlVariante);
					
					if(!$variante){
						
						$variante = new Variante();
						$variante->fkNTC_Articulo = $articulo->getPkValue();
						$nombreVariante = "";
						foreach($combinacion as $elementoCombinacion){
							if($nombreVariante != "")
								$nombreVariante .= " - ";
							$nombreVariante .= $elementoCombinacion["nombreAtributo"]." ".$elementoCombinacion["nombre"];
						}
						$variante->Nombre = $nombreVariante;
						if($variante->save()){
							$numOpcion = 1;
							foreach($combinacion as $elementoCombinacion){
								$detalleVariante = new DetalleVariante();
								$detalleVariante->fkNTC_Variante = $variante->getPkValue();
								$detalleVariante->fkNTC_Atributo = $elementoCombinacion["idAtributo"];
								$detalleVariante->fkNTC_OpcionAtributo = $elementoCombinacion["id"];
								$detalleVariante->Orden = $numOpcion;
								
								$detalleVariante->save();
								$numOpcion++;
							}
						}
					}
				}
				echo "OK###";
			}
		}
	}
	
	public function combiarArrays($array1, $arraySalida){
		$arrResultado = array();
		$tamArrSalida = sizeof($arraySalida);
		if($tamArrSalida > 0){
			foreach($arraySalida as $elemArr1){
				foreach($array1 as $elemArr2){
					$arrTemp = array();
					foreach($elemArr1 as $elementoArray){
						$arrTemp[] = $elementoArray;
					}
					$arrTemp[] = $elemArr2;
					$arrResultado[] = $arrTemp;
				}
			}
		}else{
			foreach($array1 as $elemArray)
				$arrResultado[] = array($elemArray);
		}
		
		return $arrResultado;
	}
}