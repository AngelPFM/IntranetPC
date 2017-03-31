<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Newsletter".
 *
 * @property integer $idNTC_Newsletter
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $FechaDesde
 * @property string $FechaHasta
 * @property integer $Quitar
 *
 * @property NTCArticuloNewsletter[] $nTCArticuloNewsletters
 */
class Newsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Newsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Descripcion', 'FechaDesde', 'FechaHasta'], 'required'],
            [['FechaDesde', 'FechaHasta'], 'safe'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 150],
            [['Descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Newsletter' => 'Id Ntc  Newsletter',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'FechaDesde' => 'Fecha Desde',
            'FechaHasta' => 'Fecha Hasta',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticuloNewsletters()
    {
        return $this->hasMany(ArticuloNewsletter::className(), ['fkNTC_Newsletter' => 'idNTC_Newsletter']);
    }
}
