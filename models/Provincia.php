<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Provincia".
 *
 * @property integer $idNTC_Provincia
 * @property integer $fkNTC_Pais
 * @property string $Nombre
 * @property integer $Quitar
 * @property string $Codigo
 * @property integer $fkNTC_TipoIvaNegocio
 *
 * @property NTCAlmacen[] $nTCAlmacens
 * @property NTCCliente[] $nTCClientes
 * @property NTCCliente[] $nTCClientes0
 * @property NTCDireccionEmpresa[] $nTCDireccionEmpresas
 * @property NTCDireccionEnvio[] $nTCDireccionEnvios
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCLocalidad[] $nTCLocalidads
 * @property NTCModuloEnvioProvincia[] $nTCModuloEnvioProvincias
 * @property NTCPais $fkNTCPais
 * @property NTCPuntosVenta[] $nTCPuntosVentas
 * @property NTCTarifaEnvio[] $nTCTarifaEnvios
 * @property NTCTienda[] $nTCTiendas
 */
class NTCProvincia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Provincia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Pais', 'Nombre'], 'required'],
            [['fkNTC_Pais', 'Quitar', 'fkNTC_TipoIvaNegocio'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['Codigo'], 'string', 'max' => 2],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Provincia' => 'Id Ntc  Provincia',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
            'Codigo' => 'Codigo',
            'fkNTC_TipoIvaNegocio' => 'Fk Ntc  Tipo Iva Negocio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCAlmacens()
    {
        return $this->hasMany(NTCAlmacen::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_ProvinciaFactura' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes0()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEmpresas()
    {
        return $this->hasMany(NTCDireccionEmpresa::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEnvios()
    {
        return $this->hasMany(NTCDireccionEnvio::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_ProvinciaFactura' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLocalidads()
    {
        return $this->hasMany(NTCLocalidad::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCModuloEnvioProvincias()
    {
        return $this->hasMany(NTCModuloEnvioProvincia::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCPais()
    {
        return $this->hasOne(NTCPais::className(), ['idNTC_Pais' => 'fkNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCPuntosVentas()
    {
        return $this->hasMany(NTCPuntosVenta::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTarifaEnvios()
    {
        return $this->hasMany(NTCTarifaEnvio::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTiendas()
    {
        return $this->hasMany(NTCTienda::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }
}
