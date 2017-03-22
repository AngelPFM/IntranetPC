<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ContactoProfesional".
 *
 * @property integer $idNTC_ContactoProfesional
 * @property string $Empresa
 * @property string $CIF
 * @property string $TipoDistribuidor
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Direccion
 * @property integer $fkNTC_Localidad
 * @property string $Localidad
 * @property integer $fkNTC_Provincia
 * @property string $Provincia
 * @property string $CodigoPostal
 * @property integer $fkNTC_Pais
 * @property string $PrefijoTelefono
 * @property string $Telefono
 * @property string $Email
 * @property string $Web
 * @property integer $Quitar
 * @property string $FechaAlta
 * @property string $IpContacto
 */
class ContactoProfesional extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ContactoProfesional';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Empresa', 'CIF', 'TipoDistribuidor', 'Nombre', 'Apellidos', 'Direccion', 'Localidad', 'Provincia', 'CodigoPostal', 'fkNTC_Pais', 'PrefijoTelefono', 'Telefono', 'Email', 'Web', 'FechaAlta', 'IpContacto'], 'required'],
            [['fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Quitar'], 'integer'],
            [['FechaAlta'], 'safe'],
            [['Empresa', 'Direccion', 'Email'], 'string', 'max' => 150],
            [['CIF'], 'string', 'max' => 50],
            [['TipoDistribuidor', 'Nombre', 'Apellidos', 'Localidad', 'Provincia'], 'string', 'max' => 100],
            [['CodigoPostal'], 'string', 'max' => 10],
            [['PrefijoTelefono'], 'string', 'max' => 5],
            [['Telefono'], 'string', 'max' => 20],
            [['Web'], 'string', 'max' => 255],
            [['IpContacto'], 'string', 'max' => 15],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ContactoProfesional' => 'Id Ntc  Contacto Profesional',
            'Empresa' => 'Empresa',
            'CIF' => 'Cif',
            'TipoDistribuidor' => 'Tipo Distribuidor',
            'Nombre' => 'Nombre',
            'Apellidos' => 'Apellidos',
            'Direccion' => 'Direccion',
            'fkNTC_Localidad' => 'Fk Ntc  Localidad',
            'Localidad' => 'Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'Provincia' => 'Provincia',
            'CodigoPostal' => 'Codigo Postal',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'PrefijoTelefono' => 'Prefijo Telefono',
            'Telefono' => 'Telefono',
            'Email' => 'Email',
            'Web' => 'Web',
            'Quitar' => 'Quitar',
            'FechaAlta' => 'Fecha Alta',
            'IpContacto' => 'Ip Contacto',
        ];
    }
}
