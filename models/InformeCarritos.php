<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_InformeCarritos".
 *
 * @property string $Fecha
 * @property string $Nombre
 * @property string $Apellidos
 * @property string $Telefono
 * @property string $Email
 * @property string $Lote
 * @property string $Articulo
 * @property string $Referencia
 */
class NTCInformeCarritos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_InformeCarritos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'Nombre', 'Apellidos', 'Email'], 'required'],
            [['Fecha'], 'safe'],
            [['Nombre', 'Apellidos', 'Email'], 'string', 'max' => 100],
            [['Telefono'], 'string', 'max' => 20],
            [['Lote'], 'string', 'max' => 255],
            [['Articulo'], 'string', 'max' => 80],
            [['Referencia'], 'string', 'max' => 45],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Fecha' => 'Fecha',
            'Nombre' => 'Nombre',
            'Apellidos' => 'Apellidos',
            'Telefono' => 'Telefono',
            'Email' => 'Email',
            'Lote' => 'Lote',
            'Articulo' => 'Articulo',
            'Referencia' => 'Referencia',
        ];
    }
}
