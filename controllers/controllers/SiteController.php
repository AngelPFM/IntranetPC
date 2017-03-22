<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Report;

//hola




class SiteController extends Controller {

    /**
     * Declares class-based actions.
     */
    
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }
    
    

    /**
     * This is the default 'index' action that is invoked
     * when an action is not explicitly requested by users.
     */
    public function actionIndex($mod = "") {

        if (Yii::$app->user->isGuest) {
            /* echo "<br>".$this->createUrl("site/login")."<br>";
              die(); */
            $this->redirect("site/login");
        } else {
            $reports = Reports::find()->orderBY('Orden ASC')->all();
            $this->render('index', array("reports" => $reports));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::app()->errorHandler->error) {
            if (Yii::app()->request->isAjaxRequest)
                echo 'ERROR: ' . $error['message'];
            else
                $this->render('error', $error);
        }
    }

    /**
     * Displays the contact page
     */
    public function actionContact() {
        $model = new ContactForm;
        if (isset($_POST['ContactForm'])) {
            $model->attributes = $_POST['ContactForm'];
            if ($model->validate()) {
                $name = '=?UTF-8?B?' . base64_encode($model->name) . '?=';
                $subject = '=?UTF-8?B?' . base64_encode($model->subject) . '?=';
                $headers = "From: $name <{$model->email}>\r\n" .
                        "Reply-To: {$model->email}\r\n" .
                        "MIME-Version: 1.0\r\n" .
                        "Content-type: text/plain; charset=UTF-8";

                mail(Yii::app()->params['adminEmail'], $subject, $model->body, $headers);
                Yii::app()->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin() {
// 		Yii::log("EL USUARIO: " . print_r( Yii::app()->user->getUsuario(), 1) . "\n\nSESSION " . print_r($_SESSION,1) );
        $model = new IntranetLoginForm;
        //$aplicaciones = Aplicacion::model()->findAll();
        // if it is ajax validation request
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }

// 		Yii::log("llego1.0 " . print_r($_POST,1));
        //Yii::app()->end();
        // collect user input data
        if (isset($_POST['IntranetLoginForm'])) {
            $model->attributes = $_POST['IntranetLoginForm'];
            // validate user input and redirect to the previous page if valid
            if ($model->validate() && $model->login()) {
// 				Yii::log("llego2.0 " . print_r($_POST,1));
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->layout = '//layouts/login';

// 		echo "<pre>" . print_r($aplicaciones,1) . "</pre>";
        // Muestra la vista login(/protected/views) usando el layout/login(theme/gambrro/layouts/login)
        $this->render(
                'login', array(
            'model' => $model,
                )
        );
    }

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }
    
    public function actionLoginAs($id){
		$sesion = Yii::app()->session->sessionId;
		$loginAs = LoginAs::model()->findByAttributes(array("Quitar"=>0, "Session"=>$sesion, "fk".F::miApp()."Cliente"=>$id));
		if($loginAs){
			$usuario = $loginAs->Cliente->usuarioWeb;
			
			if($usuario->Quitar == 0 &&
				$usuario->Activo == 1){
				
				$model=new LoginForm;
				$model->username = $usuario->Email;
				if($model->loginAs()){
					$loginAs->delete();
				}
			}
		}
		
		Yii::app()->request->redirect(Yii::app()->createAbsoluteUrl("/"));
	}
}
