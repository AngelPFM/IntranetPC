<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Accion".
 *
 * @property integer $idNTC_Accion
 * @property string $Nombre
 * @property integer $Quitar
 * @property integer $fkNTC_Modulo
 * @property integer $fkNTC_Rol
 *
 * @property NTCModulo $fkNTCModulo
 * @property NTCRol $fkNTCRol
 */
class NTCAccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Accion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quitar', 'fkNTC_Modulo', 'fkNTC_Rol'], 'integer'],
            [['Nombre'], 'string', 'max' => 255],
            [['fkNTC_Modulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCModulo::className(), 'targetAttribute' => ['fkNTC_Modulo' => 'idNTC_Modulo']],
            [['fkNTC_Rol'], 'exist', 'skipOnError' => true, 'targetClass' => NTCRol::className(), 'targetAttribute' => ['fkNTC_Rol' => 'idNTC_Rol']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Accion' => 'Id Ntc  Accion',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
            'fkNTC_Modulo' => 'Fk Ntc  Modulo',
            'fkNTC_Rol' => 'Fk Ntc  Rol',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCModulo()
    {
        return $this->hasOne(NTCModulo::className(), ['idNTC_Modulo' => 'fkNTC_Modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCRol()
    {
        return $this->hasOne(NTCRol::className(), ['idNTC_Rol' => 'fkNTC_Rol']);
    }
}
