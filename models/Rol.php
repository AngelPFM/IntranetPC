<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Rol".
 *
 * @property integer $idNTC_Rol
 * @property integer $Quitar
 * @property string $Nombre
 *
 * @property NTCAccion[] $nTCAccions
 */
class NTCRol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Rol' => 'Id Ntc  Rol',
            'Quitar' => 'Quitar',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCAccions()
    {
        return $this->hasMany(NTCAccion::className(), ['fkNTC_Rol' => 'idNTC_Rol']);
    }
}
