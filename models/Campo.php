<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Campo".
 *
 * @property integer $idNTC_Campo
 * @property string $Nombre
 * @property integer $Quitar
 * @property integer $fkNTC_Modulo
 * @property integer $fkNTC_Rol
 * @property string $Escenario
 * @property integer $Orden
 *
 * @property NTCModulo $fkNTCModulo
 */
class NTCCampo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Campo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quitar', 'fkNTC_Modulo', 'fkNTC_Rol', 'Orden'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['Escenario'], 'string', 'max' => 50],
            [['fkNTC_Modulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCModulo::className(), 'targetAttribute' => ['fkNTC_Modulo' => 'idNTC_Modulo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Campo' => 'Id Ntc  Campo',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
            'fkNTC_Modulo' => 'Fk Ntc  Modulo',
            'fkNTC_Rol' => 'Fk Ntc  Rol',
            'Escenario' => 'Escenario',
            'Orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCModulo()
    {
        return $this->hasOne(NTCModulo::className(), ['idNTC_Modulo' => 'fkNTC_Modulo']);
    }
}
