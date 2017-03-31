<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_DireccionEnvio".
 *
 * @property integer $idNTC_DireccionEnvio
 * @property integer $fkNTC_Cliente
 * @property string $Alias
 * @property string $Destinatario
 * @property string $Direccion
 * @property integer $fkNTC_Localidad
 * @property integer $fkNTC_Provincia
 * @property string $CodigoPostal
 * @property integer $fkNTC_Pais
 * @property string $Localidad
 * @property string $Provincia
 * @property string $PrefijoTelefono
 * @property string $Telefono
 * @property integer $Quitar
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCCliente $fkNTCCliente
 * @property NTCLocalidad $fkNTCLocalidad
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCPais $fkNTCPais
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 */
class DireccionEnvio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_DireccionEnvio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Cliente', 'Alias', 'fkNTC_Pais'], 'required'],
            [['fkNTC_Cliente', 'fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Quitar'], 'integer'],
            [['Alias', 'Destinatario'], 'string', 'max' => 80],
            [['Direccion'], 'string', 'max' => 150],
            [['CodigoPostal'], 'string', 'max' => 10],
            [['Localidad', 'Provincia'], 'string', 'max' => 100],
            [['PrefijoTelefono'], 'string', 'max' => 5],
            [['Telefono'], 'string', 'max' => 20],
            [['fkNTC_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_Cliente' => 'idNTC_Cliente']],
            [['fkNTC_Localidad'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLocalidad::className(), 'targetAttribute' => ['fkNTC_Localidad' => 'idNTC_Localidad']],
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
            'idNTC_DireccionEnvio' => 'Id Ntc  Direccion Envio',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'Alias' => 'Alias',
            'Destinatario' => 'Destinatario',
            'Direccion' => 'Direccion',
            'fkNTC_Localidad' => 'Fk Ntc  Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'CodigoPostal' => 'Codigo Postal',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Localidad' => 'Localidad',
            'Provincia' => 'Provincia',
            'PrefijoTelefono' => 'Prefijo Telefono',
            'Telefono' => 'Telefono',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_DireccionFacturacion' => 'idNTC_DireccionEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_DireccionEnvio' => 'idNTC_DireccionEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_DireccionFacturacion' => 'idNTC_DireccionEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['idNTC_Cliente' => 'fkNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLocalidad()
    {
        return $this->hasOne(Localidad::className(), ['idNTC_Localidad' => 'fkNTC_Localidad']);
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
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_DireccionEnvio' => 'idNTC_DireccionEnvio']);
    }
}
