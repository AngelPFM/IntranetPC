<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_DescuentoVenta_copy".
 *
 * @property integer $idNTC_DescuentoVenta
 * @property integer $fkNTC_TipoTarifaVenta
 * @property integer $fkNTC_TipoDescuentoVenta
 * @property integer $fkNTC_GrupoDescuentoCliente
 * @property integer $fkNTC_Cliente
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_UnidadMedida
 * @property integer $CantidadMinima
 * @property double $ImporteDescuento
 * @property double $PorcentajeDescuento
 * @property integer $fkNTC_Pais
 * @property integer $fkNTC_Divisa
 * @property string $FechaInicial
 * @property string $FechaFinal
 * @property integer $Quitar
 */
class NTCDescuentoVentaCopy extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_DescuentoVenta_copy';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_TipoTarifaVenta', 'fkNTC_Articulo', 'fkNTC_UnidadMedida', 'ImporteDescuento', 'PorcentajeDescuento', 'fkNTC_Divisa'], 'required'],
            [['fkNTC_TipoTarifaVenta', 'fkNTC_TipoDescuentoVenta', 'fkNTC_GrupoDescuentoCliente', 'fkNTC_Cliente', 'fkNTC_Articulo', 'fkNTC_UnidadMedida', 'CantidadMinima', 'fkNTC_Pais', 'fkNTC_Divisa', 'Quitar'], 'integer'],
            [['ImporteDescuento', 'PorcentajeDescuento'], 'number'],
            [['FechaInicial', 'FechaFinal'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_DescuentoVenta' => 'Id Ntc  Descuento Venta',
            'fkNTC_TipoTarifaVenta' => 'Fk Ntc  Tipo Tarifa Venta',
            'fkNTC_TipoDescuentoVenta' => 'Fk Ntc  Tipo Descuento Venta',
            'fkNTC_GrupoDescuentoCliente' => 'Fk Ntc  Grupo Descuento Cliente',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_UnidadMedida' => 'Fk Ntc  Unidad Medida',
            'CantidadMinima' => 'Cantidad Minima',
            'ImporteDescuento' => 'Importe Descuento',
            'PorcentajeDescuento' => 'Porcentaje Descuento',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'FechaInicial' => 'Fecha Inicial',
            'FechaFinal' => 'Fecha Final',
            'Quitar' => 'Quitar',
        ];
    }
}
