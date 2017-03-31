<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_RelacionDivisa".
 *
 * @property integer $idNTC_RelacionDivisa
 * @property integer $fkNTC_Divisa1
 * @property integer $fkNTC_Divisa2
 * @property string $Nombre
 * @property double $Relacion
 * @property string $FechaActualizacion
 * @property integer $Quitar
 *
 * @property NTCDivisa $fkNTCDivisa1
 * @property NTCDivisa $fkNTCDivisa2
 */
class RelacionDivisa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_RelacionDivisa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Divisa1', 'fkNTC_Divisa2', 'Nombre'], 'required'],
            [['fkNTC_Divisa1', 'fkNTC_Divisa2', 'Quitar'], 'integer'],
            [['Relacion'], 'number'],
            [['FechaActualizacion'], 'safe'],
            [['Nombre'], 'string', 'max' => 80],
            [['fkNTC_Divisa1'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa1' => 'idNTC_Divisa']],
            [['fkNTC_Divisa2'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa2' => 'idNTC_Divisa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_RelacionDivisa' => 'Id Ntc  Relacion Divisa',
            'fkNTC_Divisa1' => 'Fk Ntc  Divisa1',
            'fkNTC_Divisa2' => 'Fk Ntc  Divisa2',
            'Nombre' => 'Nombre',
            'Relacion' => 'Relacion',
            'FechaActualizacion' => 'Fecha Actualizacion',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisa1()
    {
        return $this->hasOne(Divisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa1']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisa2()
    {
        return $this->hasOne(Divisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa2']);
    }
}
