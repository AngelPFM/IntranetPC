<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_OrigenMensajeIntranet".
 *
 * @property integer $idNTC_OrigenMensajeIntranet
 * @property string $Category
 * @property string $Message
 *
 * @property NTCMensajeIntranet[] $nTCMensajeIntranets
 */
class NTCOrigenMensajeIntranet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_OrigenMensajeIntranet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Message'], 'string'],
            [['Category'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_OrigenMensajeIntranet' => 'Id Ntc  Origen Mensaje Intranet',
            'Category' => 'Category',
            'Message' => 'Message',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMensajeIntranets()
    {
        return $this->hasMany(NTCMensajeIntranet::className(), ['fkNTC_OrigenMensajeIntranet' => 'idNTC_OrigenMensajeIntranet']);
    }
}