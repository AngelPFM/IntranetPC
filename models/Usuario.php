<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Usuario".
 *
 * @property integer $idNTC_Usuario
 * @property string $Nombre
 * @property integer $fkNTC_Rol
 * @property integer $MaxIntentos
 * @property string $FechaValidezIni
 * @property string $FechaValidezFin
 * @property string $Hash
 * @property integer $Quitar
 * @property string $Email
 */
class Usuario extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Usuario';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Rol', 'MaxIntentos', 'Quitar'], 'integer'],
            [['FechaValidezIni', 'FechaValidezFin'], 'safe'],
            [['Nombre', 'Hash', 'Email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Usuario' => 'Id Ntc  Usuario',
            'Nombre' => 'Nombre',
            'fkNTC_Rol' => 'Fk Ntc  Rol',
            'MaxIntentos' => 'Max Intentos',
            'FechaValidezIni' => 'Fecha Validez Ini',
            'FechaValidezFin' => 'Fecha Validez Fin',
            'Hash' => 'Hash',
            'Quitar' => 'Quitar',
            'Email' => 'Email',
        ];
    }
    
    public function menuPrincipal($padre = 0)
	{
	
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
						'fkNTC_Rol'=>Yii::$app->user->getUsuario()->fkNTC_Rol,
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
						
					$accion = Accion::find()->where(array('fkNTC_Modulo'=>$aHijos,'fkNTC_Rol'=>6, 'Quitar'=>0, 'Nombre'=>'index'));

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
}
