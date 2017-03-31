<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CuponLineaVenta".
 *
 * @property integer $fkNTC_LineaVenta
 * @property integer $fkNTC_CuponDescuento
 * @property integer $Aplicado
 *
 * @property NTCLineaVenta $fkNTCLineaVenta
 * @property NTCCuponDescuento $fkNTCCuponDescuento
 */
class CuponLineaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CuponLineaVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_LineaVenta', 'fkNTC_CuponDescuento'], 'required'],
            [['fkNTC_LineaVenta', 'fkNTC_CuponDescuento', 'Aplicado'], 'integer'],
            [['fkNTC_LineaVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLineaVenta::className(), 'targetAttribute' => ['fkNTC_LineaVenta' => 'idNTC_LineaVenta']],
            [['fkNTC_CuponDescuento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCuponDescuento::className(), 'targetAttribute' => ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fkNTC_LineaVenta' => 'Fk Ntc  Linea Venta',
            'fkNTC_CuponDescuento' => 'Fk Ntc  Cupon Descuento',
            'Aplicado' => 'Aplicado',
        ];
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
    public function getCuponDescuento()
    {
        return $this->hasOne(CuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento']);
    }
}
