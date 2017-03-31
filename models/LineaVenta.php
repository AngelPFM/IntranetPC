<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LineaVenta".
 *
 * @property integer $idNTC_LineaVenta
 * @property integer $fkNTC_DocumentoVenta
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Lote
 * @property integer $fkNTC_Variante
 * @property integer $fkNTC_Almacen
 * @property double $Cantidad
 * @property string $Descripcion
 * @property double $Importe
 * @property double $PrecioxPar
 * @property double $ParesxLote
 * @property double $CantidadReservada
 * @property double $CantidadEnviada
 * @property double $CantidadFacturada
 * @property double $CantidadPendiente
 * @property double $CantidadPdteFacturar
 * @property double $CantidadPdteEnviar
 * @property double $ImporteIva
 *
 * @property NTCCuponLineaVenta[] $nTCCuponLineaVentas
 * @property NTCCuponDescuento[] $fkNTCCuponDescuentos
 * @property NTCLineaAlbaranVenta[] $nTCLineaAlbaranVentas
 * @property NTCLineaCarrito[] $nTCLineaCarritos
 * @property NTCLineaFacturaVenta[] $nTCLineaFacturaVentas
 * @property NTCLote $fkNTCLote
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCDocumentoVenta $fkNTCDocumentoVenta
 * @property NTCVariante $fkNTCVariante
 * @property NTCAlmacen $fkNTCAlmacen
 */
class LineaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LineaVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_DocumentoVenta', 'Cantidad', 'Importe', 'PrecioxPar', 'ParesxLote', 'CantidadReservada', 'CantidadEnviada', 'CantidadFacturada', 'CantidadPendiente', 'CantidadPdteFacturar', 'CantidadPdteEnviar', 'ImporteIva'], 'required'],
            [['fkNTC_DocumentoVenta', 'fkNTC_Articulo', 'fkNTC_Lote', 'fkNTC_Variante', 'fkNTC_Almacen'], 'integer'],
            [['Cantidad', 'Importe', 'PrecioxPar', 'ParesxLote', 'CantidadReservada', 'CantidadEnviada', 'CantidadFacturada', 'CantidadPendiente', 'CantidadPdteFacturar', 'CantidadPdteEnviar', 'ImporteIva'], 'number'],
            [['Descripcion'], 'string', 'max' => 150],
            [['fkNTC_Lote'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLote::className(), 'targetAttribute' => ['fkNTC_Lote' => 'idNTC_Lote']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_DocumentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDocumentoVenta::className(), 'targetAttribute' => ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_LineaVenta' => 'Id Ntc  Linea Venta',
            'fkNTC_DocumentoVenta' => 'Fk Ntc  Documento Venta',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Lote' => 'Fk Ntc  Lote',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripcion',
            'Importe' => 'Importe',
            'PrecioxPar' => 'Preciox Par',
            'ParesxLote' => 'Paresx Lote',
            'CantidadReservada' => 'Cantidad Reservada',
            'CantidadEnviada' => 'Cantidad Enviada',
            'CantidadFacturada' => 'Cantidad Facturada',
            'CantidadPendiente' => 'Cantidad Pendiente',
            'CantidadPdteFacturar' => 'Cantidad Pdte Facturar',
            'CantidadPdteEnviar' => 'Cantidad Pdte Enviar',
            'ImporteIva' => 'Importe Iva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponLineaVentas()
    {
        return $this->hasMany(CuponLineaVenta::className(), ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento'])->viaTable('NTC_CuponLineaVenta', ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaAlbaranVentas()
    {
        return $this->hasMany(LineaAlbaranVenta::className(), ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaCarritos()
    {
        return $this->hasMany(LineaCarrito::className(), ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaFacturaVentas()
    {
        return $this->hasMany(LineaFacturaVenta::className(), ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLote()
    {
        return $this->hasOne(Lote::className(), ['idNTC_Lote' => 'fkNTC_Lote']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulo()
    {
        return $this->hasOne(Articulo::className(), ['idNTC_Articulo' => 'fkNTC_Articulo']);
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
    public function getVariante()
    {
        return $this->hasOne(Variante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAlmacen()
    {
        return $this->hasOne(Almacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }
}
