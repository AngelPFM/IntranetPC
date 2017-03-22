<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Portes".
 *
 * @property integer $idNTC_Portes
 * @property string $Nombre
 * @property double $Valor
 * @property integer $Default
 * @property string $Texto
 * @property integer $Quitar
 */
class Portes extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Portes';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Valor'], 'number'],
            [['Default'], 'required'],
            [['Default', 'Quitar'], 'integer'],
            [['Texto'], 'string'],
            [['Nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Portes' => 'Id Ntc  Portes',
            'Nombre' => 'Nombre',
            'Valor' => 'Valor',
            'Default' => 'Default',
            'Texto' => 'Texto',
            'Quitar' => 'Quitar',
        ];
    }
}
