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
class Almacen extends \yii\db\ActiveRecord
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
    public function getUsuarioWeb()
    {
        return $this->hasOne(UsuarioWeb::className(), ['idNTC_UsuarioWeb' => 'fkNTC_UsuarioWeb']);
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
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabDevolucionVentas()
    {
        return $this->hasMany(CabDevolucionVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiarioProductos()
    {
        return $this->hasMany(DiarioProducto::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaAlbaranVentas()
    {
        return $this->hasMany(LineaAlbaranVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaDevolucionVentas()
    {
        return $this->hasMany(LineaDevolucionVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaVentas()
    {
        return $this->hasMany(LineaVenta::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcaAlmacens()
    {
        return $this->hasMany(MarcaAlmacen::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovProductos()
    {
        return $this->hasMany(MovProducto::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiendas()
    {
        return $this->hasMany(Tienda::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTiendaAlmacens()
    {
        return $this->hasMany(TiendaAlmacen::className(), ['fkNTC_Almacen' => 'idNTC_Almacen']);
    }
}
