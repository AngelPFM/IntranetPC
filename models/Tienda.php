<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Tienda".
 *
 * @property integer $idNTC_Tienda
 * @property string $Nombre
 * @property string $Direccion
 * @property integer $fkNTC_Localidad
 * @property integer $fkNTC_Provincia
 * @property string $CodigoPostal
 * @property integer $fkNTC_Pais
 * @property integer $fkNTC_Almacen
 * @property string $Telefono
 * @property string $Fax
 * @property string $Email
 * @property string $Contacto
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCConfiguracion[] $nTCConfiguracions
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCOperacion[] $nTCOperacions
 * @property NTCLocalidad $fkNTCLocalidad
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCPais $fkNTCPais
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCTiendaAlmacen[] $nTCTiendaAlmacens
 */
class Tienda extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Tienda';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Direccion', 'fkNTC_Localidad', 'fkNTC_Provincia', 'CodigoPostal', 'fkNTC_Pais', 'fkNTC_Almacen', 'Telefono', 'Fax', 'Email', 'Contacto'], 'required'],
            [['fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'fkNTC_Almacen'], 'integer'],
            [['Nombre', 'Contacto'], 'string', 'max' => 80],
            [['Direccion', 'Email'], 'string', 'max' => 150],
            [['CodigoPostal'], 'string', 'max' => 5],
            [['Telefono', 'Fax'], 'string', 'max' => 10],
            [['fkNTC_Localidad'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLocalidad::className(), 'targetAttribute' => ['fkNTC_Localidad' => 'idNTC_Localidad']],
            [['fkNTC_Provincia'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_Provincia' => 'idNTC_Provincia']],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Tienda' => 'Id Ntc  Tienda',
            'Nombre' => 'Nombre',
            'Direccion' => 'Direccion',
            'fkNTC_Localidad' => 'Fk Ntc  Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'CodigoPostal' => 'Codigo Postal',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'Telefono' => 'Telefono',
            'Fax' => 'Fax',
            'Email' => 'Email',
            'Contacto' => 'Contacto',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_Tienda' => 'idNTC_Tienda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_Tienda' => 'idNTC_Tienda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::className(), ['fkNTC_TiendaPorDefecto' => 'idNTC_Tienda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_Tienda' => 'idNTC_Tienda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacions()
    {
        return $this->hasMany(Operacion::className(), ['fkNTC_Tienda' => 'idNTC_Tienda']);
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
    public function getAlmacen()
    {
        return $this->hasOne(Almacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTiendaAlmacens()
    {
        return $this->hasMany(TiendaAlmacen::className(), ['fkNTC_Tienda' => 'idNTC_Tienda']);
    }
}
