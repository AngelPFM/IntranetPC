<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_MensajeIntranet".
 *
 * @property integer $idNTC_MensajeIntranet
 * @property integer $fkNTC_OrigenMensajeIntranet
 * @property string $Language
 * @property string $Translation
 *
 * @property NTCOrigenMensajeIntranet $fkNTCOrigenMensajeIntranet
 */
class NTCMensajeIntranet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_MensajeIntranet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_OrigenMensajeIntranet'], 'integer'],
            [['Translation'], 'string'],
            [['Language'], 'string', 'max' => 50],
            [['fkNTC_OrigenMensajeIntranet'], 'exist', 'skipOnError' => true, 'targetClass' => NTCOrigenMensajeIntranet::className(), 'targetAttribute' => ['fkNTC_OrigenMensajeIntranet' => 'idNTC_OrigenMensajeIntranet']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_MensajeIntranet' => 'Id Ntc  Mensaje Intranet',
            'fkNTC_OrigenMensajeIntranet' => 'Fk Ntc  Origen Mensaje Intranet',
            'Language' => 'Language',
            'Translation' => 'Translation',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCOrigenMensajeIntranet()
    {
        return $this->hasOne(NTCOrigenMensajeIntranet::className(), ['idNTC_OrigenMensajeIntranet' => 'fkNTC_OrigenMensajeIntranet']);
    }
}
