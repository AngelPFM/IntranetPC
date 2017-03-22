<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_DocumentoVenta".
 *
 * @property integer $idNTC_DocumentoVenta
 * @property integer $fkNTC_TipoDocumentoVenta
 * @property string $Numero
 * @property string $Fecha
 * @property integer $fkNTC_NumSerie
 * @property integer $fkNTC_TipoEstadoPedido
 * @property integer $fkNTC_ClienteVenta
 * @property string $NombreCliente
 * @property string $DireccionCliente
 * @property string $CodPostalCliente
 * @property string $LocalidadCliente
 * @property string $ProvinciaCliente
 * @property string $PaisCliente
 * @property integer $fkNTC_ClienteFactura
 * @property string $CifFactura
 * @property string $NombreFactura
 * @property string $DireccionFactura
 * @property string $CodPostalFactura
 * @property string $LocalidadFactura
 * @property integer $fkNTC_ProvinciaFactura
 * @property string $ProvinciaFactura
 * @property integer $fkNTC_PaisFactura
 * @property string $PaisFactura
 * @property integer $fkNTC_Tienda
 * @property integer $fkNTC_TerminosPago
 * @property integer $fkNTC_FormaPago
 * @property string $FechaVencimiento
 * @property double $PorcentajeDtoPP
 * @property string $FechaDtoPP
 * @property integer $AlbaranValorado
 * @property integer $EnviarFactura
 * @property integer $Look
 * @property integer $fkNTC_DireccionEnvio
 * @property string $DireccionEnvio
 * @property string $CodPostalEnvio
 * @property string $LocalidadEnvio
 * @property string $ProvinciaEnvio
 * @property string $PaisEnvio
 * @property string $EnvioAtencionA
 * @property integer $fkNTC_Almacen
 * @property integer $fkNTC_TarifaEnvio
 * @property string $FechaEnvio
 * @property integer $fkNTC_Divisa
 * @property string $Peso
 * @property string $FechaRegistro
 * @property string $Comentario
 * @property integer $EnvioParcial
 * @property integer $EnviadoCompletamente
 * @property integer $FechaEntrega
 * @property integer $ConfirmadaRecepcion
 * @property double $Importe
 * @property double $ImporteIvaIncl
 * @property string $Tracking
 * @property integer $Enviado
 * @property integer $fkNTC_GrupoPrecioCliente
 * @property integer $fkNTC_GrupoDtoCliente
 * @property integer $fkNTC_Portes
 * @property string $SobreAgencia
 * @property string $TelefonoAgencia
 * @property string $NombreAgencia
 * @property double $ImportePortes
 * @property double $ImportePortesSI
 * @property double $IvaImporte
 * @property double $ImporteRecargo
 * @property double $LogAlm
 * @property double $ImporteSLA
 * @property double $Total
 * @property double $PcIVA
 * @property double $ImpCR
 * @property integer $ga
 *
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCCarrito[] $nTCCarritos
 * @property NTCCuponDocVenta[] $nTCCuponDocVentas
 * @property NTCCuponDescuento[] $fkNTCCuponDescuentos
 * @property NTCFormaPago $fkNTCFormaPago
 * @property NTCNumSerie $fkNTCNumSerie
 * @property NTCTerminoPago $fkNTCTerminosPago
 * @property NTCTipoDocumentoVenta $fkNTCTipoDocumentoVenta
 * @property NTCTipoEstadoPedido $fkNTCTipoEstadoPedido
 * @property NTCTarifaEnvio $fkNTCTarifaEnvio
 * @property NTCGrupoPrecioCliente $fkNTCGrupoPrecioCliente
 * @property NTCGrupoDescuentoCliente $fkNTCGrupoDtoCliente
 * @property NTCProvincia $fkNTCProvinciaFactura
 * @property NTCCliente $fkNTCClienteVenta
 * @property NTCPais $fkNTCPaisFactura
 * @property NTCCliente $fkNTCClienteFactura
 * @property NTCTienda $fkNTCTienda
 * @property NTCDireccionEnvio $fkNTCDireccionEnvio
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCLineaVenta[] $nTCLineaVentas
 * @property NTCOperacion[] $nTCOperacions
 */
class NTCDocumentoVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_DocumentoVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_TipoDocumentoVenta', 'Numero', 'Fecha', 'fkNTC_NumSerie', 'fkNTC_ClienteVenta', 'fkNTC_Tienda', 'fkNTC_TerminosPago', 'fkNTC_FormaPago', 'FechaVencimiento', 'EnvioAtencionA', 'fkNTC_Almacen', 'fkNTC_TarifaEnvio', 'fkNTC_Divisa', 'Peso'], 'required'],
            [['fkNTC_TipoDocumentoVenta', 'fkNTC_NumSerie', 'fkNTC_TipoEstadoPedido', 'fkNTC_ClienteVenta', 'fkNTC_ClienteFactura', 'fkNTC_ProvinciaFactura', 'fkNTC_PaisFactura', 'fkNTC_Tienda', 'fkNTC_TerminosPago', 'fkNTC_FormaPago', 'AlbaranValorado', 'EnviarFactura', 'Look', 'fkNTC_DireccionEnvio', 'fkNTC_Almacen', 'fkNTC_TarifaEnvio', 'fkNTC_Divisa', 'EnvioParcial', 'EnviadoCompletamente', 'FechaEntrega', 'ConfirmadaRecepcion', 'Enviado', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDtoCliente', 'fkNTC_Portes', 'ga'], 'integer'],
            [['Fecha', 'FechaVencimiento', 'FechaDtoPP', 'FechaEnvio', 'FechaRegistro'], 'safe'],
            [['PorcentajeDtoPP', 'Importe', 'ImporteIvaIncl', 'ImportePortes', 'ImportePortesSI', 'IvaImporte', 'ImporteRecargo', 'LogAlm', 'ImporteSLA', 'Total', 'PcIVA', 'ImpCR'], 'number'],
            [['Comentario'], 'string'],
            [['Numero'], 'string', 'max' => 20],
            [['NombreCliente'], 'string', 'max' => 200],
            [['DireccionCliente', 'DireccionFactura', 'DireccionEnvio'], 'string', 'max' => 150],
            [['CodPostalCliente', 'CodPostalFactura', 'CodPostalEnvio'], 'string', 'max' => 10],
            [['LocalidadCliente', 'ProvinciaCliente', 'PaisCliente', 'LocalidadEnvio', 'ProvinciaEnvio', 'PaisEnvio'], 'string', 'max' => 80],
            [['CifFactura', 'Peso'], 'string', 'max' => 50],
            [['NombreFactura', 'SobreAgencia', 'TelefonoAgencia', 'NombreAgencia'], 'string', 'max' => 255],
            [['LocalidadFactura', 'ProvinciaFactura', 'PaisFactura', 'EnvioAtencionA', 'Tracking'], 'string', 'max' => 100],
            [['fkNTC_FormaPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCFormaPago::className(), 'targetAttribute' => ['fkNTC_FormaPago' => 'idNTC_FormaPago']],
            [['fkNTC_NumSerie'], 'exist', 'skipOnError' => true, 'targetClass' => NTCNumSerie::className(), 'targetAttribute' => ['fkNTC_NumSerie' => 'idNTC_NumSerie']],
            [['fkNTC_TerminosPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTerminoPago::className(), 'targetAttribute' => ['fkNTC_TerminosPago' => 'idNTC_TerminoPago']],
            [['fkNTC_TipoDocumentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoDocumentoVenta::className(), 'targetAttribute' => ['fkNTC_TipoDocumentoVenta' => 'idNTC_TipoDocumentoVenta']],
            [['fkNTC_TipoEstadoPedido'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoEstadoPedido::className(), 'targetAttribute' => ['fkNTC_TipoEstadoPedido' => 'idNTC_TipoEstadoPedido']],
            [['fkNTC_TarifaEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTarifaEnvio::className(), 'targetAttribute' => ['fkNTC_TarifaEnvio' => 'idNTC_TarifaEnvio']],
            [['fkNTC_GrupoPrecioCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoPrecioCliente::className(), 'targetAttribute' => ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']],
            [['fkNTC_GrupoDtoCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoDescuentoCliente::className(), 'targetAttribute' => ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']],
            [['fkNTC_ProvinciaFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_ProvinciaFactura' => 'idNTC_Provincia']],
            [['fkNTC_ClienteVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_ClienteVenta' => 'idNTC_Cliente']],
            [['fkNTC_PaisFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_PaisFactura' => 'idNTC_Pais']],
            [['fkNTC_ClienteFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_ClienteFactura' => 'idNTC_Cliente']],
            [['fkNTC_Tienda'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTienda::className(), 'targetAttribute' => ['fkNTC_Tienda' => 'idNTC_Tienda']],
            [['fkNTC_DireccionEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDireccionEnvio::className(), 'targetAttribute' => ['fkNTC_DireccionEnvio' => 'idNTC_DireccionEnvio']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_DocumentoVenta' => 'Id Ntc  Documento Venta',
            'fkNTC_TipoDocumentoVenta' => 'Fk Ntc  Tipo Documento Venta',
            'Numero' => 'Numero',
            'Fecha' => 'Fecha',
            'fkNTC_NumSerie' => 'Fk Ntc  Num Serie',
            'fkNTC_TipoEstadoPedido' => 'Fk Ntc  Tipo Estado Pedido',
            'fkNTC_ClienteVenta' => 'Fk Ntc  Cliente Venta',
            'NombreCliente' => 'Nombre Cliente',
            'DireccionCliente' => 'Direccion Cliente',
            'CodPostalCliente' => 'Cod Postal Cliente',
            'LocalidadCliente' => 'Localidad Cliente',
            'ProvinciaCliente' => 'Provincia Cliente',
            'PaisCliente' => 'Pais Cliente',
            'fkNTC_ClienteFactura' => 'Fk Ntc  Cliente Factura',
            'CifFactura' => 'Cif Factura',
            'NombreFactura' => 'Nombre Factura',
            'DireccionFactura' => 'Direccion Factura',
            'CodPostalFactura' => 'Cod Postal Factura',
            'LocalidadFactura' => 'Localidad Factura',
            'fkNTC_ProvinciaFactura' => 'Fk Ntc  Provincia Factura',
            'ProvinciaFactura' => 'Provincia Factura',
            'fkNTC_PaisFactura' => 'Fk Ntc  Pais Factura',
            'PaisFactura' => 'Pais Factura',
            'fkNTC_Tienda' => 'Fk Ntc  Tienda',
            'fkNTC_TerminosPago' => 'Fk Ntc  Terminos Pago',
            'fkNTC_FormaPago' => 'Fk Ntc  Forma Pago',
            'FechaVencimiento' => 'Fecha Vencimiento',
            'PorcentajeDtoPP' => 'Porcentaje Dto Pp',
            'FechaDtoPP' => 'Fecha Dto Pp',
            'AlbaranValorado' => 'Albaran Valorado',
            'EnviarFactura' => 'Enviar Factura',
            'Look' => 'Look',
            'fkNTC_DireccionEnvio' => 'Fk Ntc  Direccion Envio',
            'DireccionEnvio' => 'Direccion Envio',
            'CodPostalEnvio' => 'Cod Postal Envio',
            'LocalidadEnvio' => 'Localidad Envio',
            'ProvinciaEnvio' => 'Provincia Envio',
            'PaisEnvio' => 'Pais Envio',
            'EnvioAtencionA' => 'Envio Atencion A',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'fkNTC_TarifaEnvio' => 'Fk Ntc  Tarifa Envio',
            'FechaEnvio' => 'Fecha Envio',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'Peso' => 'Peso',
            'FechaRegistro' => 'Fecha Registro',
            'Comentario' => 'Comentario',
            'EnvioParcial' => 'Envio Parcial',
            'EnviadoCompletamente' => 'Enviado Completamente',
            'FechaEntrega' => 'Fecha Entrega',
            'ConfirmadaRecepcion' => 'Confirmada Recepcion',
            'Importe' => 'Importe',
            'ImporteIvaIncl' => 'Importe Iva Incl',
            'Tracking' => 'Tracking',
            'Enviado' => 'Enviado',
            'fkNTC_GrupoPrecioCliente' => 'Fk Ntc  Grupo Precio Cliente',
            'fkNTC_GrupoDtoCliente' => 'Fk Ntc  Grupo Dto Cliente',
            'fkNTC_Portes' => 'Fk Ntc  Portes',
            'SobreAgencia' => 'Sobre Agencia',
            'TelefonoAgencia' => 'Telefono Agencia',
            'NombreAgencia' => 'Nombre Agencia',
            'ImportePortes' => 'Importe Portes',
            'ImportePortesSI' => 'Importe Portes Si',
            'IvaImporte' => 'Iva Importe',
            'ImporteRecargo' => 'Importe Recargo',
            'LogAlm' => 'Log Alm',
            'ImporteSLA' => 'Importe Sla',
            'Total' => 'Total',
            'PcIVA' => 'Pc Iva',
            'ImpCR' => 'Imp Cr',
            'ga' => 'Ga',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAlbaranVentas()
    {
        return $this->hasMany(NTCCabAlbaranVenta::className(), ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabFacturaVentas()
    {
        return $this->hasMany(NTCCabFacturaVenta::className(), ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCarritos()
    {
        return $this->hasMany(NTCCarrito::className(), ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDocVentas()
    {
        return $this->hasMany(NTCCuponDocVenta::className(), ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCuponDescuentos()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento'])->viaTable('NTC_CuponDocVenta', ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCFormaPago()
    {
        return $this->hasOne(NTCFormaPago::className(), ['idNTC_FormaPago' => 'fkNTC_FormaPago']);
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
    public function getFkNTCTerminosPago()
    {
        return $this->hasOne(NTCTerminoPago::className(), ['idNTC_TerminoPago' => 'fkNTC_TerminosPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoDocumentoVenta()
    {
        return $this->hasOne(NTCTipoDocumentoVenta::className(), ['idNTC_TipoDocumentoVenta' => 'fkNTC_TipoDocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoEstadoPedido()
    {
        return $this->hasOne(NTCTipoEstadoPedido::className(), ['idNTC_TipoEstadoPedido' => 'fkNTC_TipoEstadoPedido']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTarifaEnvio()
    {
        return $this->hasOne(NTCTarifaEnvio::className(), ['idNTC_TarifaEnvio' => 'fkNTC_TarifaEnvio']);
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
    public function getFkNTCProvinciaFactura()
    {
        return $this->hasOne(NTCProvincia::className(), ['idNTC_Provincia' => 'fkNTC_ProvinciaFactura']);
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
    public function getFkNTCPaisFactura()
    {
        return $this->hasOne(NTCPais::className(), ['idNTC_Pais' => 'fkNTC_PaisFactura']);
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
    public function getFkNTCTienda()
    {
        return $this->hasOne(NTCTienda::className(), ['idNTC_Tienda' => 'fkNTC_Tienda']);
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
    public function getFkNTCDivisa()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaVentas()
    {
        return $this->hasMany(NTCLineaVenta::className(), ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCOperacions()
    {
        return $this->hasMany(NTCOperacion::className(), ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']);
    }
}
