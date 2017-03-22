<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CabAbonoVenta".
 *
 * @property integer $idNTC_CabAbonoVenta
 * @property string $Numero
 * @property string $Fecha
 * @property integer $fkNTC_NumSerie
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
 * @property NTCCliente $fkNTCClienteVenta
 * @property NTCCliente $fkNTCClienteFactura
 * @property NTCTienda $fkNTCTienda
 * @property NTCTerminoPago $fkNTCTerminosPago
 * @property NTCFormaPago $fkNTCFormaPago
 * @property NTCDireccionEnvio $fkNTCDireccionFacturacion
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCGrupoPrecioCliente $fkNTCGrupoPrecioCliente
 * @property NTCLineaAbonoVenta[] $nTCLineaAbonoVentas
 */
class NTCCabAbonoVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CabAbonoVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Numero', 'Fecha', 'fkNTC_NumSerie', 'fkNTC_ClienteVenta', 'fkNTC_Tienda', 'fkNTC_TerminosPago', 'fkNTC_FormaPago', 'FechaVencimiento', 'fkNTC_Divisa'], 'required'],
            [['Fecha', 'FechaVencimiento', 'FechaDtoPP', 'FechaRegistro'], 'safe'],
            [['fkNTC_NumSerie', 'fkNTC_ClienteVenta', 'fkNTC_ClienteFactura', 'fkNTC_Tienda', 'fkNTC_TerminosPago', 'fkNTC_FormaPago', 'fkNTC_DireccionFacturacion', 'fkNTC_Divisa', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDtoCliente'], 'integer'],
            [['PorcentajeDtoPP', 'Importe', 'ImporteIvaIncl'], 'number'],
            [['Comentario'], 'string'],
            [['Numero'], 'string', 'max' => 20],
            [['NombreFactura', 'LocalidadFactura', 'ProvinciaFactura', 'PaisFactura'], 'string', 'max' => 100],
            [['DireccionFactura'], 'string', 'max' => 150],
            [['CodPostalFactura'], 'string', 'max' => 10],
            [['fkNTC_NumSerie'], 'exist', 'skipOnError' => true, 'targetClass' => NTCNumSerie::className(), 'targetAttribute' => ['fkNTC_NumSerie' => 'idNTC_NumSerie']],
            [['fkNTC_GrupoDtoCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoDescuentoCliente::className(), 'targetAttribute' => ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']],
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
            'idNTC_CabAbonoVenta' => 'Id Ntc  Cab Abono Venta',
            'Numero' => 'Numero',
            'Fecha' => 'Fecha',
            'fkNTC_NumSerie' => 'Fk Ntc  Num Serie',
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
    public function getFkNTCNumSerie()
    {
        return $this->hasOne(NTCNumSerie::className(), ['idNTC_NumSerie' => 'fkNTC_NumSerie']);
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
    public function getFkNTCClienteVenta()
    {
        return $this->hasOne(NTCCliente::className(), ['idNTC_Cliente' => 'fkNTC_ClienteVenta']);
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
    public function getFkNTCTerminosPago()
    {
        return $this->hasOne(NTCTerminoPago::className(), ['idNTC_TerminoPago' => 'fkNTC_TerminosPago']);
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
    public function getFkNTCDireccionFacturacion()
    {
        return $this->hasOne(NTCDireccionEnvio::className(), ['idNTC_DireccionEnvio' => 'fkNTC_DireccionFacturacion']);
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
    public function getNTCLineaAbonoVentas()
    {
        return $this->hasMany(NTCLineaAbonoVenta::className(), ['fkNTC_CabAbonoVenta' => 'idNTC_CabAbonoVenta']);
    }
}
