<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_AppSesion".
 *
 * @property integer $idNTC_AppSesion
 * @property integer $Codigo
 * @property string $Mac
 */
class AppSesion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_AppSesion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Codigo'], 'integer'],
            [['Mac'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_AppSesion' => 'Id Ntc  App Sesion',
            'Codigo' => 'Codigo',
            'Mac' => 'Mac',
        ];
    }
}
