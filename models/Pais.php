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
    public function getAlmacens()
    {
        return $this->hasMany(Almacen::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['fkNTC_PaisFactura' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes0()
    {
        return $this->hasMany(Cliente::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::className(), ['fkNTC_PaisPorDefecto' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionEmpresas()
    {
        return $this->hasMany(DireccionEmpresa::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionEnvios()
    {
        return $this->hasMany(DireccionEnvio::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_PaisFactura' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getResponseConfigs()
    {
        return $this->hasMany(GetResponseConfig::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidads()
    {
        return $this->hasMany(Localidad::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdioma()
    {
        return $this->hasOne(Idioma::className(), ['idNTC_Idioma' => 'fkNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincias()
    {
        return $this->hasMany(Provincia::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuntosVentas()
    {
        return $this->hasMany(PuntosVenta::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScriptMarketings()
    {
        return $this->hasMany(ScriptMarketing::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifaEnvios()
    {
        return $this->hasMany(TarifaEnvio::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiendas()
    {
        return $this->hasMany(Tienda::className(), ['fkNTC_Pais' => 'idNTC_Pais']);
    }
    public function getTarifaVenta()
    {
        return $this->hasMany(TarifaVenta::className(), ['idNTC_Articulo' => 'fkNTC_Articulo']);
    }
}
