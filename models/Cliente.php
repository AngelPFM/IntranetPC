<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Cliente".
 *
 * @property integer $idNTC_Cliente
 * @property string $NIF
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Direccion
 * @property integer $fkNTC_Localidad
 * @property string $Localidad
 * @property integer $fkNTC_Provincia
 * @property string $Provincia
 * @property string $CodigoPostal
 * @property integer $fkNTC_Pais
 * @property string $PrefijoTelefono1
 * @property string $Telefono1
 * @property string $PrefijoTelefono2
 * @property string $Telefono2
 * @property integer $Sexo
 * @property integer $fkNTC_FacturaACliente
 * @property string $Contacto
 * @property string $Email
 * @property string $Fax
 * @property integer $fkNTC_TipoIvaNegocio
 * @property integer $PrecioIvaIncluido
 * @property integer $fkNTC_GrupoPrecioCliente
 * @property integer $fkNTC_GrupoDescuentoCliente
 * @property integer $fkNTC_Divisa
 * @property string $fkNTC_Idioma
 * @property string $CifFactura
 * @property string $NombreFactura
 * @property string $DireccionFactura
 * @property string $CodPostalFactura
 * @property string $LocalidadFactura
 * @property integer $fkNTC_ProvinciaFactura
 * @property string $ProvinciaFactura
 * @property integer $fkNTC_PaisFactura
 * @property string $PaisFactura
 * @property integer $fkNTC_LocalidadFactura
 * @property integer $fkNTC_ConfiguracionIva
 * @property integer $Quitar
 * @property string $FechaRegistro
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas0
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas0
 * @property NTCCabDevolucionVenta[] $nTCCabDevolucionVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas0
 * @property NTCCarrito[] $nTCCarritos
 * @property NTCLocalidad $fkNTCLocalidad
 * @property NTCProvincia $fkNTCProvinciaFactura
 * @property NTCPais $fkNTCPaisFactura
 * @property NTCLocalidad $fkNTCLocalidadFactura
 * @property NTCConfiguracionIva $fkNTCConfiguracionIva
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCPais $fkNTCPais
 * @property NTCIdioma $fkNTCIdioma
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 * @property NTCDireccionEnvio[] $nTCDireccionEnvios
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas0
 * @property NTCLoginAs[] $nTCLoginAs
 * @property NTCOperacion[] $nTCOperacions
 * @property NTCSuscripcion[] $nTCSuscripcions
 */
class Cliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Cliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Apellidos', 'Contacto', 'Email'], 'required'],
            [['fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Sexo', 'fkNTC_FacturaACliente', 'fkNTC_TipoIvaNegocio', 'PrecioIvaIncluido', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDescuentoCliente', 'fkNTC_Divisa', 'fkNTC_ProvinciaFactura', 'fkNTC_PaisFactura', 'fkNTC_LocalidadFactura', 'fkNTC_ConfiguracionIva', 'Quitar'], 'integer'],
            [['FechaRegistro'], 'safe'],
            [['NIF', 'CifFactura'], 'string', 'max' => 50],
            [['Nombre', 'Apellidos', 'Localidad', 'Provincia', 'Contacto', 'Email', 'NombreFactura', 'LocalidadFactura', 'ProvinciaFactura', 'PaisFactura'], 'string', 'max' => 100],
            [['Direccion', 'DireccionFactura'], 'string', 'max' => 150],
            [['CodigoPostal', 'CodPostalFactura'], 'string', 'max' => 10],
            [['PrefijoTelefono1', 'PrefijoTelefono2'], 'string', 'max' => 5],
            [['Telefono1', 'Telefono2', 'Fax'], 'string', 'max' => 20],
            [['fkNTC_Idioma'], 'string', 'max' => 2],
            [['fkNTC_Localidad'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLocalidad::className(), 'targetAttribute' => ['fkNTC_Localidad' => 'idNTC_Localidad']],
            [['fkNTC_ProvinciaFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_ProvinciaFactura' => 'idNTC_Provincia']],
            [['fkNTC_PaisFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_PaisFactura' => 'idNTC_Pais']],
            [['fkNTC_LocalidadFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLocalidad::className(), 'targetAttribute' => ['fkNTC_LocalidadFactura' => 'idNTC_Localidad']],
            [['fkNTC_ConfiguracionIva'], 'exist', 'skipOnError' => true, 'targetClass' => NTCConfiguracionIva::className(), 'targetAttribute' => ['fkNTC_ConfiguracionIva' => 'idNTC_ConfiguracionIva']],
            [['fkNTC_Provincia'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_Provincia' => 'idNTC_Provincia']],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
            [['fkNTC_Idioma'], 'exist', 'skipOnError' => true, 'targetClass' => NTCIdioma::className(), 'targetAttribute' => ['fkNTC_Idioma' => 'idNTC_Idioma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Cliente' => 'Id Ntc  Cliente',
            'NIF' => 'Nif',
            'Nombre' => 'Nombre',
            'Apellidos' => 'Apellidos',
            'Direccion' => 'Direccion',
            'fkNTC_Localidad' => 'Fk Ntc  Localidad',
            'Localidad' => 'Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'Provincia' => 'Provincia',
            'CodigoPostal' => 'Codigo Postal',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'PrefijoTelefono1' => 'Prefijo Telefono1',
            'Telefono1' => 'Telefono1',
            'PrefijoTelefono2' => 'Prefijo Telefono2',
            'Telefono2' => 'Telefono2',
            'Sexo' => 'Sexo',
            'fkNTC_FacturaACliente' => 'Fk Ntc  Factura Acliente',
            'Contacto' => 'Contacto',
            'Email' => 'Email',
            'Fax' => 'Fax',
            'fkNTC_TipoIvaNegocio' => 'Fk Ntc  Tipo Iva Negocio',
            'PrecioIvaIncluido' => 'Precio Iva Incluido',
            'fkNTC_GrupoPrecioCliente' => 'Fk Ntc  Grupo Precio Cliente',
            'fkNTC_GrupoDescuentoCliente' => 'Fk Ntc  Grupo Descuento Cliente',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'fkNTC_Idioma' => 'Fk Ntc  Idioma',
            'CifFactura' => 'Cif Factura',
            'NombreFactura' => 'Nombre Factura',
            'DireccionFactura' => 'Direccion Factura',
            'CodPostalFactura' => 'Cod Postal Factura',
            'LocalidadFactura' => 'Localidad Factura',
            'fkNTC_ProvinciaFactura' => 'Fk Ntc  Provincia Factura',
            'ProvinciaFactura' => 'Provincia Factura',
            'fkNTC_PaisFactura' => 'Fk Ntc  Pais Factura',
            'PaisFactura' => 'Pais Factura',
            'fkNTC_LocalidadFactura' => 'Fk Ntc  Localidad Factura',
            'fkNTC_ConfiguracionIva' => 'Fk Ntc  Configuracion Iva',
            'Quitar' => 'Quitar',
            'FechaRegistro' => 'Fecha Registro',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAbonoVentas()
    {
        return $this->hasMany(NTCCabAbonoVenta::className(), ['fkNTC_ClienteVenta' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAbonoVentas0()
    {
        return $this->hasMany(NTCCabAbonoVenta::className(), ['fkNTC_ClienteFactura' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAlbaranVentas()
    {
        return $this->hasMany(NTCCabAlbaranVenta::className(), ['fkNTC_ClienteFactura' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAlbaranVentas0()
    {
        return $this->hasMany(NTCCabAlbaranVenta::className(), ['fkNTC_ClienteVenta' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabDevolucionVentas()
    {
        return $this->hasMany(NTCCabDevolucionVenta::className(), ['fkNTC_ClienteVenta' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabFacturaVentas()
    {
        return $this->hasMany(NTCCabFacturaVenta::className(), ['fkNTC_ClienteVenta' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabFacturaVentas0()
    {
        return $this->hasMany(NTCCabFacturaVenta::className(), ['fkNTC_ClienteFactura' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCarritos()
    {
        return $this->hasMany(NTCCarrito::className(), ['fkNTC_Cliente' => 'idNTC_Cliente']);
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
    public function getFkNTCProvinciaFactura()
    {
        return $this->hasOne(NTCProvincia::className(), ['idNTC_Provincia' => 'fkNTC_ProvinciaFactura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCPaisFactura()
    {
        return $this->hasOne(NTCPais::className(), ['idNTC_Pais' => 'fkNTC_PaisFactura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLocalidadFactura()
    {
        return $this->hasOne(NTCLocalidad::className(), ['idNTC_Localidad' => 'fkNTC_LocalidadFactura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCConfiguracionIva()
    {
        return $this->hasOne(NTCConfiguracionIva::className(), ['idNTC_ConfiguracionIva' => 'fkNTC_ConfiguracionIva']);
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
    public function getFkNTCIdioma()
    {
        return $this->hasOne(NTCIdioma::className(), ['idNTC_Idioma' => 'fkNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDescuentos()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['fkNTC_Cliente' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDireccionEnvios()
    {
        return $this->hasMany(NTCDireccionEnvio::className(), ['fkNTC_Cliente' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_ClienteVenta' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas0()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_ClienteFactura' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLoginAs()
    {
        return $this->hasMany(NTCLoginAs::className(), ['fkNTC_Cliente' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCOperacions()
    {
        return $this->hasMany(NTCOperacion::className(), ['fkNTC_Cliente' => 'idNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCSuscripcions()
    {
        return $this->hasMany(NTCSuscripcion::className(), ['fkNTC_Cliente' => 'idNTC_Cliente']);
    }
}
