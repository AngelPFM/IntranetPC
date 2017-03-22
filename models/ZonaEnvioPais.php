<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ZonaEnvioPais".
 *
 * @property integer $idNTC_ZonaEnvioPais
 * @property integer $fkNTC_ZonaEnvio
 * @property integer $fkNTC_Pais
 */
class NTCZonaEnvioPais extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ZonaEnvioPais';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_ZonaEnvio', 'fkNTC_Pais'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ZonaEnvioPais' => 'Id Ntc  Zona Envio Pais',
            'fkNTC_ZonaEnvio' => 'Fk Ntc  Zona Envio',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
        ];
    }
}
