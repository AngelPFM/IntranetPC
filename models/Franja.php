<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Franja".
 *
 * @property integer $idNTC_Franja
 * @property double $PrecioxPar
 * @property double $Incremento
 * @property integer $Quitar
 */
class Franja extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Franja';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['PrecioxPar', 'Incremento'], 'number'],
            [['Quitar'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Franja' => 'Id Ntc  Franja',
            'PrecioxPar' => 'Preciox Par',
            'Incremento' => 'Incremento',
            'Quitar' => 'Quitar',
        ];
    }
}
