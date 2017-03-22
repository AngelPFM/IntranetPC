<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CuponDescuento".
 *
 * @property integer $idNTC_CuponDescuento
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Codigo
 * @property integer $UsoParcial
 * @property integer $Prioridad
 * @property integer $Activo
 * @property integer $VecesUsado
 * @property string $ValidoDesde
 * @property string $ValidoHasta
 * @property integer $CantidadDisponible
 * @property integer $DisponiblesPorUsuario
 * @property integer $fkNTC_GrupoPrecioCliente
 * @property integer $fkNTC_Cliente
 * @property integer $fkNTC_FormaPago
 * @property integer $fkNTC_ProveedorEnvio
 * @property integer $fkNTC_MetodoEnvio
 * @property integer $fkNTC_Divisa
 * @property double $ImporteMinimo
 * @property integer $fkNTC_DivisaImporteMinimo
 * @property integer $IncluidoEnvio
 * @property integer $SeleccionCatalogo
 * @property integer $MinimoProductosEnSeleccion
 * @property integer $EnvioGratuito
 * @property integer $fkNTC_TipoDescuentoVenta
 * @property double $Descuento
 * @property integer $AplicarAProducto
 * @property integer $fkNTC_ArticuloDescuento
 * @property integer $fkNTC_ArticuloRegalo
 * @property integer $Quitar
 *
 * @property NTCCuponCarrito[] $nTCCuponCarritos
 * @property NTCCarrito[] $fkNTCCarritos
 * @property NTCGrupoPrecioCliente $fkNTCGrupoPrecioCliente
 * @property NTCFormaPago $fkNTCFormaPago
 * @property NTCCliente $fkNTCCliente
 * @property NTCProveedorEnvio $fkNTCProveedorEnvio
 * @property NTCMetodoEnvio $fkNTCMetodoEnvio
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCDivisa $fkNTCDivisaImporteMinimo
 * @property NTCArticulo $fkNTCArticuloDescuento
 * @property NTCArticulo $fkNTCArticuloRegalo
 * @property NTCTipoDescuentoVenta $fkNTCTipoDescuentoVenta
 * @property NTCCuponDocVenta[] $nTCCuponDocVentas
 * @property NTCDocumentoVenta[] $fkNTCDocumentoVentas
 * @property NTCCuponLineaCarrito[] $nTCCuponLineaCarritos
 * @property NTCLineaCarrito[] $fkNTCLineaCarritos
 * @property NTCCuponLineaVenta[] $nTCCuponLineaVentas
 * @property NTCLineaVenta[] $fkNTCLineaVentas
 * @property NTCSeleccionCupon[] $nTCSeleccionCupons
 */
class CuponDescuento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CuponDescuento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Codigo', 'Prioridad', 'VecesUsado', 'ValidoDesde', 'ValidoHasta', 'CantidadDisponible', 'DisponiblesPorUsuario'], 'required'],
            [['UsoParcial', 'Prioridad', 'Activo', 'VecesUsado', 'CantidadDisponible', 'DisponiblesPorUsuario', 'fkNTC_GrupoPrecioCliente', 'fkNTC_Cliente', 'fkNTC_FormaPago', 'fkNTC_ProveedorEnvio', 'fkNTC_MetodoEnvio', 'fkNTC_Divisa', 'fkNTC_DivisaImporteMinimo', 'IncluidoEnvio', 'SeleccionCatalogo', 'MinimoProductosEnSeleccion', 'EnvioGratuito', 'fkNTC_TipoDescuentoVenta', 'AplicarAProducto', 'fkNTC_ArticuloDescuento', 'fkNTC_ArticuloRegalo', 'Quitar'], 'integer'],
            [['ValidoDesde', 'ValidoHasta'], 'safe'],
            [['ImporteMinimo', 'Descuento'], 'number'],
            [['Nombre', 'Codigo'], 'string', 'max' => 50],
            [['Descripcion'], 'string', 'max' => 255],
            [['fkNTC_GrupoPrecioCliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCGrupoPrecioCliente::className(), 'targetAttribute' => ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']],
            [['fkNTC_FormaPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCFormaPago::className(), 'targetAttribute' => ['fkNTC_FormaPago' => 'idNTC_FormaPago']],
            [['fkNTC_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_Cliente' => 'idNTC_Cliente']],
            [['fkNTC_ProveedorEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProveedorEnvio::className(), 'targetAttribute' => ['fkNTC_ProveedorEnvio' => 'idNTC_ProveedorEnvio']],
            [['fkNTC_MetodoEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCMetodoEnvio::className(), 'targetAttribute' => ['fkNTC_MetodoEnvio' => 'idNTC_MetodoEnvio']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
            [['fkNTC_DivisaImporteMinimo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_DivisaImporteMinimo' => 'idNTC_Divisa']],
            [['fkNTC_ArticuloDescuento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_ArticuloDescuento' => 'idNTC_Articulo']],
            [['fkNTC_ArticuloRegalo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_ArticuloRegalo' => 'idNTC_Articulo']],
            [['fkNTC_TipoDescuentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoDescuentoVenta::className(), 'targetAttribute' => ['fkNTC_TipoDescuentoVenta' => 'idNTC_TipoDesuentoVenta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_CuponDescuento' => 'Id Ntc  Cupon Descuento',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Codigo' => 'Codigo',
            'UsoParcial' => 'Uso Parcial',
            'Prioridad' => 'Prioridad',
            'Activo' => 'Activo',
            'VecesUsado' => 'Veces Usado',
            'ValidoDesde' => 'Valido Desde',
            'ValidoHasta' => 'Valido Hasta',
            'CantidadDisponible' => 'Cantidad Disponible',
            'DisponiblesPorUsuario' => 'Disponibles Por Usuario',
            'fkNTC_GrupoPrecioCliente' => 'Fk Ntc  Grupo Precio Cliente',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'fkNTC_FormaPago' => 'Fk Ntc  Forma Pago',
            'fkNTC_ProveedorEnvio' => 'Fk Ntc  Proveedor Envio',
            'fkNTC_MetodoEnvio' => 'Fk Ntc  Metodo Envio',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'ImporteMinimo' => 'Importe Minimo',
            'fkNTC_DivisaImporteMinimo' => 'Fk Ntc  Divisa Importe Minimo',
            'IncluidoEnvio' => 'Incluido Envio',
            'SeleccionCatalogo' => 'Seleccion Catalogo',
            'MinimoProductosEnSeleccion' => 'Minimo Productos En Seleccion',
            'EnvioGratuito' => 'Envio Gratuito',
            'fkNTC_TipoDescuentoVenta' => 'Fk Ntc  Tipo Descuento Venta',
            'Descuento' => 'Descuento',
            'AplicarAProducto' => 'Aplicar Aproducto',
            'fkNTC_ArticuloDescuento' => 'Fk Ntc  Articulo Descuento',
            'fkNTC_ArticuloRegalo' => 'Fk Ntc  Articulo Regalo',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponCarritos()
    {
        return $this->hasMany(NTCCuponCarrito::className(), ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCarritos()
    {
        return $this->hasMany(NTCCarrito::className(), ['idNTC_Carrito' => 'fkNTC_Carrito'])->viaTable('NTC_CuponCarrito', ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
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
    public function getFkNTCFormaPago()
    {
        return $this->hasOne(NTCFormaPago::className(), ['idNTC_FormaPago' => 'fkNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCliente()
    {
        return $this->hasOne(NTCCliente::className(), ['idNTC_Cliente' => 'fkNTC_Cliente']);
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
    public function getFkNTCDivisaImporteMinimo()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_DivisaImporteMinimo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCArticuloDescuento()
    {
        return $this->hasOne(NTCArticulo::className(), ['idNTC_Articulo' => 'fkNTC_ArticuloDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCArticuloRegalo()
    {
        return $this->hasOne(NTCArticulo::className(), ['idNTC_Articulo' => 'fkNTC_ArticuloRegalo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoDescuentoVenta()
    {
        return $this->hasOne(NTCTipoDescuentoVenta::className(), ['idNTC_TipoDesuentoVenta' => 'fkNTC_TipoDescuentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDocVentas()
    {
        return $this->hasMany(NTCCuponDocVenta::className(), ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['idNTC_DocumentoVenta' => 'fkNTC_DocumentoVenta'])->viaTable('NTC_CuponDocVenta', ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponLineaCarritos()
    {
        return $this->hasMany(NTCCuponLineaCarrito::className(), ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLineaCarritos()
    {
        return $this->hasMany(NTCLineaCarrito::className(), ['idNTC_LineaCarrito' => 'fkNTC_LineaCarrito'])->viaTable('NTC_CuponLineaCarrito', ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponLineaVentas()
    {
        return $this->hasMany(NTCCuponLineaVenta::className(), ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLineaVentas()
    {
        return $this->hasMany(NTCLineaVenta::className(), ['idNTC_LineaVenta' => 'fkNTC_LineaVenta'])->viaTable('NTC_CuponLineaVenta', ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCSeleccionCupons()
    {
        return $this->hasMany(NTCSeleccionCupon::className(), ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']);
    }
}
