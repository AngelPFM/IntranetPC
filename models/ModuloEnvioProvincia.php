<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ModuloEnvioProvincia".
 *
 * @property integer $pkNTC_ModuloEnvioProvincia
 * @property integer $fkNTC_Provincia
 * @property integer $fkNTC_ModuloEnvio
 *
 * @property NTCModuloEnvio $fkNTCModuloEnvio
 * @property NTCProvincia $fkNTCProvincia
 */
class ModuloEnvioProvincia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ModuloEnvioProvincia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Provincia', 'fkNTC_ModuloEnvio'], 'required'],
            [['fkNTC_Provincia', 'fkNTC_ModuloEnvio'], 'integer'],
            [['fkNTC_ModuloEnvio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCModuloEnvio::className(), 'targetAttribute' => ['fkNTC_ModuloEnvio' => 'idNTC_ModuloEnvio']],
            [['fkNTC_Provincia'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_Provincia' => 'idNTC_Provincia']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'pkNTC_ModuloEnvioProvincia' => 'Pk Ntc  Modulo Envio Provincia',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'fkNTC_ModuloEnvio' => 'Fk Ntc  Modulo Envio',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuloEnvio()
    {
        return $this->hasOne(ModuloEnvio::className(), ['idNTC_ModuloEnvio' => 'fkNTC_ModuloEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProvincia()
    {
        return $this->hasOne(Provincia::className(), ['idNTC_Provincia' => 'fkNTC_Provincia']);
    }
}
