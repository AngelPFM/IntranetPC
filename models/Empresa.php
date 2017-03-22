<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Empresa".
 *
 * @property integer $idNTC_Empresa
 * @property string $Nombre
 * @property string $Dominio
 * @property string $Descripcion
 * @property string $Slogan
 * @property string $HorarioContacto
 * @property string $Latitud
 * @property string $Longitud
 * @property string $Direccion1
 * @property string $DireccionDos
 * @property string $CP
 * @property string $Localizacion
 * @property string $Email
 * @property string $Emaillook
 * @property string $Titulo
 * @property string $BajoTitulo
 * @property string $NumerosDeCuenta
 * @property string $metaRobots
 * @property string $metaKeywords
 * @property string $metaDescription
 * @property string $metaTitle
 * @property string $metaContent
 * @property string $Telefono
 * @property string $Fax
 * @property integer $Agrupacion
 *
 * @property NTCConfiguracion $nTCConfiguracion
 * @property NTCConfiguracionIntranet $nTCConfiguracionIntranet
 * @property NTCDireccionEmpresa[] $nTCDireccionEmpresas
 * @property NTCFichero[] $nTCFicheroes
 * @property NTCRedSocial[] $nTCRedSocials
 */
class NTCEmpresa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Empresa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Dominio', 'Email', 'Emaillook', 'Titulo', 'BajoTitulo', 'NumerosDeCuenta', 'metaRobots', 'metaKeywords', 'metaDescription', 'metaTitle', 'metaContent', 'Telefono'], 'required'],
            [['NumerosDeCuenta'], 'string'],
            [['Agrupacion'], 'integer'],
            [['Nombre'], 'string', 'max' => 80],
            [['Dominio'], 'string', 'max' => 100],
            [['Descripcion', 'Email', 'Emaillook', 'Titulo', 'BajoTitulo', 'metaRobots', 'metaKeywords', 'metaDescription', 'metaTitle', 'metaContent'], 'string', 'max' => 255],
            [['Slogan', 'HorarioContacto', 'Latitud', 'Longitud', 'Direccion1', 'DireccionDos', 'Localizacion'], 'string', 'max' => 150],
            [['CP'], 'string', 'max' => 50],
            [['Telefono', 'Fax'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Empresa' => 'Id Ntc  Empresa',
            'Nombre' => 'Nombre',
            'Dominio' => 'Dominio',
            'Descripcion' => 'Descripcion',
            'Slogan' => 'Slogan',
            'HorarioContacto' => 'Horario Contacto',
            'Latitud' => 'Latitud',
            'Longitud' => 'Longitud',
            'Direccion1' => 'Direccion1',
            'DireccionDos' => 'Direccion Dos',
            'CP' => 'Cp',
            'Localizacion' => 'Localizacion',
            'Email' => 'Email',
            'Emaillook' => 'Emaillook',
            'Titulo' => 'Titulo',
            'BajoTitulo' => 'Bajo Titulo',
            'NumerosDeCuenta' => 'Numeros De Cuenta',
            'metaRobots' => 'Meta Robots',
            'metaKeywords' => 'Meta Keywords',
            'metaDescription' => 'Meta Description',
            'metaTitle' => 'Meta Title',
            'metaContent' => 'Meta Content',
            'Telefono' => 'Telefono',
            'Fax' => 'Fax',
            'Agrupacion' => 'Agrupacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracion()
    {
        return $this->hasOne(NTCConfiguracion::className(), ['fkNTC_Empresa' => 'idNTC_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracionIntranet()
    {
        return $this->hasOne(NTCConfiguracionIntranet::className(), ['fkNTC_Empresa' => 'idNTC_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEmpresas()
    {
        return $this->hasMany(NTCDireccionEmpresa::className(), ['fkNTC_Empresa' => 'idNTC_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCFicheroes()
    {
        return $this->hasMany(NTCFichero::className(), ['fkNTC_Empresa' => 'idNTC_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCRedSocials()
    {
        return $this->hasMany(NTCRedSocial::className(), ['fkNTC_Empresa' => 'idNTC_Empresa']);
    }
}
