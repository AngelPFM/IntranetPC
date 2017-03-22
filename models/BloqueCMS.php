<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_BloqueCMS".
 *
 * @property integer $idNTC_BloqueCMS
 * @property integer $fkNTC_Menu
 * @property string $Nombre
 * @property string $Titulo
 * @property string $Frase
 * @property string $Descripcion
 * @property integer $Independiente
 * @property integer $Ancho
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCMenu $fkNTCMenu
 */
class NTCBloqueCMS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_BloqueCMS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Menu', 'Nombre', 'Orden'], 'required'],
            [['fkNTC_Menu', 'Independiente', 'Ancho', 'Orden', 'Quitar'], 'integer'],
            [['Descripcion'], 'string'],
            [['Nombre'], 'string', 'max' => 30],
            [['Titulo'], 'string', 'max' => 100],
            [['Frase'], 'string', 'max' => 255],
            [['fkNTC_Menu'], 'exist', 'skipOnError' => true, 'targetClass' => NTCMenu::className(), 'targetAttribute' => ['fkNTC_Menu' => 'idNTC_Menu']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_BloqueCMS' => 'Id Ntc  Bloque Cms',
            'fkNTC_Menu' => 'Fk Ntc  Menu',
            'Nombre' => 'Nombre',
            'Titulo' => 'Titulo',
            'Frase' => 'Frase',
            'Descripcion' => 'Descripcion',
            'Independiente' => 'Independiente',
            'Ancho' => 'Ancho',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCMenu()
    {
        return $this->hasOne(NTCMenu::className(), ['idNTC_Menu' => 'fkNTC_Menu']);
    }
}
