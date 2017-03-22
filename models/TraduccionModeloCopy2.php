<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TraduccionModelo_copy2".
 *
 * @property integer $idNTC_TraduccionModelo
 * @property string $fkNTC_Idioma
 * @property string $Modelo
 * @property string $idModelo
 * @property string $Campo
 * @property string $Traduccion
 */
class NTCTraduccionModeloCopy2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TraduccionModelo_copy2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Traduccion'], 'string'],
            [['fkNTC_Idioma'], 'string', 'max' => 2],
            [['Modelo', 'idModelo', 'Campo'], 'string', 'max' => 50],
            [['fkNTC_Idioma', 'Modelo', 'idModelo', 'Campo'], 'unique', 'targetAttribute' => ['fkNTC_Idioma', 'Modelo', 'idModelo', 'Campo'], 'message' => 'The combination of Fk Ntc  Idioma, Modelo, Id Modelo and Campo has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TraduccionModelo' => 'Id Ntc  Traduccion Modelo',
            'fkNTC_Idioma' => 'Fk Ntc  Idioma',
            'Modelo' => 'Modelo',
            'idModelo' => 'Id Modelo',
            'Campo' => 'Campo',
            'Traduccion' => 'Traduccion',
        ];
    }
}
