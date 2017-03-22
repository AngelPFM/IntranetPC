<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Etiqueta".
 *
 * @property integer $idNTC_Etiqueta
 * @property string $Nombre
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCArticuloEtiqueta[] $nTCArticuloEtiquetas
 */
class NTCEtiqueta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Etiqueta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Orden', 'Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Etiqueta' => 'Id Ntc  Etiqueta',
            'Nombre' => 'Nombre',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloEtiquetas()
    {
        return $this->hasMany(NTCArticuloEtiqueta::className(), ['fkNTC_Etiqueta' => 'idNTC_Etiqueta']);
    }
}
