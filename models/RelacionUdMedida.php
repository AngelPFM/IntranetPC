<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_RelacionUdMedida".
 *
 * @property integer $idNTC_RelacionUdMedida
 * @property integer $fkNTC_UdMedida1
 * @property integer $fkNTC_UdMedida2
 * @property string $Nombre
 * @property double $Relacion
 *
 * @property NTCUnidadMedida $fkNTCUdMedida1
 * @property NTCUnidadMedida $fkNTCUdMedida2
 */
class NTCRelacionUdMedida extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_RelacionUdMedida';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_UdMedida1', 'fkNTC_UdMedida2', 'Nombre', 'Relacion'], 'required'],
            [['fkNTC_UdMedida1', 'fkNTC_UdMedida2'], 'integer'],
            [['Relacion'], 'number'],
            [['Nombre'], 'string', 'max' => 80],
            [['fkNTC_UdMedida1'], 'exist', 'skipOnError' => true, 'targetClass' => NTCUnidadMedida::className(), 'targetAttribute' => ['fkNTC_UdMedida1' => 'idNTC_UnidadMedida']],
            [['fkNTC_UdMedida2'], 'exist', 'skipOnError' => true, 'targetClass' => NTCUnidadMedida::className(), 'targetAttribute' => ['fkNTC_UdMedida2' => 'idNTC_UnidadMedida']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_RelacionUdMedida' => 'Id Ntc  Relacion Ud Medida',
            'fkNTC_UdMedida1' => 'Fk Ntc  Ud Medida1',
            'fkNTC_UdMedida2' => 'Fk Ntc  Ud Medida2',
            'Nombre' => 'Nombre',
            'Relacion' => 'Relacion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCUdMedida1()
    {
        return $this->hasOne(NTCUnidadMedida::className(), ['idNTC_UnidadMedida' => 'fkNTC_UdMedida1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCUdMedida2()
    {
        return $this->hasOne(NTCUnidadMedida::className(), ['idNTC_UnidadMedida' => 'fkNTC_UdMedida2']);
    }
}
