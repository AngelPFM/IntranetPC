<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoSeleccionCupon".
 *
 * @property integer $idNTC_TipoSeleccionCupon
 * @property string $Nombre
 *
 * @property NTCSeleccionCupon[] $nTCSeleccionCupons
 */
class TipoSeleccionCupon extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoSeleccionCupon';
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
            'idNTC_TipoSeleccionCupon' => 'Id Ntc  Tipo Seleccion Cupon',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSeleccionCupons()
    {
        return $this->hasMany(SeleccionCupon::className(), ['fkNTC_TipoSeleccionCupon' => 'idNTC_TipoSeleccionCupon']);
    }
}
