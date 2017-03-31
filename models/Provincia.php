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
class Provincia extends \yii\db\ActiveRecord
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
    public function getAlmacens()
    {
        return $this->hasMany(Almacen::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['fkNTC_ProvinciaFactura' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes0()
    {
        return $this->hasMany(Cliente::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionEmpresas()
    {
        return $this->hasMany(DireccionEmpresa::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionEnvios()
    {
        return $this->hasMany(DireccionEnvio::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_ProvinciaFactura' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidads()
    {
        return $this->hasMany(Localidad::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuloEnvioProvincias()
    {
        return $this->hasMany(ModuloEnvioProvincia::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Pais::className(), ['idNTC_Pais' => 'fkNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPuntosVentas()
    {
        return $this->hasMany(PuntosVenta::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifaEnvios()
    {
        return $this->hasMany(TarifaEnvio::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiendas()
    {
        return $this->hasMany( Tienda::className(), ['fkNTC_Provincia' => 'idNTC_Provincia']);
    }
}
