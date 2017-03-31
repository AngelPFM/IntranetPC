<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_OpcionAtributo".
 *
 * @property integer $idNTC_OpcionAtributo
 * @property integer $fkNTC_Atributo
 * @property string $Nombre
 * @property string $Opcion
 * @property string $Descripcion
 * @property string $Medida
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCArticuloColor[] $nTCArticuloColors
 * @property NTCAtributo $fkNTCAtributo
 */
class OpcionAtributo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_OpcionAtributo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Atributo', 'Orden', 'Quitar'], 'integer'],
            [['Nombre', 'Opcion'], 'string', 'max' => 25],
            [['Descripcion', 'Medida'], 'string', 'max' => 5],
            [['fkNTC_Atributo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAtributo::className(), 'targetAttribute' => ['fkNTC_Atributo' => 'idNTC_Atributo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_OpcionAtributo' => 'Id Ntc  Opcion Atributo',
            'fkNTC_Atributo' => 'Fk Ntc  Atributo',
            'Nombre' => 'Nombre',
            'Opcion' => 'Opcion',
            'Descripcion' => 'Descripcion',
            'Medida' => 'Medida',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloColors()
    {
        return $this->hasMany(ArticuloColor::className(), ['fkNTC_OpcionAtributo' => 'idNTC_OpcionAtributo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAtributo()
    {
        return $this->hasOne(Atributo::className(), ['idNTC_Atributo' => 'fkNTC_Atributo']);
    }
}
