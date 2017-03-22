<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoUsuarioWeb".
 *
 * @property integer $idNTC_TipoUsuarioWeb
 * @property string $TipoUsuarioWeb
 * @property integer $Profesional
 */
class TipoUsuarioWeb extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoUsuarioWeb';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TipoUsuarioWeb'], 'required'],
            [['Profesional'], 'integer'],
            [['TipoUsuarioWeb'], 'string', 'max' => 30],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoUsuarioWeb' => 'Id Ntc  Tipo Usuario Web',
            'TipoUsuarioWeb' => 'Tipo Usuario Web',
            'Profesional' => 'Profesional',
        ];
    }
}
