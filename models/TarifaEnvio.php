<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TarifaEnvio".
 *
 * @property integer $idNTC_TarifaEnvio
 * @property integer $fkNTC_ProveedorEnvio
 * @property integer $fkNTC_MetodoEnvio
 * @property integer $fkNTC_Pais
 * @property integer $fkNTC_Provincia
 * @property integer $fkNTC_ZonaEnvio
 * @property integer $fkNTC_ModuloEnvio
 * @property string $CodigoPostal
 * @property integer $PesoDesde
 * @property double $PrecioEnvio
 * @property double $PrecioEnvioPlus
 * @property integer $fkNTC_Divisa
 * @property string $DiasEnvio
 * @property integer $Quitar
 *
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCZonaEnvio $fkNTCZonaEnvio
 * @property NTCModuloEnvio $fkNTCModuloEnvio
 * @property NTCProveedorEnvio $fkNTCProveedorEnvio
 * @property NTCPais $fkNTCPais
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCDivisa $fkNTCDivisa
 */
class TarifaEnvio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TarifaEnvio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_ProveedorEnvio', 'PesoDesde', 'PrecioEnvio', 'PrecioEnvioPlus', 'fkNTC_Divisa', 'DiasEnvio'], 'required'],
            [['fkNTC_ProveedorEnvio', 'fkNTC_MetodoEnvio', 'fkNTC_Pais', 'fkNTC_Provincia', 'fkNTC_ZonaEnvio', 'fkNTC_ModuloEnvio', 'PesoDesde', 'fkNTC_Divisa', 'Quitar'], 'integer'],
            [['PrecioEnvio', 'PrecioEnvioPlus'], 'number'],
            [['CodigoPostal', 'DiasEnvio'], 'string', 'max' => 20],
            [['fkNTC_ProveedorEnvio', 'fkNTC_Pais', 'fkNTC_Provincia', 'PesoDesde', 'PrecioEnvio', 'PrecioEnvioPlus'], 'unique', 'targetAttribute' => ['fkNTC_ProveedorEnvio', 'fkNTC_Pais', 'fkNTC_Provincia', 'PesoDesde', 'PrecioEnvio', 'PrecioEnvioPlus'], 'message' => 'The combination of Fk Ntc  Proveedor Envio, Fk Ntc  Pais, Fk Ntc  Provincia, Peso Desde, Precio Envio and Precio Envio Plus has already been taken.'],
            [['fkNTC_ZonaEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCZonaEnvio::className(), 'targetAttribute' => ['fkNTC_ZonaEnvio' => 'idNTC_Zona']],
            [['fkNTC_ModuloEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCModuloEnvio::className(), 'targetAttribute' => ['fkNTC_ModuloEnvio' => 'idNTC_ModuloEnvio']],
            [['fkNTC_ProveedorEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProveedorEnvio::className(), 'targetAttribute' => ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
            [['fkNTC_Provincia'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_Provincia' => 'idNTC_Provincia']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TarifaEnvio' => 'Id Ntc  Tarifa Envio',
            'fkNTC_ProveedorEnvio' => 'Fk Ntc  Proveedor Envio',
            'fkNTC_MetodoEnvio' => 'Fk Ntc  Metodo Envio',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'fkNTC_ZonaEnvio' => 'Fk Ntc  Zona Envio',
            'fkNTC_ModuloEnvio' => 'Fk Ntc  Modulo Envio',
            'CodigoPostal' => 'Codigo Postal',
            'PesoDesde' => 'Peso Desde',
            'PrecioEnvio' => 'Precio Envio',
            'PrecioEnvioPlus' => 'Precio Envio Plus',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'DiasEnvio' => 'Dias Envio',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_TarifaEnvio' => 'idNTC_TarifaEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCZonaEnvio()
    {
        return $this->hasOne(NTCZonaEnvio::className(), ['idNTC_Zona' => 'fkNTC_ZonaEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCModuloEnvio()
    {
        return $this->hasOne(NTCModuloEnvio::className(), ['idNTC_ModuloEnvio' => 'fkNTC_ModuloEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCProveedorEnvio()
    {
        return $this->hasOne(NTCProveedorEnvio::className(), ['idNTC_ProveedorEnvio' => 'fkNTC_ProveedorEnvio']);
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
    public function getFkNTCProvincia()
    {
        return $this->hasOne(NTCProvincia::className(), ['idNTC_Provincia' => 'fkNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa']);
    }
}
