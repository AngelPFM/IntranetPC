<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoTarifa".
 *
 * @property integer $idNTC_TipoTarifa
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $Quitar
 *
 * @property NTCMetodoEnvio[] $nTCMetodoEnvios
 */
class TipoTarifa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoTarifa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 80],
            [['Descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoTarifa' => 'Id Ntc  Tipo Tarifa',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMetodoEnvios()
    {
        return $this->hasMany(MetodoEnvio::className(), ['fkNTC_TipoTarifa' => 'idNTC_TipoTarifa']);
    }
}
