<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoDatosAtributo".
 *
 * @property integer $idNTC_TipoDatosAtributo
 * @property string $Nombre
 * @property integer $Quitar
 *
 * @property NTCAtributo[] $nTCAtributos
 */
class TipoDatosAtributo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoDatosAtributo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoDatosAtributo' => 'Id Ntc  Tipo Datos Atributo',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtributos()
    {
        return $this->hasMany(Atributo::className(), ['fkNTC_TipoDatosAtributo' => 'idNTC_TipoDatosAtributo']);
    }
}
