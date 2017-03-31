<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoDescuentoVenta".
 *
 * @property integer $idNTC_TipoDesuentoVenta
 * @property string $Nombre
 * @property integer $Quitar
 *
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 */
class TipoDescuentoVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoDescuentoVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoDesuentoVenta' => 'Id Ntc  Tipo Desuento Venta',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_TipoDescuentoVenta' => 'idNTC_TipoDesuentoVenta']);
    }
}
