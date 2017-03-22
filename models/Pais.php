<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Pais".
 *
 * @property integer $idNTC_Pais
 * @property string $Nombre
 * @property string $fkNTC_Idioma
 * @property string $Iso2
 * @property string $Iso3
 * @property string $Prefijo
 * @property string $ccTLD
 * @property integer $fkNTC_Divisa
 * @property integer $fkNTC_TipoIvaNegocio
 * @property integer $Quitar
 *
 * @property NTCAlmacen[] $nTCAlmacens
 * @property NTCCliente[] $nTCClientes
 * @property NTCCliente[] $nTCClientes0
 * @property NTCConfiguracion[] $nTCConfiguracions
 * @property NTCDireccionEmpresa[] $nTCDireccionEmpresas
 * @property NTCDireccionEnvio[] $nTCDireccionEnvios
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCGetResponseConfig[] $nTCGetResponseConfigs
 * @property NTCLocalidad[] $nTCLocalidads
 * @property NTCIdioma $fkNTCIdioma
 * @property NTCProvincia[] $nTCProvincias
 * @property NTCPuntosVenta[] $nTCPuntosVentas
 * @property NTCScriptMarketing[] $nTCScriptMarketings
 * @property NTCTarifaEnvio[] $nTCTarifaEnvios
 * @property NTCTienda[] $nTCTiendas
 */
class Pais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Pais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Iso2', 'Iso3', 'Prefijo', 'fkNTC_Divisa', 'fkNTC_TipoIvaNegocio'], 'required'],
            [['fkNTC_Divisa', 'fkNTC_TipoIvaNegocio', 'Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['fkNTC_Idioma', 'Iso2', 'ccTLD'], 'string', 'max' => 2],
            [['Iso3'], 'string', 'max' => 3],
            [['Prefijo'], 'string', 'max' => 10],
            [['fkNTC_Idioma'], 'exist', 'skipOnError' => true, 'targetClass' => NTCIdioma::className(), 'targetAttribute' => ['fkNTC_Idioma' => 'idNTC_Idioma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Pais' => 'Id Ntc  Pais',
            'Nombre' => 'Nombre',
            'fkNTC_Idioma' => 'Fk Ntc  Idioma',
            'Iso2' => 'Iso2',
            'Iso3' => 'Iso3',
            'Prefijo' => 'Prefijo',
            'ccTLD' => 'Cc Tld',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'fkNTC_TipoIvaNegocio' => 'Fk Ntc  Tipo Iva Negocio',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCAlmacens()
    {
        return $this->hasMany(NTCAlmacen::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_PaisFactura' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes0()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracions()
    {
        return $this->hasMany(NTCConfiguracion::className(), ['fkNTC_PaisPorDefecto' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEmpresas()
    {
        return $this->hasMany(NTCDireccionEmpresa::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEnvios()
    {
        return $this->hasMany(NTCDireccionEnvio::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_PaisFactura' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCGetResponseConfigs()
    {
        return $this->hasMany(NTCGetResponseConfig::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLocalidads()
    {
        return $this->hasMany(NTCLocalidad::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCIdioma()
    {
        return $this->hasOne(NTCIdioma::className(), ['idNTC_Idioma' => 'fkNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCProvincias()
    {
        return $this->hasMany(NTCProvincia::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCPuntosVentas()
    {
        return $this->hasMany(NTCPuntosVenta::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCScriptMarketings()
    {
        return $this->hasMany(NTCScriptMarketing::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTarifaEnvios()
    {
        return $this->hasMany(NTCTarifaEnvio::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTiendas()
    {
        return $this->hasMany(NTCTienda::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }
}
