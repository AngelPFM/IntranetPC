<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_UnidadMedida".
 *
 * @property integer $idNTC_UnidadMedida
 * @property string $Nombre
 *
 * @property NTCMetodoEnvio[] $nTCMetodoEnvios
 * @property NTCRelacionUdMedida[] $nTCRelacionUdMedidas
 * @property NTCRelacionUdMedida[] $nTCRelacionUdMedidas0
 */
class UnidadMedida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_UnidadMedida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_UnidadMedida' => 'Id Ntc  Unidad Medida',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMetodoEnvios()
    {
        return $this->hasMany(NTCMetodoEnvio::className(), ['fkNTC_UnidadMedida' => 'idNTC_UnidadMedida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCRelacionUdMedidas()
    {
        return $this->hasMany(NTCRelacionUdMedida::className(), ['fkNTC_UdMedida1' => 'idNTC_UnidadMedida']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCRelacionUdMedidas0()
    {
        return $this->hasMany(NTCRelacionUdMedida::className(), ['fkNTC_UdMedida2' => 'idNTC_UnidadMedida']);
    }
}
