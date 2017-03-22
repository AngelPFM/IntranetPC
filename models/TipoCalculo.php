<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoCalculo".
 *
 * @property integer $idNTC_TipoCalculo
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $Quitar
 *
 * @property NTCMetodoEnvio[] $nTCMetodoEnvios
 */
class TipoCalculo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoCalculo';
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
            'idNTC_TipoCalculo' => 'Id Ntc  Tipo Calculo',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMetodoEnvios()
    {
        return $this->hasMany(NTCMetodoEnvio::className(), ['fkNTC_TipoCalculo' => 'idNTC_TipoCalculo']);
    }
}
