<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoValoracion".
 *
 * @property integer $idNTC_TipoValoracion
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $Quitar
 *
 * @property NTCMetodoEnvio[] $nTCMetodoEnvios
 */
class TipoValoracion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoValoracion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 80],
            [['Descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoValoracion' => 'Id Ntc  Tipo Valoracion',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMetodoEnvios()
    {
        return $this->hasMany(NTCMetodoEnvio::className(), ['fkNTC_TipoValoracion' => 'idNTC_TipoValoracion']);
    }
}
