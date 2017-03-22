<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TarifaVenta".
 *
 * @property integer $idNTC_TarifaVenta
 * @property integer $fkNTC_TipoTarifaVenta
 * @property integer $fkNTC_GrupoPrecioCliente
 * @property integer $fkNTC_Cliente
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_UnidadMedida
 * @property integer $fkNTC_Divisa
 * @property integer $CantidadMinima
 * @property double $PrecioVenta
 * @property double $PrecioCoste
 * @property integer $fkNTC_Pais
 * @property string $FechaInicial
 * @property string $FechaFinal
 * @property integer $PermiteDtoFactura
 * @property integer $PermiteDtoLinea
 * @property integer $Quitar
 *
 * @property NTCArticulo $fkNTCArticulo
 */
class NTCTarifaVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TarifaVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_TipoTarifaVenta', 'fkNTC_GrupoPrecioCliente', 'fkNTC_Cliente', 'fkNTC_Articulo', 'fkNTC_UnidadMedida', 'fkNTC_Divisa', 'CantidadMinima', 'fkNTC_Pais', 'PermiteDtoFactura', 'PermiteDtoLinea', 'Quitar'], 'integer'],
            [['fkNTC_Articulo', 'fkNTC_UnidadMedida', 'fkNTC_Divisa', 'PrecioVenta', 'PrecioCoste'], 'required'],
            [['PrecioVenta', 'PrecioCoste'], 'number'],
            [['FechaInicial', 'FechaFinal'], 'safe'],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TarifaVenta' => 'Id Ntc  Tarifa Venta',
            'fkNTC_TipoTarifaVenta' => 'Fk Ntc  Tipo Tarifa Venta',
            'fkNTC_GrupoPrecioCliente' => 'Fk Ntc  Grupo Precio Cliente',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_UnidadMedida' => 'Fk Ntc  Unidad Medida',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'CantidadMinima' => 'Cantidad Minima',
            'PrecioVenta' => 'Precio Venta',
            'PrecioCoste' => 'Precio Coste',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'FechaInicial' => 'Fecha Inicial',
            'FechaFinal' => 'Fecha Final',
            'PermiteDtoFactura' => 'Permite Dto Factura',
            'PermiteDtoLinea' => 'Permite Dto Linea',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCArticulo()
    {
        return $this->hasOne(NTCArticulo::className(), ['idNTC_Articulo' => 'fkNTC_Articulo']);
    }
}
