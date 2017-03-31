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
class Articulo extends \yii\db\ActiveRecord
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
    public function getAlmacen()
    {
        return $this->hasOne(Almacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConjuntoAtributos()
    {
        return $this->hasOne(ConjuntoAtributos::className(), ['idNTC_ConjuntoAtributos' => 'fkNTC_ConjuntoAtributos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::className(), ['idNTC_Marca' => 'fkNTC_Marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloCategorias()
    {
        return $this->hasMany(ArticuloCategoria::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloColors()
    {
        return $this->hasMany(ArticuloColor::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloColorFiltros()
    {
        return $this->hasMany(ArticuloColorFiltro::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloEtiquetas()
    {
        return $this->hasMany(ArticuloEtiqueta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloNewsletters()
    {
        return $this->hasMany(ArticuloNewsletter::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_ArticuloDescuento' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos0()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_ArticuloRegalo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiarioProductos()
    {
        return $this->hasMany(DiarioProducto::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEscaparates()
    {
        return $this->hasMany(Escaparate::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFicheros()
    {
        return $this->hasMany(Fichero::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaAbonoVentas()
    {
        return $this->hasMany(LineaAbonoVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaAlbaranVentas()
    {
        return $this->hasMany(LineaAlbaranVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaCarritos()
    {
        return $this->hasMany(LineaCarrito::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaDevolucionVentas()
    {
        return $this->hasMany(LineaDevolucionVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaFacturaVentas()
    {
        return $this->hasMany(LineaFacturaVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaVentas()
    {
        return $this->hasMany(LineaVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoteArticulos()
    {
        return $this->hasMany(LoteArticulo::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovProductos()
    {
        return $this->hasMany(MovProducto::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifaVentas()
    {
        return $this->hasMany(TarifaVenta::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }
   
}
