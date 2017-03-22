<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_InformeVentas".
 *
 * @property string $Numero
 * @property string $FormaPago
 * @property string $Fecha
 * @property string $FechaEnvio
 * @property integer $Año
 * @property integer $Mes
 * @property integer $Semana
 * @property integer $Diasemana
 * @property integer $diames
 * @property double $productos
 * @property double $Importe
 * @property double $Portes
 * @property double $Recargo
 * @property double $Total
 * @property string $Porte
 * @property string $Estado
 */
class InformeVentas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_InformeVentas';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Numero'], 'required'],
            [['Año', 'Mes', 'Semana', 'Diasemana', 'diames'], 'integer'],
            [['productos', 'Importe', 'Portes', 'Recargo', 'Total'], 'number'],
            [['Numero', 'FormaPago'], 'string', 'max' => 20],
            [['Fecha', 'FechaEnvio'], 'string', 'max' => 24],
            [['Porte'], 'string', 'max' => 255],
            [['Estado'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'Numero' => 'Numero',
            'FormaPago' => 'Forma Pago',
            'Fecha' => 'Fecha',
            'FechaEnvio' => 'Fecha Envio',
            'Año' => 'Año',
            'Mes' => 'Mes',
            'Semana' => 'Semana',
            'Diasemana' => 'Diasemana',
            'diames' => 'Diames',
            'productos' => 'Productos',
            'Importe' => 'Importe',
            'Portes' => 'Portes',
            'Recargo' => 'Recargo',
            'Total' => 'Total',
            'Porte' => 'Porte',
            'Estado' => 'Estado',
        ];
    }
}
