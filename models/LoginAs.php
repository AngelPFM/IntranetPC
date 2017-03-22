<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LoginAs".
 *
 * @property integer $idLoginAs
 * @property integer $fkNTC_Cliente
 * @property string $Session
 * @property integer $Quitar
 *
 * @property NTCCliente $fkNTCCliente
 */
class LoginAs extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LoginAs';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Cliente', 'Quitar'], 'integer'],
            [['Session'], 'string', 'max' => 255],
            [['fkNTC_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_Cliente' => 'idNTC_Cliente']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idLoginAs' => 'Id Login As',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'Session' => 'Session',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCliente()
    {
        return $this->hasOne(NTCCliente::className(), ['idNTC_Cliente' => 'fkNTC_Cliente']);
    }
}
