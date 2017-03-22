<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoMenu".
 *
 * @property integer $idNTC_TipoMenu
 * @property string $Nombre
 * @property integer $Quitar
 */
class NTCTipoMenu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoMenu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoMenu' => 'Id Ntc  Tipo Menu',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }
}
