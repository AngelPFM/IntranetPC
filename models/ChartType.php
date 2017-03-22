<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ChartType".
 *
 * @property integer $idNTC_ChartType
 * @property string $Nombre
 * @property string $GoogleChartsType
 */
class NTCChartType extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ChartType';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'GoogleChartsType'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ChartType' => 'Id Ntc  Chart Type',
            'Nombre' => 'Nombre',
            'GoogleChartsType' => 'Google Charts Type',
        ];
    }
}
