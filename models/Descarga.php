<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Descarga".
 *
 * @property integer $idNTC_Descarga
 * @property integer $TipoDescarga
 * @property string $Fecha
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $Url
 * @property integer $Quitar
 */
class NTCDescarga extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Descarga';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['TipoDescarga', 'Quitar'], 'integer'],
            [['Fecha', 'Titulo'], 'required'],
            [['Fecha'], 'safe'],
            [['Descripcion'], 'string'],
            [['Titulo'], 'string', 'max' => 150],
            [['Url'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Descarga' => 'Id Ntc  Descarga',
            'TipoDescarga' => 'Tipo Descarga',
            'Fecha' => 'Fecha',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Url' => 'Url',
            'Quitar' => 'Quitar',
        ];
    }
}
