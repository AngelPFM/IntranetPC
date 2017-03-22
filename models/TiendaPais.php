<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Tienda_Pais".
 *
 * @property integer $idNTC_Tienda_Pais
 * @property integer $fkNTC_Tienda
 * @property integer $fkNTC_Pais
 * @property integer $Quitar
 */
class TiendaPais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Tienda_Pais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Tienda', 'fkNTC_Pais', 'Quitar'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Tienda_Pais' => 'Id Ntc  Tienda  Pais',
            'fkNTC_Tienda' => 'Fk Ntc  Tienda',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Quitar' => 'Quitar',
        ];
    }
}
