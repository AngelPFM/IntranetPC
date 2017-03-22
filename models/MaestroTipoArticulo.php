<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_MaestroTipoArticulo".
 *
 * @property integer $idNTC_MaestroTipoArticulo
 * @property string $Nombre
 * @property integer $Quitar
 */
class MaestroTipoArticulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_MaestroTipoArticulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_MaestroTipoArticulo' => 'Id Ntc  Maestro Tipo Articulo',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }
}
