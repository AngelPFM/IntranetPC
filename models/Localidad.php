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
    public function getAlmacens()
    {
        return $this->hasMany(Almacen::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClientes0()
    {
        return $this->hasMany(Cliente::className(), ['fkNTC_LocalidadFactura' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionEmpresas()
    {
        return $this->hasMany(DireccionEmpresa::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionEnvios()
    {
        return $this->hasMany(DireccionEnvio::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['idNTC_Provincia' => 'fkNTC_Provincia']);
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
        return $this->hasMany(PuntosVenta::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiendas()
    {
        return $this->hasMany(Tienda::className(), ['fkNTC_Localidad' => 'idNTC_Localidad']);
    }
}
