<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_DetalleVariante".
 *
 * @property integer $idNTC_DetalleVariante
 * @property integer $fkNTC_Variante
 * @property integer $fkNTC_Atributo
 * @property integer $Orden
 * @property integer $fkNTC_OpcionAtributo
 *
 * @property NTCVariante $fkNTCVariante
 */
class NTCDetalleVariante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_DetalleVariante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Variante', 'fkNTC_Atributo', 'Orden', 'fkNTC_OpcionAtributo'], 'required'],
            [['fkNTC_Variante', 'fkNTC_Atributo', 'Orden', 'fkNTC_OpcionAtributo'], 'integer'],
            [['fkNTC_Variante', 'fkNTC_Atributo', 'fkNTC_OpcionAtributo'], 'unique', 'targetAttribute' => ['fkNTC_Variante', 'fkNTC_Atributo', 'fkNTC_OpcionAtributo'], 'message' => 'The combination of Fk Ntc  Variante, Fk Ntc  Atributo and Fk Ntc  Opcion Atributo has already been taken.'],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_DetalleVariante' => 'Id Ntc  Detalle Variante',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'fkNTC_Atributo' => 'Fk Ntc  Atributo',
            'Orden' => 'Orden',
            'fkNTC_OpcionAtributo' => 'Fk Ntc  Opcion Atributo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCVariante()
    {
        return $this->hasOne(NTCVariante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
    }
}
