<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LineaFacturaVenta".
 *
 * @property integer $idNTC_LineaFacturaVenta
 * @property integer $fkNTC_CabFacturaVenta
 * @property integer $fkNTC_LineaVenta
 * @property integer $fkNTC_LineaAlbaranVenta
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Variante
 * @property double $Cantidad
 * @property string $Descripcion
 * @property double $Importe
 * @property double $ImporteIva
 * @property double $Descuento
 *
 * @property NTCCabFacturaVenta $fkNTCCabFacturaVenta
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCVariante $fkNTCVariante
 * @property NTCLineaVenta $fkNTCLineaVenta
 * @property NTCLineaAlbaranVenta $fkNTCLineaAlbaranVenta
 */
class LineaFacturaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LineaFacturaVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_CabFacturaVenta', 'fkNTC_LineaVenta', 'fkNTC_LineaAlbaranVenta', 'fkNTC_Articulo', 'Cantidad', 'Importe', 'ImporteIva'], 'required'],
            [['fkNTC_CabFacturaVenta', 'fkNTC_LineaVenta', 'fkNTC_LineaAlbaranVenta', 'fkNTC_Articulo', 'fkNTC_Variante'], 'integer'],
            [['Cantidad', 'Importe', 'ImporteIva', 'Descuento'], 'number'],
            [['Descripcion'], 'string', 'max' => 150],
            [['fkNTC_CabFacturaVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCabFacturaVenta::className(), 'targetAttribute' => ['fkNTC_CabFacturaVenta' => 'idNTC_CabFacturaVenta']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
            [['fkNTC_LineaVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLineaVenta::className(), 'targetAttribute' => ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']],
            [['fkNTC_LineaAlbaranVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLineaAlbaranVenta::className(), 'targetAttribute' => ['fkNTC_LineaAlbaranVenta' => 'idNTC_LineaAlbaranVenta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_LineaFacturaVenta' => 'Id Ntc  Linea Factura Venta',
            'fkNTC_CabFacturaVenta' => 'Fk Ntc  Cab Factura Venta',
            'fkNTC_LineaVenta' => 'Fk Ntc  Linea Venta',
            'fkNTC_LineaAlbaranVenta' => 'Fk Ntc  Linea Albaran Venta',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripcion',
            'Importe' => 'Importe',
            'ImporteIva' => 'Importe Iva',
            'Descuento' => 'Descuento',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVenta()
    {
        return $this->hasOne(CabFacturaVenta::className(), ['idNTC_CabFacturaVenta' => 'fkNTC_CabFacturaVenta']);
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
    public function getVariante()
    {
        return $this->hasOne(Variante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaVenta()
    {
        return $this->hasOne(LineaVenta::className(), ['idNTC_LineaVenta' => 'fkNTC_LineaVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaAlbaranVenta()
    {
        return $this->hasOne(LineaAlbaranVenta::className(), ['idNTC_LineaAlbaranVenta' => 'fkNTC_LineaAlbaranVenta']);
    }
}
