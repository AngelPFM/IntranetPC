<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_EnlaceFichero".
 *
 * @property integer $idNTC_EnlaceFichero
 * @property integer $fkNTC_Fichero
 * @property string $Titulo
 * @property string $Url
 * @property string $HtmlClass
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCFichero $fkNTCFichero
 */
class NTCEnlaceFichero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_EnlaceFichero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Fichero', 'Url', 'Orden'], 'required'],
            [['fkNTC_Fichero', 'Orden', 'Quitar'], 'integer'],
            [['Titulo'], 'string', 'max' => 80],
            [['Url'], 'string', 'max' => 255],
            [['HtmlClass'], 'string', 'max' => 100],
            [['fkNTC_Fichero'], 'exist', 'skipOnError' => true, 'targetClass' => NTCFichero::className(), 'targetAttribute' => ['fkNTC_Fichero' => 'idNTC_Fichero']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_EnlaceFichero' => 'Id Ntc  Enlace Fichero',
            'fkNTC_Fichero' => 'Fk Ntc  Fichero',
            'Titulo' => 'Titulo',
            'Url' => 'Url',
            'HtmlClass' => 'Html Class',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCFichero()
    {
        return $this->hasOne(NTCFichero::className(), ['idNTC_Fichero' => 'fkNTC_Fichero']);
    }
}
