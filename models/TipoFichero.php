<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoFichero".
 *
 * @property integer $idNTC_TipoFichero
 * @property string $Tabla
 * @property string $Nombre
 * @property integer $Width
 * @property integer $Height
 * @property integer $MaxWidth
 * @property integer $MaxHeight
 * @property integer $thumbWidth
 * @property integer $thumbHeight
 * @property integer $midWidth
 * @property integer $midHeight
 * @property integer $EsImagen
 */
class TipoFichero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoFichero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Tabla'], 'required'],
            [['Width', 'Height', 'MaxWidth', 'MaxHeight', 'thumbWidth', 'thumbHeight', 'midWidth', 'midHeight', 'EsImagen'], 'integer'],
            [['Tabla', 'Nombre'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoFichero' => 'Id Ntc  Tipo Fichero',
            'Tabla' => 'Tabla',
            'Nombre' => 'Nombre',
            'Width' => 'Width',
            'Height' => 'Height',
            'MaxWidth' => 'Max Width',
            'MaxHeight' => 'Max Height',
            'thumbWidth' => 'Thumb Width',
            'thumbHeight' => 'Thumb Height',
            'midWidth' => 'Mid Width',
            'midHeight' => 'Mid Height',
            'EsImagen' => 'Es Imagen',
        ];
    }
}
