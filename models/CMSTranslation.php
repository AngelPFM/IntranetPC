<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CMSTranslation".
 *
 * @property integer $idNTC_CMSTranslation
 * @property string $TableName
 * @property integer $fkTable
 * @property string $FieldName
 * @property string $Language
 * @property string $Translation
 */
class NTCCMSTranslation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CMSTranslation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TableName', 'fkTable', 'FieldName', 'Language', 'Translation'], 'required'],
            [['fkTable'], 'integer'],
            [['Translation'], 'string'],
            [['TableName', 'FieldName'], 'string', 'max' => 80],
            [['Language'], 'string', 'max' => 5],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_CMSTranslation' => 'Id Ntc  Cmstranslation',
            'TableName' => 'Table Name',
            'fkTable' => 'Fk Table',
            'FieldName' => 'Field Name',
            'Language' => 'Language',
            'Translation' => 'Translation',
        ];
    }
}
