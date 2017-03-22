<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LineaAbonoVenta".
 *
 * @property integer $idNTC_LineaFacturaVenta
 * @property integer $fkNTC_CabAbonoVenta
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Variante
 * @property double $Cantidad
 * @property string $Descripcion
 * @property double $Importe
 * @property double $CantidadPdteFacturar
 * @property double $ImporteIva
 *
 * @property NTCCabAbonoVenta $fkNTCCabAbonoVenta
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCVariante $fkNTCVariante
 */
class NTCLineaAbonoVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LineaAbonoVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_CabAbonoVenta', 'fkNTC_Articulo', 'Cantidad', 'Importe', 'CantidadPdteFacturar', 'ImporteIva'], 'required'],
            [['fkNTC_CabAbonoVenta', 'fkNTC_Articulo', 'fkNTC_Variante'], 'integer'],
            [['Cantidad', 'Importe', 'CantidadPdteFacturar', 'ImporteIva'], 'number'],
            [['Descripcion'], 'string', 'max' => 150],
            [['fkNTC_CabAbonoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCabAbonoVenta::className(), 'targetAttribute' => ['fkNTC_CabAbonoVenta' => 'idNTC_CabAbonoVenta']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_LineaFacturaVenta' => 'Id Ntc  Linea Factura Venta',
            'fkNTC_CabAbonoVenta' => 'Fk Ntc  Cab Abono Venta',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripcion',
            'Importe' => 'Importe',
            'CantidadPdteFacturar' => 'Cantidad Pdte Facturar',
            'ImporteIva' => 'Importe Iva',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCabAbonoVenta()
    {
        return $this->hasOne(NTCCabAbonoVenta::className(), ['idNTC_CabAbonoVenta' => 'fkNTC_CabAbonoVenta']);
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
}
