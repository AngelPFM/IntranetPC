<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LineaDevolucionVenta".
 *
 * @property integer $idNTC_LineaAlbaranVenta
 * @property integer $fkNTC_CabDevolucionVenta
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Almacen
 * @property integer $fkNTC_Variante
 * @property double $Cantidad
 * @property string $Descripcion
 * @property double $CantidadRecibida
 * @property double $CantidadPdteRecibir
 * @property string $Comentario
 *
 * @property NTCCabDevolucionVenta $fkNTCCabDevolucionVenta
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCVariante $fkNTCVariante
 */
class LineaDevolucionVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LineaDevolucionVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_CabDevolucionVenta', 'fkNTC_Articulo', 'fkNTC_Almacen', 'Cantidad', 'CantidadRecibida', 'CantidadPdteRecibir'], 'required'],
            [['fkNTC_CabDevolucionVenta', 'fkNTC_Articulo', 'fkNTC_Almacen', 'fkNTC_Variante'], 'integer'],
            [['Cantidad', 'CantidadRecibida', 'CantidadPdteRecibir'], 'number'],
            [['Comentario'], 'string'],
            [['Descripcion'], 'string', 'max' => 150],
            [['fkNTC_CabDevolucionVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCabDevolucionVenta::className(), 'targetAttribute' => ['fkNTC_CabDevolucionVenta' => 'idNTC_CabDevolucionVenta']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_LineaAlbaranVenta' => 'Id Ntc  Linea Albaran Venta',
            'fkNTC_CabDevolucionVenta' => 'Fk Ntc  Cab Devolucion Venta',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'Cantidad' => 'Cantidad',
            'Descripcion' => 'Descripcion',
            'CantidadRecibida' => 'Cantidad Recibida',
            'CantidadPdteRecibir' => 'Cantidad Pdte Recibir',
            'Comentario' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabDevolucionVenta()
    {
        return $this->hasOne(CabDevolucionVenta::className(), ['idNTC_CabDevolucionVenta' => 'fkNTC_CabDevolucionVenta']);
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
    public function getAlmacen()
    {
        return $this->hasOne(Almacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getVariante()
    {
        return $this->hasOne(Variante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
    }
}
