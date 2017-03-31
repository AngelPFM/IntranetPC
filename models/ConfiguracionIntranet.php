<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ConfiguracionIntranet".
 *
 * @property integer $idNTC_ConfiguracionIntranet
 * @property integer $fkNTC_Empresa
 * @property integer $MinCarMetaTitle
 * @property integer $MaxCarMetaTitle
 * @property integer $MinCarMetaDescription
 * @property integer $MaxCarMetaDescription
 * @property integer $MinCarMetaKeywords
 * @property integer $MaxCarMetaKeyowrds
 * @property integer $MinPalMetaKeywords
 * @property integer $MaxPalMetaKeyords
 * @property string $EmailNewsletters
 *
 * @property NTCEmpresa $fkNTCEmpresa
 */
class ConfiguracionIntranet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ConfiguracionIntranet';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_ConfiguracionIntranet', 'fkNTC_Empresa', 'EmailNewsletters'], 'required'],
            [['idNTC_ConfiguracionIntranet', 'fkNTC_Empresa', 'MinCarMetaTitle', 'MaxCarMetaTitle', 'MinCarMetaDescription', 'MaxCarMetaDescription', 'MinCarMetaKeywords', 'MaxCarMetaKeyowrds', 'MinPalMetaKeywords', 'MaxPalMetaKeyords'], 'integer'],
            [['EmailNewsletters'], 'string', 'max' => 255],
            [['fkNTC_Empresa'], 'unique'],
            [['fkNTC_Empresa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCEmpresa::className(), 'targetAttribute' => ['fkNTC_Empresa' => 'idNTC_Empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ConfiguracionIntranet' => 'Id Ntc  Configuracion Intranet',
            'fkNTC_Empresa' => 'Fk Ntc  Empresa',
            'MinCarMetaTitle' => 'Min Car Meta Title',
            'MaxCarMetaTitle' => 'Max Car Meta Title',
            'MinCarMetaDescription' => 'Min Car Meta Description',
            'MaxCarMetaDescription' => 'Max Car Meta Description',
            'MinCarMetaKeywords' => 'Min Car Meta Keywords',
            'MaxCarMetaKeyowrds' => 'Max Car Meta Keyowrds',
            'MinPalMetaKeywords' => 'Min Pal Meta Keywords',
            'MaxPalMetaKeyords' => 'Max Pal Meta Keyords',
            'EmailNewsletters' => 'Email Newsletters',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(NTCEmpresa::className(), ['idNTC_Empresa' => 'fkNTC_Empresa']);
    }
}
