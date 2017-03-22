<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_FusionPedidos".
 *
 * @property integer $idNTC_FusionPedidos
 * @property string $Fecha
 */
class FusionPedidos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_FusionPedidos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_FusionPedidos' => 'Id Ntc  Fusion Pedidos',
            'Fecha' => 'Fecha',
        ];
    }
}
