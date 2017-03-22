<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_AtributoConjunto".
 *
 * @property integer $idNTC_AtributoConjunto
 * @property integer $fkNTC_Atributo
 * @property integer $fkNTC_ConjuntoAtributos
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCAtributo $fkNTCAtributo
 * @property NTCConjuntoAtributos $fkNTCConjuntoAtributos
 */
class NTCAtributoConjunto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_AtributoConjunto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Atributo', 'fkNTC_ConjuntoAtributos', 'Orden'], 'required'],
            [['fkNTC_Atributo', 'fkNTC_ConjuntoAtributos', 'Orden', 'Quitar'], 'integer'],
            [['fkNTC_Atributo', 'fkNTC_ConjuntoAtributos'], 'unique', 'targetAttribute' => ['fkNTC_Atributo', 'fkNTC_ConjuntoAtributos'], 'message' => 'The combination of Fk Ntc  Atributo and Fk Ntc  Conjunto Atributos has already been taken.'],
            [['fkNTC_Atributo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAtributo::className(), 'targetAttribute' => ['fkNTC_Atributo' => 'idNTC_Atributo']],
            [['fkNTC_ConjuntoAtributos'], 'exist', 'skipOnError' => true, 'targetClass' => NTCConjuntoAtributos::className(), 'targetAttribute' => ['fkNTC_ConjuntoAtributos' => 'idNTC_ConjuntoAtributos']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_AtributoConjunto' => 'Id Ntc  Atributo Conjunto',
            'fkNTC_Atributo' => 'Fk Ntc  Atributo',
            'fkNTC_ConjuntoAtributos' => 'Fk Ntc  Conjunto Atributos',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCAtributo()
    {
        return $this->hasOne(NTCAtributo::className(), ['idNTC_Atributo' => 'fkNTC_Atributo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCConjuntoAtributos()
    {
        return $this->hasOne(NTCConjuntoAtributos::className(), ['idNTC_ConjuntoAtributos' => 'fkNTC_ConjuntoAtributos']);
    }
}
