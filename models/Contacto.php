<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Contacto".
 *
 * @property integer $idNTC_Contacto
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Telefono
 * @property string $Email
 * @property string $Asunto
 * @property string $Comentario
 * @property integer $fkNTC_UsuarioWeb
 * @property integer $fkNTC_Cliente
 * @property integer $Quitar
 * @property string $FechaAlta
 * @property string $IpContacto
 */
class NTCContacto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Contacto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Email', 'Asunto', 'FechaAlta'], 'required'],
            [['Asunto', 'Comentario'], 'string'],
            [['fkNTC_UsuarioWeb', 'fkNTC_Cliente', 'Quitar'], 'integer'],
            [['FechaAlta'], 'safe'],
            [['Nombre', 'Apellidos'], 'string', 'max' => 100],
            [['Telefono'], 'string', 'max' => 20],
            [['Email'], 'string', 'max' => 150],
            [['IpContacto'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Contacto' => 'Id Ntc  Contacto',
            'Nombre' => 'Nombre',
            'Apellidos' => 'Apellidos',
            'Telefono' => 'Telefono',
            'Email' => 'Email',
            'Asunto' => 'Asunto',
            'Comentario' => 'Comentario',
            'fkNTC_UsuarioWeb' => 'Fk Ntc  Usuario Web',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'Quitar' => 'Quitar',
            'FechaAlta' => 'Fecha Alta',
            'IpContacto' => 'Ip Contacto',
        ];
    }
}
