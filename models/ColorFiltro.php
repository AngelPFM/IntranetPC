<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ColorFiltro".
 *
 * @property integer $idNTC_ColorFiltro
 * @property string $Nombre
 * @property string $CodigoColor
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCArticuloColorFiltro[] $nTCArticuloColorFiltros
 */
class ColorFiltro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ColorFiltro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'CodigoColor'], 'required'],
            [['Orden', 'Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['CodigoColor'], 'string', 'max' => 6],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ColorFiltro' => 'Id Ntc  Color Filtro',
            'Nombre' => 'Nombre',
            'CodigoColor' => 'Codigo Color',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloColorFiltros()
    {
        return $this->hasMany(NTCArticuloColorFiltro::className(), ['fkNTC_ColorFiltro' => 'idNTC_ColorFiltro']);
    }
}
