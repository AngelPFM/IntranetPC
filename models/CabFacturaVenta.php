<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CabFacturaVenta".
 *
 * @property integer $idNTC_CabFacturaVenta
 * @property string $Numero
 * @property string $Fecha
 * @property integer $fkNTC_NumSerie
 * @property integer $fkNTC_DocumentoVenta
 * @property integer $fkNTC_ClienteVenta
 * @property integer $fkNTC_ClienteFactura
 * @property string $NombreFactura
 * @property string $DireccionFactura
 * @property string $CodPostalFactura
 * @property string $LocalidadFactura
 * @property string $ProvinciaFactura
 * @property string $PaisFactura
 * @property integer $fkNTC_Tienda
 * @property integer $fkNTC_TerminosPago
 * @property integer $fkNTC_FormaPago
 * @property string $FechaVencimiento
 * @property double $PorcentajeDtoPP
 * @property string $FechaDtoPP
 * @property integer $fkNTC_DireccionFacturacion
 * @property integer $fkNTC_Divisa
 * @property string $FechaRegistro
 * @property string $Comentario
 * @property double $Importe
 * @property double $ImporteIvaIncl
 * @property integer $fkNTC_GrupoPrecioCliente
 * @property integer $fkNTC_GrupoDtoCliente
 *
 * @property NTCNumSerie $fkNTCNumSerie
 * @property NTCGrupoDescuentoCliente $fkNTCGrupoDtoCliente
 * @property NTCDocumentoVenta $fkNTCDocumentoVenta
 * @property NTCCliente $fkNTCClienteVenta
 * @property NTCCliente $fkNTCClienteFactura
 * @property NTCTienda $fkNTCTienda
 * @property NTCTerminoPago $fkNTCTerminosPago
 * @property NTCFormaPago $fkNTCFormaPago
 * @property NTCDireccionEnvio $fkNTCDireccionFacturacion
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCGrupoPrecioCliente $fkNTCGrupoPrecioCliente
 * @property NTCLineaFacturaVenta[] $nTCLineaFacturaVentas
 */
class CabFacturaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CabFacturaVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Numero', 'Fecha', 'fkNTC_NumSerie', 'fkNTC_DocumentoVenta', 'fkNTC_ClienteVenta', 'fkNTC_Tienda', 'fkNTC_TerminosPago', 'fkNTC_FormaPago', 'FechaVencimiento', 'fkNTC_Divisa'], 'required'],
            [['Fecha', 'FechaVencimiento', 'FechaDtoPP', 'FechaRegistro'], 'safe'],
            [['fkNTC_NumSerie', 'fkNTC_DocumentoVenta', 'fkNTC_ClienteVenta', 'fkNTC_ClienteFactura', 'fkNTC_Tienda', 'fkNTC_TerminosPago', 'fkNTC_FormaPago', 'fkNTC_DireccionFacturacion', 'fkNTC_Divisa', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDtoCliente'], 'integer'],
            [['PorcentajeDtoPP', 'Importe', 'ImporteIvaIncl'], 'number'],
            [['Comentario'], 'string'],
            [['Numero'], 'string', 'max' => 20],
            [['NombreFactura', 'LocalidadFactura', 'ProvinciaFactura', 'PaisFactura'], 'string', 'max' => 100],
            [['DireccionFactura'], 'string', 'max' => 150],
            [['CodPostalFactura'], 'string', 'max' => 10],
            [['fkNTC_NumSerie'], 'exist', 'skipOnError' => true, 'targetClass' => NTCNumSerie::className(), 'targetAttribute' => ['fkNTC_NumSerie' => 'idNTC_NumSerie']],
            [['fkNTC_GrupoDtoCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoDescuentoCliente::className(), 'targetAttribute' => ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']],
            [['fkNTC_DocumentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDocumentoVenta::className(), 'targetAttribute' => ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']],
            [['fkNTC_ClienteVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_ClienteVenta' => 'idNTC_Cliente']],
            [['fkNTC_ClienteFactura'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_ClienteFactura' => 'idNTC_Cliente']],
            [['fkNTC_Tienda'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTienda::className(), 'targetAttribute' => ['fkNTC_Tienda' => 'idNTC_Tienda']],
            [['fkNTC_TerminosPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTerminoPago::className(), 'targetAttribute' => ['fkNTC_TerminosPago' => 'idNTC_TerminoPago']],
            [['fkNTC_FormaPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCFormaPago::className(), 'targetAttribute' => ['fkNTC_FormaPago' => 'idNTC_FormaPago']],
            [['fkNTC_DireccionFacturacion'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDireccionEnvio::className(), 'targetAttribute' => ['fkNTC_DireccionFacturacion' => 'idNTC_DireccionEnvio']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
            [['fkNTC_GrupoPrecioCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoPrecioCliente::className(), 'targetAttribute' => ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_CabFacturaVenta' => 'Id Ntc  Cab Factura Venta',
            'Numero' => 'Numero',
            'Fecha' => 'Fecha',
            'fkNTC_NumSerie' => 'Fk Ntc  Num Serie',
            'fkNTC_DocumentoVenta' => 'Fk Ntc  Documento Venta',
            'fkNTC_ClienteVenta' => 'Fk Ntc  Cliente Venta',
            'fkNTC_ClienteFactura' => 'Fk Ntc  Cliente Factura',
            'NombreFactura' => 'Nombre Factura',
            'DireccionFactura' => 'Direccion Factura',
            'CodPostalFactura' => 'Cod Postal Factura',
            'LocalidadFactura' => 'Localidad Factura',
            'ProvinciaFactura' => 'Provincia Factura',
            'PaisFactura' => 'Pais Factura',
            'fkNTC_Tienda' => 'Fk Ntc  Tienda',
            'fkNTC_TerminosPago' => 'Fk Ntc  Terminos Pago',
            'fkNTC_FormaPago' => 'Fk Ntc  Forma Pago',
            'FechaVencimiento' => 'Fecha Vencimiento',
            'PorcentajeDtoPP' => 'Porcentaje Dto Pp',
            'FechaDtoPP' => 'Fecha Dto Pp',
            'fkNTC_DireccionFacturacion' => 'Fk Ntc  Direccion Facturacion',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'FechaRegistro' => 'Fecha Registro',
            'Comentario' => 'Comentario',
            'Importe' => 'Importe',
            'ImporteIvaIncl' => 'Importe Iva Incl',
            'fkNTC_GrupoPrecioCliente' => 'Fk Ntc  Grupo Precio Cliente',
            'fkNTC_GrupoDtoCliente' => 'Fk Ntc  Grupo Dto Cliente',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNumSerie()
    {
        return $this->hasOne(NumSerie::className(), ['idNTC_NumSerie' => 'fkNTC_NumSerie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoDtoCliente()
    {
        return $this->hasOne(GrupoDescuentoCliente::className(), ['idNTC_GrupoDescuentoCliente' => 'fkNTC_GrupoDtoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVenta()
    {
        return $this->hasOne(DocumentoVenta::className(), ['idNTC_DocumentoVenta' => 'fkNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteVenta()
    {
        return $this->hasOne(Cliente::className(), ['idNTC_Cliente' => 'fkNTC_ClienteVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getClienteFactura()
    {
        return $this->hasOne(Cliente::className(), ['idNTC_Cliente' => 'fkNTC_ClienteFactura']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTienda()
    {
        return $this->hasOne(Tienda::className(), ['idNTC_Tienda' => 'fkNTC_Tienda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminosPago()
    {
        return $this->hasOne(TerminoPago::className(), ['idNTC_TerminoPago' => 'fkNTC_TerminosPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormaPago()
    {
        return $this->hasOne(FormaPago::className(), ['idNTC_FormaPago' => 'fkNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDireccionFacturacion()
    {
        return $this->hasOne(DireccionEnvio::className(), ['idNTC_DireccionEnvio' => 'fkNTC_DireccionFacturacion']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisa()
    {
        return $this->hasOne(Divisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGrupoPrecioCliente()
    {
        return $this->hasOne(GrupoPrecioCliente::className(), ['idNTC_GrupoPrecioCliente' => 'fkNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaFacturaVentas()
    {
        return $this->hasMany(LineaFacturaVenta::className(), ['fkNTC_CabFacturaVenta' => 'idNTC_CabFacturaVenta']);
    }
}
