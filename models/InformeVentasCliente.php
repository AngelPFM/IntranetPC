<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_InformeVentasCliente".
 *
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Email
 * @property integer $Compra
 * @property string $Fecha
 * @property double $MediaArticulos
 * @property double $MediaCompra
 * @property double $Total
 */
class NTCInformeVentasCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_InformeVentasCliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Compra'], 'integer'],
            [['MediaArticulos', 'MediaCompra', 'Total'], 'number'],
            [['Nombre', 'Apellidos', 'Email'], 'string', 'max' => 100],
            [['Fecha'], 'string', 'max' => 24],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Nombre' => 'Nombre',
            'Apellidos' => 'Apellidos',
            'Email' => 'Email',
            'Compra' => 'Compra',
            'Fecha' => 'Fecha',
            'MediaArticulos' => 'Media Articulos',
            'MediaCompra' => 'Media Compra',
            'Total' => 'Total',
        ];
    }
}
