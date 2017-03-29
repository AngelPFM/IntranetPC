<?php

namespace app\controllers;

use Yii;
use app\models\Rol;
use app\models\RolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
/**
 * Controlador para el modelo Rol
 * @author AngelH
 *
 */
class RolController extends \yii\base\Controller
{
    
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
	
	
	public function actionClonar()
	{
		$id = $_GET['id'];
		$rol = Rol::model()->findByPk($id);
		
		$campoRol = 'fk'.Yii::$app->params['prefijoTablasBd'].'Rol';
		$campoModulo = 'fk'.Yii::$app->params['prefijoTablasBd'].'Modulo';
		
		$acciones = Accion::model()->findAllByAttributes(array($campoRol=>$id));
		$campos = Campo::model()->findAllByAttributes(array($campoRol=>$id));
		
		$transaction = Yii::$app->db->beginTransaction();
		$ok = true;
		
		$nuevoRol = new Rol();
		$nuevoRol->Nombre = $rol->Nombre.' (copia)';
		$nuevoRol->Quitar = 0;
		if ($nuevoRol->save())
		{
			foreach ($acciones as $accion)
			{
				$nuevaAccion = new Accion();
				$nuevaAccion->Nombre = $accion->Nombre;
				$nuevaAccion->$campoModulo = $accion->$campoModulo;
				$nuevaAccion->$campoRol = $nuevoRol->getPkValue();
				$nuevaAccion->Quitar = $accion->Quitar;
				if (!$nuevaAccion->save())
				{
					$ok = false;
					break;
				}
			}
			
			if ($ok = true)
			{
				foreach($campos as $campo)
				{
					$nuevoCampo = new Campo();
					$nuevoCampo->Nombre = $campo->Nombre;
					$nuevoCampo->Quitar = $campo->Quitar;
					$nuevoCampo->$campoModulo = $campo->$campoModulo;
					$nuevoCampo->$campoRol = $nuevoRol->getPkValue();
					$nuevoCampo->Escenario = $campo->Escenario;
					$nuevoCampo->Orden = $campo->Orden;
					if (!$nuevoCampo->save())
					{
						$ok = false;
						break;
					}
				}
			}
		}
		else
		{
			$ok = false;
		}
		
		if ($ok)
		{
			$transaction->commit();
			$this->redirect(Yii::$app->createAbsoluteUrl('rol/view',array('id'=>$nuevoRol->getPkValue())));
		}
		else
		{
			$transaction->rollback();
			$this->redirect(Yii::$app->createAbsoluteUrl('rol'));
		}
	}
}
