<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Localidad".
 *
 * @property integer $idNTC_Localidad
 * @property integer $fkNTC_Provincia
 * @property integer $fkNTC_Pais
 * @property string $Nombre
 * @property string $CoordY
 * @property string $CoordX
 * @property integer $Quitar
 *
 * @property NTCAlmacen[] $nTCAlmacens
 * @property NTCCliente[] $nTCClientes
 * @property NTCCliente[] $nTCClientes0
 * @property NTCDireccionEmpresa[] $nTCDireccionEmpresas
 * @property NTCDireccionEnvio[] $nTCDireccionEnvios
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCPais $fkNTCPais
 * @property NTCPuntosVenta[] $nTCPuntosVentas
 * @property NTCTienda[] $nTCTiendas
 */
class Localidad extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Localidad';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Provincia', 'fkNTC_Pais', 'Quitar'], 'integer'],
            [['fkNTC_Pais'], 'required'],
            [['CoordY', 'CoordX'], 'number'],
            [['Nombre'], 'string', 'max' => 255],
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
            'idNTC_Localidad' => 'Id Ntc  Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Nombre' => 'Nombre',
            'CoordY' => 'Coord Y',
            'CoordX' => 'Coord X',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCAlmacens()
    {
        return $this->hasMany(NTCAlmacen::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes0()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_LocalidadFactura' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEmpresas()
    {
        return $this->hasMany(NTCDireccionEmpresa::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEnvios()
    {
        return $this->hasMany(NTCDireccionEnvio::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCPuntosVentas()
    {
        return $this->hasMany(NTCPuntosVenta::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTiendas()
    {
        return $this->hasMany(NTCTienda::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }
}
