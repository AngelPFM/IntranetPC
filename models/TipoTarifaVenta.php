<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoTarifaVenta".
 *
 * @property integer $idNTC_TipoTarifaVenta
 * @property string $Nombre
 * @property integer $Quitar
 */
class TipoTarifaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoTarifaVenta';
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
            'idNTC_TipoTarifaVenta' => 'Id Ntc  Tipo Tarifa Venta',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }
}
