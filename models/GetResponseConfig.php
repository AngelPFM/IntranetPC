<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_GetResponseConfig".
 *
 * @property integer $idNTC_GetResponseConfig
 * @property string $fkNTC_Idioma
 * @property integer $fkNTC_Pais
 * @property string $Campaign
 * @property string $APIUrl
 * @property string $APIKey
 * @property integer $Quitar
 *
 * @property NTCIdioma $fkNTCIdioma
 * @property NTCPais $fkNTCPais
 * @property NTCSuscripcion[] $nTCSuscripcions
 */
class GetResponseConfig extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_GetResponseConfig';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Idioma', 'Campaign', 'APIUrl', 'APIKey'], 'required'],
            [['fkNTC_Pais', 'Quitar'], 'integer'],
            [['fkNTC_Idioma'], 'string', 'max' => 2],
            [['Campaign', 'APIUrl', 'APIKey'], 'string', 'max' => 255],
            [['fkNTC_Idioma'], 'exist', 'skipOnError' => true, 'targetClass' => NTCIdioma::className(), 'targetAttribute' => ['fkNTC_Idioma' => 'idNTC_Idioma']],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_GetResponseConfig' => 'Id Ntc  Get Response Config',
            'fkNTC_Idioma' => 'Fk Ntc  Idioma',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Campaign' => 'Campaign',
            'APIUrl' => 'Apiurl',
            'APIKey' => 'Apikey',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdioma()
    {
        return $this->hasOne(Idioma::className(), ['idNTC_Idioma' => 'fkNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasOne(Pais::className(), ['idNTC_Pais' => 'fkNTC_Pais']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSuscripcions()
    {
        return $this->hasMany(Suscripcion::className(), ['fkNTC_GetResponseConfig' => 'idNTC_GetResponseConfig']);
    }
}
