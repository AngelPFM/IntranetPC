<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_EstaticosCMS".
 *
 * @property integer $idNTC_EstaticosCMS
 * @property string $Nombre
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $fkNTC_Idioma
 * @property integer $IsHTML
 * @property integer $EstilosCSS
 * @property integer $Quitar
 * @property string $MetaTitle
 * @property string $MetaDescription
 * @property string $MetaKeywords
 * @property string $MetaRobots
 *
 * @property NTCIdioma $fkNTCIdioma
 */
class EstaticosCMS extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_EstaticosCMS';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Descripcion', 'fkNTC_Idioma'], 'required'],
            [['Descripcion'], 'string'],
            [['IsHTML', 'EstilosCSS', 'Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['Titulo'], 'string', 'max' => 80],
            [['fkNTC_Idioma'], 'string', 'max' => 2],
            [['MetaTitle', 'MetaDescription', 'MetaKeywords', 'MetaRobots'], 'string', 'max' => 255],
            [['fkNTC_Idioma'], 'exist', 'skipOnError' => true, 'targetClass' => NTCIdioma::className(), 'targetAttribute' => ['fkNTC_Idioma' => 'idNTC_Idioma']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_EstaticosCMS' => 'Id Ntc  Estaticos Cms',
            'Nombre' => 'Nombre',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'fkNTC_Idioma' => 'Fk Ntc  Idioma',
            'IsHTML' => 'Is Html',
            'EstilosCSS' => 'Estilos Css',
            'Quitar' => 'Quitar',
            'MetaTitle' => 'Meta Title',
            'MetaDescription' => 'Meta Description',
            'MetaKeywords' => 'Meta Keywords',
            'MetaRobots' => 'Meta Robots',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdioma()
    {
        return $this->hasOne(Idioma::className(), ['idNTC_Idioma' => 'fkNTC_Idioma']);
    }
}
