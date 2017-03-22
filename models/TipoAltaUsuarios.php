<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoAltaUsuarios".
 *
 * @property integer $idNTC_TipoAltaUsuarios
 * @property string $Nombre
 *
 * @property NTCConfiguracion[] $nTCConfiguracions
 */
class TipoAltaUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoAltaUsuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 20],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoAltaUsuarios' => 'Id Ntc  Tipo Alta Usuarios',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracions()
    {
        return $this->hasMany(NTCConfiguracion::className(), ['fkNTC_TipoAltaUsuarios' => 'idNTC_TipoAltaUsuarios']);
    }
}
