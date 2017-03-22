<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LineaAlbaranVenta".
 *
 * @property integer $idNTC_LineaAlbaranVenta
 * @property integer $fkNTC_CabAlbaranVenta
 * @property integer $fkNTC_LineaVenta
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Almacen
 * @property integer $fkNTC_Variante
 * @property double $Cantidad
 * @property string $Descripcion
 * @property double $Importe
 * @property double $CantidadFacturada
 * @property double $CantidadPdteFacturar
 * @property double $ImporteIva
 * @property string $Comentario
 *
 * @property NTCCabAlbaranVenta $fkNTCCabAlbaranVenta
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCVariante $fkNTCVariante
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCLineaVenta $fkNTCLineaVenta
 * @property NTCLineaFacturaVenta[] $nTCLineaFacturaVentas
 */
class NTCLineaAlbaranVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LineaAlbaranVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_CabAlbaranVenta', 'fkNTC_Articulo', 'fkNTC_Almacen', 'Cantidad', 'CantidadFacturada', 'CantidadPdteFacturar'], 'required'],
            [['fkNTC_CabAlbaranVenta', 'fkNTC_LineaVenta', 'fkNTC_Articulo', 'fkNTC_Almacen', 'fkNTC_Variante'], 'integer'],
            [['Cantidad', 'Importe', 'CantidadFacturada', 'CantidadPdteFacturar', 'ImporteIva'], 'number'],
            [['Comentario'], 'string'],
            [['Descripcion'], 'string', 'max' => 150],
            [['fkNTC_CabAlbaranVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCabAlbaranVenta::className(), 'targetAttribute' => ['fkNTC_CabAlbaranVenta' => 'idNTC_CabAlbaranVenta']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_LineaVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLineaVenta::className(), 'targetAttribute' => ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_LineaAlbaranVenta' => 'Id Ntc  Linea Albaran Venta',
            'fkNTC_CabAlbaranVenta' => 'Fk Ntc  Cab Albaran Venta',
            'fkNTC_LineaVenta' => 'Fk Ntc  Linea Venta',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripcion',
            'Importe' => 'Importe',
            'CantidadFacturada' => 'Cantidad Facturada',
            'CantidadPdteFacturar' => 'Cantidad Pdte Facturar',
            'ImporteIva' => 'Importe Iva',
            'Comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCabAlbaranVenta()
    {
        return $this->hasOne(NTCCabAlbaranVenta::className(), ['idNTC_CabAlbaranVenta' => 'fkNTC_CabAlbaranVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCArticulo()
    {
        return $this->hasOne(NTCArticulo::className(), ['idNTC_Articulo' => 'fkNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCVariante()
    {
        return $this->hasOne(NTCVariante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
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
    public function getFkNTCLineaVenta()
    {
        return $this->hasOne(NTCLineaVenta::className(), ['idNTC_LineaVenta' => 'fkNTC_LineaVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaFacturaVentas()
    {
        return $this->hasMany(NTCLineaFacturaVenta::className(), ['fkNTC_LineaAlbaranVenta' => 'idNTC_LineaAlbaranVenta']);
    }
}
