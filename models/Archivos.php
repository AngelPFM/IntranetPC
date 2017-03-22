<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Archivos".
 *
 * @property integer $idNTC_Archivos
 * @property string $Nombre
 *
 * @property NTCFichero[] $nTCFicheroes
 */
class NTCArchivos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Archivos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Archivos' => 'Id Ntc  Archivos',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCFicheroes()
    {
        return $this->hasMany(NTCFichero::className(), ['fkNTC_Archivos' => 'idNTC_Archivos']);
    }
}
