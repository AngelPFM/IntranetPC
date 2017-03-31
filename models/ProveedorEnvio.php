<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ProveedorEnvio".
 *
 * @property integer $idNTC_ProveedorEnvio
 * @property string $Nombre
 * @property string $UrlProduccion
 * @property string $UrlPruebas
 * @property string $IdCliente
 * @property string $CuentaCliente
 * @property string $Key
 * @property string $Password
 * @property integer $SandBox
 * @property integer $Quitar
 *
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 * @property NTCMetodoEnvio[] $nTCMetodoEnvios
 * @property NTCTarifaEnvio[] $nTCTarifaEnvios
 */
class ProveedorEnvio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ProveedorEnvio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'UrlPruebas'], 'required'],
            [['SandBox', 'Quitar'], 'integer'],
            [['Nombre', 'Key', 'Password'], 'string', 'max' => 100],
            [['UrlProduccion', 'UrlPruebas'], 'string', 'max' => 255],
            [['IdCliente', 'CuentaCliente'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ProveedorEnvio' => 'Id Ntc  Proveedor Envio',
            'Nombre' => 'Nombre',
            'UrlProduccion' => 'Url Produccion',
            'UrlPruebas' => 'Url Pruebas',
            'IdCliente' => 'Id Cliente',
            'CuentaCliente' => 'Cuenta Cliente',
            'Key' => 'Key',
            'Password' => 'Password',
            'SandBox' => 'Sand Box',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetodoEnvios()
    {
        return $this->hasMany(MetodoEnvio::className(), ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifaEnvios()
    {
        return $this->hasMany(TarifaEnvio::className(), ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']);
    }
}
