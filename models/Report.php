<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Report".
 *
 * @property integer $idNTC_Report
 * @property integer $fkChartType
 * @property string $Nombre
 * @property string $Titulo
 * @property integer $Alto
 * @property integer $Ancho
 * @property string $Query
 * @property string $Series
 * @property string $ColumnaSeries
 * @property string $Modelo
 * @property string $Columnas
 * @property string $Condition
 * @property string $Order
 * @property integer $Limit
 * @property integer $Offset
 * @property string $Group
 * @property string $Having
 * @property integer $MuestraEtiquetas
 * @property string $Colores
 * @property integer $Quitar
 * @property string $Parameters
 * @property integer $AllowHtml
 * @property integer $DateControls
 * @property integer $Orden
 */

class Report extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Report';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkChartType', 'Alto', 'Ancho', 'Limit', 'Offset', 'MuestraEtiquetas', 'Quitar', 'AllowHtml', 'DateControls', 'Orden'], 'integer'],
            [['Alto', 'Ancho'], 'required'],
            [['Query'], 'string'],
            [['Nombre'], 'string', 'max' => 20],
            [['Titulo', 'Series', 'ColumnaSeries', 'Modelo', 'Order'], 'string', 'max' => 100],
            [['Columnas', 'Condition', 'Group', 'Having', 'Colores', 'Parameters'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Report' => 'Id Ntc  Report',
            'fkChartType' => 'Fk Chart Type',
            'Nombre' => 'Nombre',
            'Titulo' => 'Titulo',
            'Alto' => 'Alto',
            'Ancho' => 'Ancho',
            'Query' => 'Query',
            'Series' => 'Series',
            'ColumnaSeries' => 'Columna Series',
            'Modelo' => 'Modelo',
            'Columnas' => 'Columnas',
            'Condition' => 'Condition',
            'Order' => 'Order',
            'Limit' => 'Limit',
            'Offset' => 'Offset',
            'Group' => 'Group',
            'Having' => 'Having',
            'MuestraEtiquetas' => 'Muestra Etiquetas',
            'Colores' => 'Colores',
            'Quitar' => 'Quitar',
            'Parameters' => 'Parameters',
            'AllowHtml' => 'Allow Html',
            'DateControls' => 'Date Controls',
            'Orden' => 'Orden',
        ];
    }
}
