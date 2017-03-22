<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ValorAtributo".
 *
 * @property integer $idNTC_ValorAtributo
 * @property string $Valor
 * @property integer $fkNTC_Atributo
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_OpcionAtributo
 */
class NTCValorAtributo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ValorAtributo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Atributo', 'fkNTC_Articulo', 'fkNTC_OpcionAtributo'], 'integer'],
            [['fkNTC_Articulo'], 'required'],
            [['Valor'], 'string', 'max' => 255],
            [['fkNTC_Atributo', 'fkNTC_Articulo'], 'unique', 'targetAttribute' => ['fkNTC_Atributo', 'fkNTC_Articulo'], 'message' => 'The combination of Fk Ntc  Atributo and Fk Ntc  Articulo has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ValorAtributo' => 'Id Ntc  Valor Atributo',
            'Valor' => 'Valor',
            'fkNTC_Atributo' => 'Fk Ntc  Atributo',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_OpcionAtributo' => 'Fk Ntc  Opcion Atributo',
        ];
    }
}
