<?php

namespace app\controllers;

use Yii;
use app\models\Mensaje;
use app\models\MensajeSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * MensajeController implements the CRUD actions for Mensaje model.
 */
class MensajeController extends Controller
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
        ];
    }

    /**
     * Lists all Mensaje models.
     * @return mixed
     */
    public function actionIndex(){
  
          //if($mod==''){
                $cdw=" WHERE om.Category LIKE '%look%'";
            /*}else{
                $cdw=" WHERE om.Category NOT LIKE '%look%'";
            }*/
		$idiomas = \app\models\Idioma::find()->where(array('Quitar'=>0))->all();
		
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
		return $this->render(
			'index',
			array(
				'categorias' => $listaMensajes,
			)
		);
    }

    /**
     * Displays a single Mensaje model.
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
     * Creates a new Mensaje model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Mensaje();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idNTC_Mensaje]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Mensaje model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->idNTC_Mensaje]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Mensaje model.
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
     * Finds the Mensaje model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Mensaje the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Mensaje::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
