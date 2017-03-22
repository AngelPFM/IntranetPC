<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_RedSocial".
 *
 * @property integer $idNTC_RedSocial
 * @property integer $fkNTC_Empresa
 * @property string $Nombre
 * @property string $UrlEmpresa
 * @property integer $Quitar
 * @property integer $Orden
 *
 * @property NTCEmpresa $fkNTCEmpresa
 */
class RedSocial extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_RedSocial';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Empresa', 'Nombre', 'UrlEmpresa'], 'required'],
            [['fkNTC_Empresa', 'Quitar', 'Orden'], 'integer'],
            [['Nombre'], 'string', 'max' => 100],
            [['UrlEmpresa'], 'string', 'max' => 255],
            [['fkNTC_Empresa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCEmpresa::className(), 'targetAttribute' => ['fkNTC_Empresa' => 'idNTC_Empresa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_RedSocial' => 'Id Ntc  Red Social',
            'fkNTC_Empresa' => 'Fk Ntc  Empresa',
            'Nombre' => 'Nombre',
            'UrlEmpresa' => 'Url Empresa',
            'Quitar' => 'Quitar',
            'Orden' => 'Orden',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCEmpresa()
    {
        return $this->hasOne(NTCEmpresa::className(), ['idNTC_Empresa' => 'fkNTC_Empresa']);
    }
}
