<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CuponCarrito".
 *
 * @property integer $fkNTC_Carrito
 * @property integer $fkNTC_CuponDescuento
 * @property integer $Aplicado
 *
 * @property NTCCarrito $fkNTCCarrito
 * @property NTCCuponDescuento $fkNTCCuponDescuento
 */
class NTCCuponCarrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CuponCarrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Carrito', 'fkNTC_CuponDescuento'], 'required'],
            [['fkNTC_Carrito', 'fkNTC_CuponDescuento', 'Aplicado'], 'integer'],
            [['fkNTC_Carrito'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCarrito::className(), 'targetAttribute' => ['fkNTC_Carrito' => 'idNTC_Carrito']],
            [['fkNTC_CuponDescuento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCuponDescuento::className(), 'targetAttribute' => ['fkNTC_CuponDescuento' => 'idNTC_CuponDescuento']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fkNTC_Carrito' => 'Fk Ntc  Carrito',
            'fkNTC_CuponDescuento' => 'Fk Ntc  Cupon Descuento',
            'Aplicado' => 'Aplicado',
        ];
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
    public function getFkNTCCuponDescuento()
    {
        return $this->hasOne(NTCCuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento']);
    }
}
