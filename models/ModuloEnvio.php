<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ModuloEnvio".
 *
 * @property integer $idNTC_ModuloEnvio
 * @property string $Nombre
 * @property integer $Quitar
 *
 * @property NTCModuloEnvioProvincia[] $nTCModuloEnvioProvincias
 * @property NTCTarifaEnvio[] $nTCTarifaEnvios
 */
class ModuloEnvio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ModuloEnvio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Quitar'], 'required'],
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
            'idNTC_ModuloEnvio' => 'Id Ntc  Modulo Envio',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getModuloEnvioProvincias()
    {
        return $this->hasMany(ModuloEnvioProvincia::className(), ['fkNTC_ModuloEnvio' => 'idNTC_ModuloEnvio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifaEnvios()
    {
        return $this->hasMany(TarifaEnvio::className(), ['fkNTC_ModuloEnvio' => 'idNTC_ModuloEnvio']);
    }
}
