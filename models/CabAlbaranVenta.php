<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CabAlbaranVenta".
 *
 * @property integer $idNTC_CabAlbaranVenta
 * @property string $Numero
 * @property string $Fecha
 * @property integer $fkNTC_NumSerie
 * @property integer $fkNTC_DocumentoVenta
 * @property integer $fkNTC_ClienteVenta
 * @property string $NombreCliente
 * @property string $DireccionEnvio
 * @property string $CodPostalEnvio
 * @property string $LocalidadEnvio
 * @property string $ProvinciaEnvio
 * @property string $PaisEnvio
 * @property integer $AlbaranValorado
 * @property integer $fkNTC_DireccionEnvio
 * @property string $EnvioAtencionA
 * @property integer $fkNTC_Almacen
 * @property integer $fkNTC_ProveedorEnvio
 * @property integer $fkNTC_MetodoEnvio
 * @property string $FechaEnvio
 * @property integer $fkNTC_Divisa
 * @property string $FechaRegistro
 * @property string $Comentario
 * @property integer $FechaEntrega
 * @property integer $ConfirmadaRecepcion
 * @property double $Importe
 * @property double $ImporteIvaIncl
 * @property double $ImporteEnvio
 * @property string $Tracking
 * @property integer $Enviado
 * @property integer $fkNTC_GrupoPrecioCliente
 * @property integer $fkNTC_GrupoDtoCliente
 * @property integer $fkNTC_ClienteFactura
 * @property string $CifFactura
 * @property string $NombreFactura
 * @property string $DireccionFactura
 * @property string $CodPostalFactura
 * @property string $LocalidadFactura
 * @property string $ProvinciaFactura
 * @property string $PaisFactura
 *
 * @property NTCNumSerie $fkNTCNumSerie
 * @property NTCDocumentoVenta $fkNTCDocumentoVenta
 * @property NTCCliente $fkNTCClienteFactura
 * @property NTCCliente $fkNTCClienteVenta
 * @property NTCDireccionEnvio $fkNTCDireccionEnvio
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCProveedorEnvio $fkNTCProveedorEnvio
 * @property NTCMetodoEnvio $fkNTCMetodoEnvio
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCGrupoPrecioCliente $fkNTCGrupoPrecioCliente
 * @property NTCGrupoDescuentoCliente $fkNTCGrupoDtoCliente
 * @property NTCLineaAlbaranVenta[] $nTCLineaAlbaranVentas
 */
class CabAlbaranVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CabAlbaranVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Numero', 'Fecha', 'fkNTC_NumSerie', 'fkNTC_ClienteVenta', 'NombreCliente', 'DireccionEnvio', 'CodPostalEnvio', 'LocalidadEnvio', 'ProvinciaEnvio', 'PaisEnvio', 'fkNTC_DireccionEnvio', 'EnvioAtencionA', 'fkNTC_Almacen', 'fkNTC_ProveedorEnvio', 'fkNTC_MetodoEnvio', 'fkNTC_Divisa'], 'required'],
            [['Fecha', 'FechaEnvio', 'FechaRegistro'], 'safe'],
            [['fkNTC_NumSerie', 'fkNTC_DocumentoVenta', 'fkNTC_ClienteVenta', 'AlbaranValorado', 'fkNTC_DireccionEnvio', 'fkNTC_Almacen', 'fkNTC_ProveedorEnvio', 'fkNTC_MetodoEnvio', 'fkNTC_Divisa', 'FechaEntrega', 'ConfirmadaRecepcion', 'Enviado', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDtoCliente', 'fkNTC_ClienteFactura'], 'integer'],
            [['Comentario'], 'string'],
            [['Importe', 'ImporteIvaIncl', 'ImporteEnvio'], 'number'],
            [['Numero'], 'string', 'max' => 20],
            [['NombreCliente', 'EnvioAtencionA', 'Tracking', 'NombreFactura', 'LocalidadFactura', 'ProvinciaFactura', 'PaisFactura'], 'string', 'max' => 100],
            [['DireccionEnvio', 'DireccionFactura'], 'string', 'max' => 150],
            [['CodPostalEnvio'], 'string', 'max' => 5],
            [['LocalidadEnvio', 'ProvinciaEnvio', 'PaisEnvio'], 'string', 'max' => 80],
            [['CifFactura'], 'string', 'max' => 50],
            [['CodPostalFactura'], 'string', 'max' => 10],
            [['fkNTC_NumSerie'], 'exist', 'skipOnError' => true, 'targetClass' => NTCNumSerie::className(), 'targetAttribute' => ['fkNTC_NumSerie' => 'idNTC_NumSerie']],
            [['fkNTC_DocumentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDocumentoVenta::className(), 'targetAttribute' => ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']],
            [['fkNTC_ClienteFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_ClienteFactura' => 'idNTC_Cliente']],
            [['fkNTC_ClienteVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_ClienteVenta' => 'idNTC_Cliente']],
            [['fkNTC_DireccionEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDireccionEnvio::className(), 'targetAttribute' => ['fkNTC_DireccionEnvio' => 'idNTC_DireccionEnvio']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_ProveedorEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProveedorEnvio::className(), 'targetAttribute' => ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']],
            [['fkNTC_MetodoEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCMetodoEnvio::className(), 'targetAttribute' => ['fkNTC_MetodoEnvio' => 'idNTC_MetodoEnvio']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
            [['fkNTC_GrupoPrecioCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoPrecioCliente::className(), 'targetAttribute' => ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']],
            [['fkNTC_GrupoDtoCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoDescuentoCliente::className(), 'targetAttribute' => ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_CabAlbaranVenta' => 'Id Ntc  Cab Albaran Venta',
            'Numero' => 'Numero',
            'Fecha' => 'Fecha',
            'fkNTC_NumSerie' => 'Fk Ntc  Num Serie',
            'fkNTC_DocumentoVenta' => 'Fk Ntc  Documento Venta',
            'fkNTC_ClienteVenta' => 'Fk Ntc  Cliente Venta',
            'NombreCliente' => 'Nombre Cliente',
            'DireccionEnvio' => 'Direccion Envio',
            'CodPostalEnvio' => 'Cod Postal Envio',
            'LocalidadEnvio' => 'Localidad Envio',
            'ProvinciaEnvio' => 'Provincia Envio',
            'PaisEnvio' => 'Pais Envio',
            'AlbaranValorado' => 'Albaran Valorado',
            'fkNTC_DireccionEnvio' => 'Fk Ntc  Direccion Envio',
            'EnvioAtencionA' => 'Envio Atencion A',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'fkNTC_ProveedorEnvio' => 'Fk Ntc  Proveedor Envio',
            'fkNTC_MetodoEnvio' => 'Fk Ntc  Metodo Envio',
            'FechaEnvio' => 'Fecha Envio',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'FechaRegistro' => 'Fecha Registro',
            'Comentario' => 'Comentario',
            'FechaEntrega' => 'Fecha Entrega',
            'ConfirmadaRecepcion' => 'Confirmada Recepcion',
            'Importe' => 'Importe',
            'ImporteIvaIncl' => 'Importe Iva Incl',
            'ImporteEnvio' => 'Importe Envio',
            'Tracking' => 'Tracking',
            'Enviado' => 'Enviado',
            'fkNTC_GrupoPrecioCliente' => 'Fk Ntc  Grupo Precio Cliente',
            'fkNTC_GrupoDtoCliente' => 'Fk Ntc  Grupo Dto Cliente',
            'fkNTC_ClienteFactura' => 'Fk Ntc  Cliente Factura',
            'CifFactura' => 'Cif Factura',
            'NombreFactura' => 'Nombre Factura',
            'DireccionFactura' => 'Direccion Factura',
            'CodPostalFactura' => 'Cod Postal Factura',
            'LocalidadFactura' => 'Localidad Factura',
            'ProvinciaFactura' => 'Provincia Factura',
            'PaisFactura' => 'Pais Factura',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCNumSerie()
    {
        return $this->hasOne(NTCNumSerie::className(), ['idNTC_NumSerie' => 'fkNTC_NumSerie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDocumentoVenta()
    {
        return $this->hasOne(NTCDocumentoVenta::className(), ['idNTC_DocumentoVenta' => 'fkNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCClienteFactura()
    {
        return $this->hasOne(NTCCliente::className(), ['idNTC_Cliente' => 'fkNTC_ClienteFactura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCClienteVenta()
    {
        return $this->hasOne(NTCCliente::className(), ['idNTC_Cliente' => 'fkNTC_ClienteVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDireccionEnvio()
    {
        return $this->hasOne(NTCDireccionEnvio::className(), ['idNTC_DireccionEnvio' => 'fkNTC_DireccionEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCAlmacen()
    {
        return $this->hasOne(NTCAlmacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
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
    public function getFkNTCMetodoEnvio()
    {
        return $this->hasOne(NTCMetodoEnvio::className(), ['idNTC_MetodoEnvio' => 'fkNTC_MetodoEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCGrupoPrecioCliente()
    {
        return $this->hasOne(NTCGrupoPrecioCliente::className(), ['idNTC_GrupoPrecioCliente' => 'fkNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCGrupoDtoCliente()
    {
        return $this->hasOne(NTCGrupoDescuentoCliente::className(), ['idNTC_GrupoDescuentoCliente' => 'fkNTC_GrupoDtoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaAlbaranVentas()
    {
        return $this->hasMany(NTCLineaAlbaranVenta::className(), ['fkNTC_CabAlbaranVenta' => 'idNTC_CabAlbaranVenta']);
    }
}
