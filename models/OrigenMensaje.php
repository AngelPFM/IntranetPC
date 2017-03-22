<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_OrigenMensaje".
 *
 * @property integer $idNTC_OrigenMensaje
 * @property string $Category
 * @property string $Message
 */
class OrigenMensaje extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_OrigenMensaje';
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
            'idNTC_OrigenMensaje' => 'Id Ntc  Origen Mensaje',
            'Category' => 'Category',
            'Message' => 'Message',
        ];
    }
}
