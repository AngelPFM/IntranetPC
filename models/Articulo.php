<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Articulo".
 *
 * @property integer $idNTC_Articulo
 * @property integer $fkNTC_TipoArticulo
 * @property string $Referencia
 * @property string $ReferenciaProveedor
 * @property string $ReferenciaColor
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $DescripcionCorta
 * @property string $Nuevo_DesdeFecha
 * @property string $Nuevo_HastaFecha
 * @property integer $Habilitado
 * @property integer $HabilitadoProfesionales
 * @property integer $fkNTC_ConjuntoAtributos
 * @property integer $fkNTC_TipoIVAProducto
 * @property string $MetaTitle
 * @property string $MetaKeywords
 * @property string $MetaDescription
 * @property string $MetaRobots
 * @property integer $fkNTC_UnidadMedida
 * @property integer $fkNTC_UnidadMedidaVenta
 * @property integer $GestionExistencias
 * @property double $CantidadMinimaCarrito
 * @property double $CantidadMaximaCarrito
 * @property integer $IncrementoCantidad
 * @property double $CantidadIncremento
 * @property double $CantidadMarcaSinStock
 * @property integer $DivisibleParaEnvio
 * @property integer $PedidosArticulosAgotados
 * @property integer $AvisoClienteArticuloPedidoAgotado
 * @property integer $Quitar
 * @property integer $fkNTC_Almacen
 * @property integer $fkNTC_Marca
 * @property integer $App
 * @property integer $Stock
 * @property string $Art_modificado
 *
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCConjuntoAtributos $fkNTCConjuntoAtributos
 * @property NTCMarca $fkNTCMarca
 * @property NTCArticuloCategoria[] $nTCArticuloCategorias
 * @property NTCArticuloColor[] $nTCArticuloColors
 * @property NTCArticuloColorFiltro[] $nTCArticuloColorFiltros
 * @property NTCArticuloEtiqueta[] $nTCArticuloEtiquetas
 * @property NTCArticuloNewsletter[] $nTCArticuloNewsletters
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 * @property NTCCuponDescuento[] $nTCCuponDescuentos0
 * @property NTCDiarioProducto[] $nTCDiarioProductos
 * @property NTCEscaparate[] $nTCEscaparates
 * @property NTCFichero[] $nTCFicheroes
 * @property NTCLineaAbonoVenta[] $nTCLineaAbonoVentas
 * @property NTCLineaAlbaranVenta[] $nTCLineaAlbaranVentas
 * @property NTCLineaCarrito[] $nTCLineaCarritos
 * @property NTCLineaDevolucionVenta[] $nTCLineaDevolucionVentas
 * @property NTCLineaFacturaVenta[] $nTCLineaFacturaVentas
 * @property NTCLineaVenta[] $nTCLineaVentas
 * @property NTCLoteArticulo[] $nTCLoteArticulos
 * @property NTCMovProducto[] $nTCMovProductos
 * @property NTCTarifaVenta[] $nTCTarifaVentas
 */
class NTCArticulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Articulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_TipoArticulo', 'fkNTC_ConjuntoAtributos', 'fkNTC_TipoIVAProducto', 'fkNTC_UnidadMedida', 'fkNTC_UnidadMedidaVenta', 'Art_modificado'], 'required'],
            [['fkNTC_TipoArticulo', 'Habilitado', 'HabilitadoProfesionales', 'fkNTC_ConjuntoAtributos', 'fkNTC_TipoIVAProducto', 'fkNTC_UnidadMedida', 'fkNTC_UnidadMedidaVenta', 'GestionExistencias', 'IncrementoCantidad', 'DivisibleParaEnvio', 'PedidosArticulosAgotados', 'AvisoClienteArticuloPedidoAgotado', 'Quitar', 'fkNTC_Almacen', 'fkNTC_Marca', 'App', 'Stock'], 'integer'],
            [['Nuevo_DesdeFecha', 'Nuevo_HastaFecha', 'Art_modificado'], 'safe'],
            [['CantidadMinimaCarrito', 'CantidadMaximaCarrito', 'CantidadIncremento', 'CantidadMarcaSinStock'], 'number'],
            [['Referencia'], 'string', 'max' => 45],
            [['ReferenciaProveedor', 'ReferenciaColor', 'Nombre'], 'string', 'max' => 80],
            [['Descripcion', 'MetaTitle', 'MetaKeywords', 'MetaDescription', 'MetaRobots'], 'string', 'max' => 255],
            [['DescripcionCorta'], 'string', 'max' => 100],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_ConjuntoAtributos'], 'exist', 'skipOnError' => true, 'targetClass' => NTCConjuntoAtributos::className(), 'targetAttribute' => ['fkNTC_ConjuntoAtributos' => 'idNTC_ConjuntoAtributos']],
            [['fkNTC_Marca'], 'exist', 'skipOnError' => true, 'targetClass' => NTCMarca::className(), 'targetAttribute' => ['fkNTC_Marca' => 'idNTC_Marca']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Articulo' => 'Id Ntc  Articulo',
            'fkNTC_TipoArticulo' => 'Fk Ntc  Tipo Articulo',
            'Referencia' => 'Referencia',
            'ReferenciaProveedor' => 'Referencia Proveedor',
            'ReferenciaColor' => 'Referencia Color',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'DescripcionCorta' => 'Descripcion Corta',
            'Nuevo_DesdeFecha' => 'Nuevo  Desde Fecha',
            'Nuevo_HastaFecha' => 'Nuevo  Hasta Fecha',
            'Habilitado' => 'Habilitado',
            'HabilitadoProfesionales' => 'Habilitado Profesionales',
            'fkNTC_ConjuntoAtributos' => 'Fk Ntc  Conjunto Atributos',
            'fkNTC_TipoIVAProducto' => 'Fk Ntc  Tipo Ivaproducto',
            'MetaTitle' => 'Meta Title',
            'MetaKeywords' => 'Meta Keywords',
            'MetaDescription' => 'Meta Description',
            'MetaRobots' => 'Meta Robots',
            'fkNTC_UnidadMedida' => 'Fk Ntc  Unidad Medida',
            'fkNTC_UnidadMedidaVenta' => 'Fk Ntc  Unidad Medida Venta',
            'GestionExistencias' => 'Gestion Existencias',
            'CantidadMinimaCarrito' => 'Cantidad Minima Carrito',
            'CantidadMaximaCarrito' => 'Cantidad Maxima Carrito',
            'IncrementoCantidad' => 'Incremento Cantidad',
            'CantidadIncremento' => 'Cantidad Incremento',
            'CantidadMarcaSinStock' => 'Cantidad Marca Sin Stock',
            'DivisibleParaEnvio' => 'Divisible Para Envio',
            'PedidosArticulosAgotados' => 'Pedidos Articulos Agotados',
            'AvisoClienteArticuloPedidoAgotado' => 'Aviso Cliente Articulo Pedido Agotado',
            'Quitar' => 'Quitar',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'fkNTC_Marca' => 'Fk Ntc  Marca',
            'App' => 'App',
            'Stock' => 'Stock',
            'Art_modificado' => 'Art Modificado',
        ];
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
    public function getFkNTCConjuntoAtributos()
    {
        return $this->hasOne(NTCConjuntoAtributos::className(), ['idNTC_ConjuntoAtributos' => 'fkNTC_ConjuntoAtributos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCMarca()
    {
        return $this->hasOne(NTCMarca::className(), ['idNTC_Marca' => 'fkNTC_Marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloCategorias()
    {
        return $this->hasMany(NTCArticuloCategoria::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloColors()
    {
        return $this->hasMany(NTCArticuloColor::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloColorFiltros()
    {
        return $this->hasMany(NTCArticuloColorFiltro::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloEtiquetas()
    {
        return $this->hasMany(NTCArticuloEtiqueta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloNewsletters()
    {
        return $this->hasMany(NTCArticuloNewsletter::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDescuentos()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['fkNTC_ArticuloDescuento' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDescuentos0()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['fkNTC_ArticuloRegalo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDiarioProductos()
    {
        return $this->hasMany(NTCDiarioProducto::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCEscaparates()
    {
        return $this->hasMany(NTCEscaparate::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCFicheroes()
    {
        return $this->hasMany(NTCFichero::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaAbonoVentas()
    {
        return $this->hasMany(NTCLineaAbonoVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaAlbaranVentas()
    {
        return $this->hasMany(NTCLineaAlbaranVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaCarritos()
    {
        return $this->hasMany(NTCLineaCarrito::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaDevolucionVentas()
    {
        return $this->hasMany(NTCLineaDevolucionVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaFacturaVentas()
    {
        return $this->hasMany(NTCLineaFacturaVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaVentas()
    {
        return $this->hasMany(NTCLineaVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLoteArticulos()
    {
        return $this->hasMany(NTCLoteArticulo::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMovProductos()
    {
        return $this->hasMany(NTCMovProducto::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTarifaVentas()
    {
        return $this->hasMany(NTCTarifaVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }
}
