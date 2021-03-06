<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Mensaje_copy2".
 *
 * @property integer $idNTC_Mensaje
 * @property integer $fkNTC_OrigenMensaje
 * @property string $Language
 * @property string $Translation
 */
class MensajeCopy2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Mensaje_copy2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_OrigenMensaje'], 'integer'],
            [['Translation'], 'string'],
            [['Language'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Mensaje' => 'Id Ntc  Mensaje',
            'fkNTC_OrigenMensaje' => 'Fk Ntc  Origen Mensaje',
            'Language' => 'Language',
            'Translation' => 'Translation',
        ];
    }
}
