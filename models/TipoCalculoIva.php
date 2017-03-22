<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoCalculoIva".
 *
 * @property integer $idNTC_TipoCalculoIva
 * @property string $Nombre
 *
 * @property NTCConfiguracionIva[] $nTCConfiguracionIvas
 */
class NTCTipoCalculoIva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoCalculoIva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoCalculoIva' => 'Id Ntc  Tipo Calculo Iva',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracionIvas()
    {
        return $this->hasMany(NTCConfiguracionIva::className(), ['fkNTC_TipoCalculoIVA' => 'idNTC_TipoCalculoIva']);
    }
}
