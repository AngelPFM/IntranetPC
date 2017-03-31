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
class Idioma extends \yii\db\ActiveRecord
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
    public function getClientes()
    {
        return $this->hasMany(Cliente::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEstaticosCMSs()
    {
        return $this->hasMany(EstaticosCMS::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGetResponseConfigs()
    {
        return $this->hasMany(GetResponseConfig::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPais()
    {
        return $this->hasMany(Pais::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getScriptMarketings()
    {
        return $this->hasMany(ScriptMarketing::className(), ['fkNTC_Idioma' => 'idNTC_Idioma']);
    }
}
