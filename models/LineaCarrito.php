<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LineaCarrito".
 *
 * @property integer $idNTC_LineaCarrito
 * @property integer $fkNTC_Carrito
 * @property integer $fkNTC_LineaVenta
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Lote
 * @property integer $fkNTC_Variante
 * @property double $Cantidad
 * @property integer $Abandonada
 * @property integer $Quitar
 *
 * @property NTCCuponLineaCarrito[] $nTCCuponLineaCarritos
 * @property NTCCuponDescuento[] $fkNTCCuponDescuentos
 * @property NTCLote $fkNTCLote
 * @property NTCCarrito $fkNTCCarrito
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCVariante $fkNTCVariante
 * @property NTCLineaVenta $fkNTCLineaVenta
 */
class NTCLineaCarrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LineaCarrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Carrito', 'Cantidad'], 'required'],
            [['fkNTC_Carrito', 'fkNTC_LineaVenta', 'fkNTC_Articulo', 'fkNTC_Lote', 'fkNTC_Variante', 'Abandonada', 'Quitar'], 'integer'],
            [['Cantidad'], 'number'],
            [['fkNTC_Lote'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLote::className(), 'targetAttribute' => ['fkNTC_Lote' => 'idNTC_Lote']],
            [['fkNTC_Carrito'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCarrito::className(), 'targetAttribute' => ['fkNTC_Carrito' => 'idNTC_Carrito']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
            [['fkNTC_LineaVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLineaVenta::className(), 'targetAttribute' => ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_LineaCarrito' => 'Id Ntc  Linea Carrito',
            'fkNTC_Carrito' => 'Fk Ntc  Carrito',
            'fkNTC_LineaVenta' => 'Fk Ntc  Linea Venta',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Lote' => 'Fk Ntc  Lote',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'Cantidad' => 'Cantidad',
            'Abandonada' => 'Abandonada',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponLineaCarritos()
    {
        return $this->hasMany(NTCCuponLineaCarrito::className(), ['fkNTC_LineaCarrito' => 'idNTC_LineaCarrito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCuponDescuentos()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento'])->viaTable('NTC_CuponLineaCarrito', ['fkNTC_LineaCarrito' => 'idNTC_LineaCarrito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLote()
    {
        return $this->hasOne(NTCLote::className(), ['idNTC_Lote' => 'fkNTC_Lote']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCarrito()
    {
        return $this->hasOne(NTCCarrito::className(), ['idNTC_Carrito' => 'fkNTC_Carrito']);
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
    public function getFkNTCLineaVenta()
    {
        return $this->hasOne(NTCLineaVenta::className(), ['idNTC_LineaVenta' => 'fkNTC_LineaVenta']);
    }
}
