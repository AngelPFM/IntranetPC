<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_UsuarioWeb".
 *
 * @property integer $idNTC_UsuarioWeb
 * @property integer $fkNTC_TipoUsuarioWeb
 * @property integer $fkNTC_Cliente
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Email
 * @property string $Hash
 * @property integer $MaxIntentos
 * @property string $FechaValidezIni
 * @property string $FechaValidezFin
 * @property string $FechaRegistro
 * @property string $FechaUltimoAcceso
 * @property string $FechaActualAcceso
 * @property integer $Activo
 * @property integer $Quitar
 * @property string $FechaNacimiento
 * @property string $IdFacebook
 * @property string $IdTwitter
 * @property string $IdLinkedin
 * @property string $IdGoogle
 * @property string $IdGithub
 * @property string $IdLive
 * @property integer $Telefono
 * @property integer $Cif
 * @property string $Token
 * @property string $FechaCad
 *
 * @property NTCAlmacen[] $nTCAlmacens
 * @property NTCCarrito[] $nTCCarritos
 * @property NTCSuscripcion[] $nTCSuscripcions
 */
class NTCUsuarioWeb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_UsuarioWeb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_TipoUsuarioWeb', 'Nombre', 'Apellidos', 'Email', 'Hash', 'MaxIntentos', 'FechaValidezIni', 'FechaRegistro', 'FechaNacimiento', 'Telefono', 'Cif'], 'required'],
            [['fkNTC_TipoUsuarioWeb', 'fkNTC_Cliente', 'MaxIntentos', 'Activo', 'Quitar', 'Telefono', 'Cif'], 'integer'],
            [['FechaValidezIni', 'FechaValidezFin', 'FechaRegistro', 'FechaUltimoAcceso', 'FechaActualAcceso', 'FechaNacimiento'], 'safe'],
            [['Nombre', 'Apellidos', 'Hash'], 'string', 'max' => 100],
            [['Email'], 'string', 'max' => 150],
            [['IdFacebook', 'IdTwitter', 'IdLinkedin', 'IdGoogle', 'IdGithub', 'IdLive'], 'string', 'max' => 50],
            [['Token', 'FechaCad'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_UsuarioWeb' => 'Id Ntc  Usuario Web',
            'fkNTC_TipoUsuarioWeb' => 'Fk Ntc  Tipo Usuario Web',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'Nombre' => 'Nombre',
            'Apellidos' => 'Apellidos',
            'Email' => 'Email',
            'Hash' => 'Hash',
            'MaxIntentos' => 'Max Intentos',
            'FechaValidezIni' => 'Fecha Validez Ini',
            'FechaValidezFin' => 'Fecha Validez Fin',
            'FechaRegistro' => 'Fecha Registro',
            'FechaUltimoAcceso' => 'Fecha Ultimo Acceso',
            'FechaActualAcceso' => 'Fecha Actual Acceso',
            'Activo' => 'Activo',
            'Quitar' => 'Quitar',
            'FechaNacimiento' => 'Fecha Nacimiento',
            'IdFacebook' => 'Id Facebook',
            'IdTwitter' => 'Id Twitter',
            'IdLinkedin' => 'Id Linkedin',
            'IdGoogle' => 'Id Google',
            'IdGithub' => 'Id Github',
            'IdLive' => 'Id Live',
            'Telefono' => 'Telefono',
            'Cif' => 'Cif',
            'Token' => 'Token',
            'FechaCad' => 'Fecha Cad',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCAlmacens()
    {
        return $this->hasMany(NTCAlmacen::className(), ['fkNTC_UsuarioWeb' => 'idNTC_UsuarioWeb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCarritos()
    {
        return $this->hasMany(NTCCarrito::className(), ['fkNTC_UsuarioWeb' => 'idNTC_UsuarioWeb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCSuscripcions()
    {
        return $this->hasMany(NTCSuscripcion::className(), ['fkNTC_UsuarioWeb' => 'idNTC_UsuarioWeb']);
    }
}
