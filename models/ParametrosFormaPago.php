<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ParametrosFormaPago".
 *
 * @property integer $idNTC_ParametrosFormaPago
 * @property integer $fkNTC_FormaPago
 * @property string $Nombre
 * @property string $Valor
 * @property integer $Quitar
 */
class ParametrosFormaPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ParametrosFormaPago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_FormaPago', 'Nombre'], 'required'],
            [['fkNTC_FormaPago', 'Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['Valor'], 'string', 'max' => 255],
            [['fkNTC_FormaPago', 'Nombre'], 'unique', 'targetAttribute' => ['fkNTC_FormaPago', 'Nombre'], 'message' => 'The combination of Fk Ntc  Forma Pago and Nombre has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ParametrosFormaPago' => 'Id Ntc  Parametros Forma Pago',
            'fkNTC_FormaPago' => 'Fk Ntc  Forma Pago',
            'Nombre' => 'Nombre',
            'Valor' => 'Valor',
            'Quitar' => 'Quitar',
        ];
    }
}
