<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Suscripcion".
 *
 * @property integer $idNTC_Suscripcion
 * @property string $Email
 * @property integer $fkNTC_UsuarioWeb
 * @property integer $fkNTC_Cliente
 * @property integer $Quitar
 * @property string $FechaAlta
 * @property string $FechaUltimoEnvio
 * @property string $NombreUltimoEnvio
 * @property string $IpRegistro
 * @property integer $fkNTC_GetResponseConfig
 *
 * @property NTCGetResponseConfig $fkNTCGetResponseConfig
 * @property NTCUsuarioWeb $fkNTCUsuarioWeb
 * @property NTCCliente $fkNTCCliente
 */
class Suscripcion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Suscripcion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Email', 'FechaAlta', 'IpRegistro'], 'required'],
            [['fkNTC_UsuarioWeb', 'fkNTC_Cliente', 'Quitar', 'fkNTC_GetResponseConfig'], 'integer'],
            [['FechaAlta', 'FechaUltimoEnvio'], 'safe'],
            [['Email', 'NombreUltimoEnvio'], 'string', 'max' => 150],
            [['IpRegistro'], 'string', 'max' => 15],
            [['fkNTC_GetResponseConfig'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGetResponseConfig::className(), 'targetAttribute' => ['fkNTC_GetResponseConfig' => 'idNTC_GetResponseConfig']],
            [['fkNTC_UsuarioWeb'], 'exist', 'skipOnError' => true, 'targetClass' => NTCUsuarioWeb::className(), 'targetAttribute' => ['fkNTC_UsuarioWeb' => 'idNTC_UsuarioWeb']],
            [['fkNTC_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_Cliente' => 'idNTC_Cliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Suscripcion' => 'Id Ntc  Suscripcion',
            'Email' => 'Email',
            'fkNTC_UsuarioWeb' => 'Fk Ntc  Usuario Web',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'Quitar' => 'Quitar',
            'FechaAlta' => 'Fecha Alta',
            'FechaUltimoEnvio' => 'Fecha Ultimo Envio',
            'NombreUltimoEnvio' => 'Nombre Ultimo Envio',
            'IpRegistro' => 'Ip Registro',
            'fkNTC_GetResponseConfig' => 'Fk Ntc  Get Response Config',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGetResponseConfig()
    {
        return $this->hasOne(GetResponseConfig::className(), ['idNTC_GetResponseConfig' => 'fkNTC_GetResponseConfig']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioWeb()
    {
        return $this->hasOne(UsuarioWeb::className(), ['idNTC_UsuarioWeb' => 'fkNTC_UsuarioWeb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['idNTC_Cliente' => 'fkNTC_Cliente']);
    }
}
