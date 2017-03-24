<?php

/**
 * Controlador para el modelo Mensaje
 * @author Manuel Mestres
 *
 */
class MensajeController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Mensaje');
	}
	
	/**
	 * Lista todos los modelos
	 */
	public function actionIndex($mod="")
	{
            if($mod==257){
                $cdw=" WHERE om.Category LIKE '%look%'";
            }else{
                $cdw=" WHERE om.Category NOT LIKE '%look%'";
            }
		$idiomas = Idioma::model()->findAllByAttributes(array('Quitar'=>0));
		
		$sql = "SELECT DISTINCT om.idNTC_OrigenMensaje as id, om.Category as Categoria, om.Message as Original ";
		$leftjoin = "";
		$cont = 1;
		foreach($idiomas as $idioma)
		{
			$sql .= ", m$cont.Translation as ".$idioma->idNTC_Idioma;
			$leftjoin .= "LEFT JOIN NTC_Mensaje m$cont ON om.idNTC_OrigenMensaje=m$cont.fkNTC_OrigenMensaje AND m$cont.Language='".$idioma->idNTC_Idioma."' ";
			
			$cont++;
		}
		$sql .= " FROM NTC_OrigenMensaje om ".$leftjoin. $cdw ." ORDER BY om.Category, om.Message";
		$mensajes = Yii::$app->db->createCommand($sql)->queryAll();
		
		$listaMensajes = array();
		foreach($mensajes as $mensaje)
		{
			$listaMensajes[$mensaje['Categoria']][] = $mensaje;
		}
		
		$this->render(
			'/intranet/listadoEtiquetas',
			array(
				'categorias' => $listaMensajes,
			)
		);
	}
	
	public function actionUpdateAjax()
	{
		$retorno = 'OK';
		
		try
		{
			if ($_POST['id'] != '' && $_POST['lang'] != '')
			{
				$mensaje = Mensaje::model()->findByAttributes(
					array(
						'fkNTC_OrigenMensaje' => $_POST['id'],
						'Language' => $_POST['lang']
					)
				);
				
				if ($mensaje == null)
				{
					$mensaje = new Mensaje();
					$mensaje->fkNTC_OrigenMensaje = $_POST['id'];
					$mensaje->Language = $_POST['lang']; 
				}
				
				$mensaje->Translation = $_POST['text'];
				
				if (!$mensaje->save())
				{
					$retorno = 'KO';
				}
			}
		}
		catch (Exception $ex)
		{
			$retorno = 'KO';
		}
		
		echo $retorno;
	}
}
