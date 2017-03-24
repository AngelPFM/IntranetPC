<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;


/**
 * User model
 *
 * @property integer $id
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property string $auth_key
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 * @property string $password write-only password
 */
class User extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    


    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['status', 'default', 'value' => self::STATUS_ACTIVE],
            ['status', 'in', 'range' => [self::STATUS_ACTIVE, self::STATUS_DELETED]],
        ];
    }

    /**
     * @inheritdoc
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * @inheritdoc
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds user by password reset token
     *
     * @param string $token password reset token
     * @return static|null
     */
    public static function findByPasswordResetToken($token)
    {
        if (!static::isPasswordResetTokenValid($token)) {
            return null;
        }

        return static::findOne([
            'password_reset_token' => $token,
            'status' => self::STATUS_ACTIVE,
        ]);
    }

    /**
     * Finds out if password reset token is valid
     *
     * @param string $token password reset token
     * @return bool
     */
    public static function isPasswordResetTokenValid($token)
    {
        if (empty($token)) {
            return false;
        }

        $timestamp = (int) substr($token, strrpos($token, '_') + 1);
        $expire = Yii::$app->params['user.passwordResetTokenExpire'];
        return $timestamp + $expire >= time();
    }

    /**
     * @inheritdoc
     */
    public function getId()
    {
        return $this->getPrimaryKey();
    }

    /**
     * @inheritdoc
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @inheritdoc
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool if password provided is valid for current user
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    /**
     * Generates password hash from password and sets it to the model
     *
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    /**
     * Generates "remember me" authentication key
     */
    public function generateAuthKey()
    {
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    /**
     * Generates new password reset token
     */
    public function generatePasswordResetToken()
    {
        $this->password_reset_token = Yii::$app->security->generateRandomString() . '_' . time();
    }

    /**
     * Removes password reset token
     */
    public function removePasswordResetToken()
    {
        $this->password_reset_token = null;
    }
    
    public function obtieneBotonesMenuPrincipal($modelo = "", $padre = 0, $moduloActual = "")
	{
		$botonesMenu = array();
                $usuario = User::find(["id"=> Yii::$app->user->id])->one();

		//A�adimos al array de item el indice, about y login ya que estos ser�n fijos
		$arrayItems = array();
		$acciones = $usuario->menuPrincipal($padre);
		
		foreach ($acciones as $accion)
		{
			$clase   = "amenupri";
			$claseli = "limenupri";
			
			//Montamos el bot�n para cada m�dulo
			$modulo = $accion->idNTC_Modulo;
			$moduloNombre = $accion->Nombre;
			
			$miModelo = $accion->Modelo;
			
			$modelName = lcfirst($miModelo);
			
                       
			if( $modelName == lcfirst($modelo) && ($modulo == Yii::app()->controller->mod || moduloActual == "") ){
				$clase .= " amenupri_sel";
				$claseli .= " limenupri_sel";
				
				//SI SOY EL MENU SELECCIONADO LO DESPLIEGO 
				// Y ESCONDO LOS DEMAS
				Yii::app()->clientScript->registerScript(
						'menu_sel',
						"
						despliegaMenus('" . $padre . "');
						",
						CClientScript::POS_READY);
			}
			
			array_push(
				$arrayItems, 
				array(
					'itemOptions'=>array(
									'class'=>$claseli),
					'linkOptions'=>array(
									'class'=>$clase, 
									'id'=>'mod_'.$modulo), 
				   'label'=>$moduloNombre, 
				   'url'=>array('/'.$modelName."/mod_".$modulo),
				   'visible'=>!Yii::$app->user->isGuest));
		}
		
		$botonesMenu['items'] = $arrayItems;
		
		return $botonesMenu;
	}
        public function menuPrincipal($padre = 0)
	{
		$usuario = Usuario::find(["id"=> Yii::$app->user->id])->one();
                
                //CBDCRITERIA METODO PARA BUSCAR CON CONDICIONES
		$modulos = Modulo::find()->where(['Quitar'=>false,'Padre'=>$padre])->orderBy('Orden ASC')->all();
		//Obtenemos los modulos
		foreach ($modulos as $key=>$modulo)
		{
			$quitarlo = false;
				
			if ($padre != 0)
			{
				//Si se piden los módulos hijos de un padre se quitan los que no tengan
				//permiso de Index
				$accion = Accion::find()->where(array(
						'fkNTC_Modulo'=>$modulo->idNTC_Modulo,
						'fkNTC_Rol'=>$usuario->fkNTC_Rol,
						'Quitar'=>0,
						'Nombre'=>'index'
				))->all();
	
				if ($accion == null)
				{
					$quitarlo = true;
				}
			}
			else
			{
				// Si se piden los módulos padres se quitan los que no tengan ningún
				// hijo con permiso de index
				$modulosHijos = Modulo::find()->where(array(
						'Quitar' => 0,
						'Padre' => $modulo->idNTC_Modulo
				))->all();
				
				if (count($modulosHijos) > 0)
				{
					$aHijos = array();
					foreach($modulosHijos as $modHijo)
					{
						$aHijos[] = $modHijo->idNTC_Modulo;
					}
						
					$accion = Accion::find()->where(array('fkNTC_Modulo'=>$aHijos,'fkNTC_Rol'=>Yii::app()->user->getUsuario()->fkNTC_Rol, 'Quitar'=>0, 'Nombre'=>'index'))->all();

					if ($accion == null || count($accion) == 0)
					{
						$quitarlo = true;
					}
				}
				else
				{
					$quitarlo = true;
				}
			}
				
			if ($quitarlo == true)
			{
				unset($modulos[$key]);
			}
		}
		return $modulos;
	}
        
        public function getRol(){
            
            return $this->hasOne(User::className(), ['idNTC_Usuario' => 'fkNTC_Rol']);
        }
}


