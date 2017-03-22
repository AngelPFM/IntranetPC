<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Almacen".
 *
 * @property integer $idNTC_Almacen
 * @property string $Nombre
 * @property string $Titulo
 * @property string $Direccion
 * @property integer $fkNTC_Localidad
 * @property integer $fkNTC_Provincia
 * @property string $CodigoPostal
 * @property integer $fkNTC_Pais
 * @property string $Contacto
 * @property integer $Transito
 * @property string $Telefono
 * @property string $Fax
 * @property string $Email
 * @property integer $Quitar
 * @property integer $Activa
 * @property integer $fkNTC_UsuarioWeb
 *
 * @property NTCUsuarioWeb $fkNTCUsuarioWeb
 * @property NTCLocalidad $fkNTCLocalidad
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCPais $fkNTCPais
 * @property NTCArticulo[] $nTCArticulos
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabDevolucionVenta[] $nTCCabDevolucionVentas
 * @property NTCDiarioProducto[] $nTCDiarioProductos
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCLineaAlbaranVenta[] $nTCLineaAlbaranVentas
 * @property NTCLineaDevolucionVenta[] $nTCLineaDevolucionVentas
 * @property NTCLineaVenta[] $nTCLineaVentas
 * @property NTCMarcaAlmacen[] $nTCMarcaAlmacens
 * @property NTCMovProducto[] $nTCMovProductos
 * @property NTCTienda[] $nTCTiendas
 * @property NTCTiendaAlmacen[] $nTCTiendaAlmacens
 */
class NTCAlmacen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Almacen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Titulo', 'fkNTC_Localidad', 'fkNTC_Provincia'], 'required'],
            [['fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Transito', 'Quitar', 'Activa', 'fkNTC_UsuarioWeb'], 'integer'],
            [['Nombre', 'Titulo'], 'string', 'max' => 80],
            [['Direccion', 'Email'], 'string', 'max' => 150],
            [['CodigoPostal'], 'string', 'max' => 10],
            [['Contacto'], 'string', 'max' => 100],
            [['Telefono', 'Fax'], 'string', 'max' => 15],
            [['fkNTC_UsuarioWeb'], 'exist', 'skipOnError' => true, 'targetClass' => NTCUsuarioWeb::className(), 'targetAttribute' => ['fkNTC_UsuarioWeb' => 'idNTC_UsuarioWeb']],
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
            'idNTC_Almacen' => 'Id Ntc  Almacen',
            'Nombre' => 'Nombre',
            'Titulo' => 'Titulo',
            'Direccion' => 'Direccion',
            'fkNTC_Localidad' => 'Fk Ntc  Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'CodigoPostal' => 'Codigo Postal',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Contacto' => 'Contacto',
            'Transito' => 'Transito',
            'Telefono' => 'Telefono',
            'Fax' => 'Fax',
            'Email' => 'Email',
            'Quitar' => 'Quitar',
            'Activa' => 'Activa',
            'fkNTC_UsuarioWeb' => 'Fk Ntc  Usuario Web',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCUsuarioWeb()
    {
        return $this->hasOne(NTCUsuarioWeb::className(), ['idNTC_UsuarioWeb' => 'fkNTC_UsuarioWeb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLocalidad()
    {
        return $this->hasOne(NTCLocalidad::className(), ['idNTC_Localidad' => 'fkNTC_Localidad']);
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
    public function getNTCArticulos()
    {
        return $this->hasMany(NTCArticulo::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAlbaranVentas()
    {
        return $this->hasMany(NTCCabAlbaranVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabDevolucionVentas()
    {
        return $this->hasMany(NTCCabDevolucionVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDiarioProductos()
    {
        return $this->hasMany(NTCDiarioProducto::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaAlbaranVentas()
    {
        return $this->hasMany(NTCLineaAlbaranVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaDevolucionVentas()
    {
        return $this->hasMany(NTCLineaDevolucionVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaVentas()
    {
        return $this->hasMany(NTCLineaVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMarcaAlmacens()
    {
        return $this->hasMany(NTCMarcaAlmacen::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMovProductos()
    {
        return $this->hasMany(NTCMovProducto::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTiendas()
    {
        return $this->hasMany(NTCTienda::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTiendaAlmacens()
    {
        return $this->hasMany(NTCTiendaAlmacen::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }
}