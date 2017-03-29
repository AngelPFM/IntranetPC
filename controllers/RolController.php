<?php

namespace app\controllers;

use Yii;
use app\models\Rol;
use app\models\RolSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * Rol2Controller implements the CRUD actions for Rol model.
 */
class RolController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
            'access'=> [
                'class'=> \yii\filters\AccessControl::className(),
                'only'=> ['index', 'create', 'update', 'view'],
                'rules'=> [
        [
            'allow'=>true,
            'roles'=> ['@']
        ]
                ]
            ]
        ];
    }

    /**
     * Lists all Rol models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RolSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Rol model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Rol model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Rol();

        if ($model->load(Yii::$app->request->post()) ) {
            $model->Quitar=0;
            if ($model->save())
        return $this->redirect(['index']);
            else 
                    return $this->render('create', [
                'model' => $model,
            ]);
                
        }
            return $this->render('create', [
                'model' => $model,
            ]);
        
    }
    

    /**
     * Updates an existing Rol model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idNTC_Rol]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Rol model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Rol model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Rol the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Rol::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
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
