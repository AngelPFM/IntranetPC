<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ZonaEnvio".
 *
 * @property integer $idNTC_Zona
 * @property string $Nombre
 *
 * @property NTCTarifaEnvio[] $nTCTarifaEnvios
 */
class NTCZonaEnvio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ZonaEnvio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Zona' => 'Id Ntc  Zona',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTarifaEnvios()
    {
        return $this->hasMany(NTCTarifaEnvio::className(), ['fkNTC_ZonaEnvio' => 'idNTC_Zona']);
    }
}
