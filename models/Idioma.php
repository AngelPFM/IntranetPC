<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Idioma".
 *
 * @property string $idNTC_Idioma
 * @property string $Nombre
 * @property integer $Activo
 * @property integer $Quitar
 *
 * @property NTCCliente[] $nTCClientes
 * @property NTCEstaticosCMS[] $nTCEstaticosCMSs
 * @property NTCGetResponseConfig[] $nTCGetResponseConfigs
 * @property NTCPais[] $nTCPais
 * @property NTCScriptMarketing[] $nTCScriptMarketings
 */
class NTCIdioma extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Idioma';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Idioma', 'Nombre'], 'required'],
            [['Activo', 'Quitar'], 'integer'],
            [['idNTC_Idioma'], 'string', 'max' => 2],
            [['Nombre'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Idioma' => 'Id Ntc  Idioma',
            'Nombre' => 'Nombre',
            'Activo' => 'Activo',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCEstaticosCMSs()
    {
        return $this->hasMany(NTCEstaticosCMS::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCGetResponseConfigs()
    {
        return $this->hasMany(NTCGetResponseConfig::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCPais()
    {
        return $this->hasMany(NTCPais::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCScriptMarketings()
    {
        return $this->hasMany(NTCScriptMarketing::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }
}
