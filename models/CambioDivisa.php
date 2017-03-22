<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CambioDivisa".
 *
 * @property integer $idNTC_CambioDivisa
 * @property integer $fkNTC_Divisa1
 * @property integer $fkNTC_Divisa2
 * @property string $Nombre
 * @property double $Cambio
 *
 * @property NTCDivisa $fkNTCDivisa1
 * @property NTCDivisa $fkNTCDivisa2
 */
class CambioDivisa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CambioDivisa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Divisa1', 'fkNTC_Divisa2', 'Nombre'], 'required'],
            [['fkNTC_Divisa1', 'fkNTC_Divisa2'], 'integer'],
            [['Cambio'], 'number'],
            [['Nombre'], 'string', 'max' => 50],
            [['fkNTC_Divisa1', 'fkNTC_Divisa2'], 'unique', 'targetAttribute' => ['fkNTC_Divisa1', 'fkNTC_Divisa2'], 'message' => 'The combination of Fk Ntc  Divisa1 and Fk Ntc  Divisa2 has already been taken.'],
            [['fkNTC_Divisa1'], 'unique'],
            [['fkNTC_Divisa2'], 'unique'],
            [['fkNTC_Divisa1'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa1' => 'idNTC_Divisa']],
            [['fkNTC_Divisa2'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa2' => 'idNTC_Divisa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_CambioDivisa' => 'Id Ntc  Cambio Divisa',
            'fkNTC_Divisa1' => 'Fk Ntc  Divisa1',
            'fkNTC_Divisa2' => 'Fk Ntc  Divisa2',
            'Nombre' => 'Nombre',
            'Cambio' => 'Cambio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa1()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa2()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa2']);
    }
}
