<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ConjuntoAtributos".
 *
 * @property integer $idNTC_ConjuntoAtributos
 * @property string $Nombre
 * @property integer $Quitar
 *
 * @property NTCArticulo[] $nTCArticulos
 * @property NTCAtributoConjunto[] $nTCAtributoConjuntos
 * @property NTCAtributo[] $fkNTCAtributos
 */
class ConjuntoAtributos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ConjuntoAtributos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ConjuntoAtributos' => 'Id Ntc  Conjunto Atributos',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['fkNTC_ConjuntoAtributos' => 'idNTC_ConjuntoAtributos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtributoConjuntos()
    {
        return $this->hasMany(AtributoConjunto::className(), ['fkNTC_ConjuntoAtributos' => 'idNTC_ConjuntoAtributos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtributos()
    {
        return $this->hasMany(NTCAtributo::className(), ['idNTC_Atributo' => 'fkNTC_Atributo'])->viaTable('NTC_AtributoConjunto', ['fkNTC_ConjuntoAtributos' => 'idNTC_ConjuntoAtributos']);
    }
}
