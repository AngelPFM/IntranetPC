<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Log_copy".
 *
 * @property integer $IdNTC_Log
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Files
 * @property string $Fecha
 */
class LogCopy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Log_copy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion', 'Files'], 'string'],
            [['Fecha'], 'safe'],
            [['Nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'IdNTC_Log' => 'Id Ntc  Log',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Files' => 'Files',
            'Fecha' => 'Fecha',
        ];
    }
}
