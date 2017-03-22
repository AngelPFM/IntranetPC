<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_DireccionEmpresa".
 *
 * @property integer $idNTC_DireccionEmpresa
 * @property integer $fkNTC_Empresa
 * @property string $Nombre
 * @property string $Alias
 * @property string $Descripcion
 * @property string $Direccion
 * @property integer $fkNTC_Localidad
 * @property integer $fkNTC_Provincia
 * @property string $CodigoPostal
 * @property integer $fkNTC_Pais
 * @property string $Localidad
 * @property string $Provincia
 * @property string $Email
 * @property string $PrefijoTelefono1
 * @property string $Telefono1
 * @property string $DescripcionTelefono1
 * @property string $PrefijoTelefono2
 * @property string $Telefono2
 * @property string $DescripcionTelefono2
 * @property string $HorarioContacto
 * @property integer $MostrarContacto
 * @property integer $Quitar
 *
 * @property NTCEmpresa $fkNTCEmpresa
 * @property NTCLocalidad $fkNTCLocalidad
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCPais $fkNTCPais
 */
class NTCDireccionEmpresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_DireccionEmpresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Empresa', 'Nombre', 'Alias', 'PrefijoTelefono1', 'Telefono1'], 'required'],
            [['fkNTC_Empresa', 'fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'MostrarContacto', 'Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['Alias'], 'string', 'max' => 80],
            [['Descripcion', 'Email', 'HorarioContacto'], 'string', 'max' => 255],
            [['Direccion'], 'string', 'max' => 150],
            [['CodigoPostal'], 'string', 'max' => 10],
            [['Localidad', 'Provincia', 'DescripcionTelefono1', 'DescripcionTelefono2'], 'string', 'max' => 100],
            [['PrefijoTelefono1', 'PrefijoTelefono2'], 'string', 'max' => 5],
            [['Telefono1', 'Telefono2'], 'string', 'max' => 20],
            [['fkNTC_Empresa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCEmpresa::className(), 'targetAttribute' => ['fkNTC_Empresa' => 'idNTC_Empresa']],
            [['fkNTC_Localidad'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLocalidad::className(), 'targetAttribute' => ['fkNTC_Localidad' => 'idNTC_Localidad']],
            [['fkNTC_Provincia'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_Provincia' => 'idNTC_Provincia']],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_DireccionEmpresa' => 'Id Ntc  Direccion Empresa',
            'fkNTC_Empresa' => 'Fk Ntc  Empresa',
            'Nombre' => 'Nombre',
            'Alias' => 'Alias',
            'Descripcion' => 'Descripcion',
            'Direccion' => 'Direccion',
            'fkNTC_Localidad' => 'Fk Ntc  Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'CodigoPostal' => 'Codigo Postal',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Localidad' => 'Localidad',
            'Provincia' => 'Provincia',
            'Email' => 'Email',
            'PrefijoTelefono1' => 'Prefijo Telefono1',
            'Telefono1' => 'Telefono1',
            'DescripcionTelefono1' => 'Descripcion Telefono1',
            'PrefijoTelefono2' => 'Prefijo Telefono2',
            'Telefono2' => 'Telefono2',
            'DescripcionTelefono2' => 'Descripcion Telefono2',
            'HorarioContacto' => 'Horario Contacto',
            'MostrarContacto' => 'Mostrar Contacto',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCEmpresa()
    {
        return $this->hasOne(NTCEmpresa::className(), ['idNTC_Empresa' => 'fkNTC_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLocalidad()
    {
        return $this->hasOne(NTCLocalidad::className(), ['idNTC_Localidad' => 'fkNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCProvincia()
    {
        return $this->hasOne(NTCProvincia::className(), ['idNTC_Provincia' => 'fkNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCPais()
    {
        return $this->hasOne(NTCPais::className(), ['idNTC_Pais' => 'fkNTC_Pais']);
    }
}
