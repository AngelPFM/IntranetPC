<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Report;






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
           
            $reports = Report::find()->orderBY('Orden ASC')->all();
            return $this->render('index', array("reports" => $reports));
        }
    }

    /**
     * This is the action to handle external exceptions.
     */
    public function actionError() {
        if ($error = Yii::$app->errorHandler->error) {
            if (Yii::$app->request->isAjaxRequest)
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

                mail(Yii::$app->params['adminEmail'], $subject, $model->body, $headers);
                Yii::$app->user->setFlash('contact', 'Thank you for contacting us. We will respond to you as soon as possible.');
                $this->refresh();
            }
        }
        $this->render('contact', array('model' => $model));
    }

    /**
     * Displays the login page
     */
    public function actionLogin()
    {
        
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goHome();
        } else {
            $this->layout = '/login';
            return $this->render('login', [
                'model' => $model,
            ]);
        }
        
    }
    
    

    /**
     * Logs out the current user and redirect to homepage.
     */
    public function actionLogout() {
        Yii::$app->user->logout();
        $this->redirect(Yii::$app->homeUrl);
    }
    
    public function actionLoginAs($id){
		$sesion = Yii::$app->session->sessionId;
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
		
		Yii::$app->request->redirect(Yii::$app->createAbsoluteUrl("/"));
	}
}
