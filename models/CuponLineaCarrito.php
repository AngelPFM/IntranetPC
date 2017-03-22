<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CuponLineaCarrito".
 *
 * @property integer $fkNTC_LineaCarrito
 * @property integer $fkNTC_CuponDescuento
 * @property integer $Aplicado
 *
 * @property NTCLineaCarrito $fkNTCLineaCarrito
 * @property NTCCuponDescuento $fkNTCCuponDescuento
 */
class NTCCuponLineaCarrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CuponLineaCarrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_LineaCarrito', 'fkNTC_CuponDescuento'], 'required'],
            [['fkNTC_LineaCarrito', 'fkNTC_CuponDescuento', 'Aplicado'], 'integer'],
            [['fkNTC_LineaCarrito'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLineaCarrito::className(), 'targetAttribute' => ['fkNTC_LineaCarrito' => 'idNTC_LineaCarrito']],
            [['fkNTC_CuponDescuento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCuponDescuento::className(), 'targetAttribute' => ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fkNTC_LineaCarrito' => 'Fk Ntc  Linea Carrito',
            'fkNTC_CuponDescuento' => 'Fk Ntc  Cupon Descuento',
            'Aplicado' => 'Aplicado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLineaCarrito()
    {
        return $this->hasOne(NTCLineaCarrito::className(), ['idNTC_LineaCarrito' => 'fkNTC_LineaCarrito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCuponDescuento()
    {
        return $this->hasOne(NTCCuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento']);
    }
}
