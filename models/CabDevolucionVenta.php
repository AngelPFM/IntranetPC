<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_CabDevolucionVenta".
 *
 * @property integer $idNTC_CabDevolucionVenta
 * @property string $Numero
 * @property string $Fecha
 * @property integer $fkNTC_NumSerie
 * @property integer $fkNTC_ClienteVenta
 * @property integer $fkNTC_Almacen
 * @property string $FechaRecepcion
 * @property integer $fkNTC_Divisa
 * @property string $FechaRegistro
 * @property string $Comentario
 * @property integer $RecepcionParcial
 * @property integer $RecibidoCompletamente
 * @property integer $FechaEntrega
 * @property integer $ConfirmadaRecepcion
 * @property double $Importe
 * @property double $ImporteIvaIncl
 * @property string $Tracking
 * @property integer $Recibido
 *
 * @property NTCNumSerie $fkNTCNumSerie
 * @property NTCCliente $fkNTCClienteVenta
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCLineaDevolucionVenta[] $nTCLineaDevolucionVentas
 */
class NTCCabDevolucionVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_CabDevolucionVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Numero', 'Fecha', 'fkNTC_NumSerie', 'fkNTC_ClienteVenta', 'fkNTC_Almacen', 'fkNTC_Divisa'], 'required'],
            [['Fecha', 'FechaRecepcion', 'FechaRegistro'], 'safe'],
            [['fkNTC_NumSerie', 'fkNTC_ClienteVenta', 'fkNTC_Almacen', 'fkNTC_Divisa', 'RecepcionParcial', 'RecibidoCompletamente', 'FechaEntrega', 'ConfirmadaRecepcion', 'Recibido'], 'integer'],
            [['Comentario'], 'string'],
            [['Importe', 'ImporteIvaIncl'], 'number'],
            [['Numero'], 'string', 'max' => 20],
            [['Tracking'], 'string', 'max' => 100],
            [['fkNTC_NumSerie'], 'exist', 'skipOnError' => true, 'targetClass' => NTCNumSerie::className(), 'targetAttribute' => ['fkNTC_NumSerie' => 'idNTC_NumSerie']],
            [['fkNTC_ClienteVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_ClienteVenta' => 'idNTC_Cliente']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_CabDevolucionVenta' => 'Id Ntc  Cab Devolucion Venta',
            'Numero' => 'Numero',
            'Fecha' => 'Fecha',
            'fkNTC_NumSerie' => 'Fk Ntc  Num Serie',
            'fkNTC_ClienteVenta' => 'Fk Ntc  Cliente Venta',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'FechaRecepcion' => 'Fecha Recepcion',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'FechaRegistro' => 'Fecha Registro',
            'Comentario' => 'Comentario',
            'RecepcionParcial' => 'Recepcion Parcial',
            'RecibidoCompletamente' => 'Recibido Completamente',
            'FechaEntrega' => 'Fecha Entrega',
            'ConfirmadaRecepcion' => 'Confirmada Recepcion',
            'Importe' => 'Importe',
            'ImporteIvaIncl' => 'Importe Iva Incl',
            'Tracking' => 'Tracking',
            'Recibido' => 'Recibido',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCNumSerie()
    {
        return $this->hasOne(NTCNumSerie::className(), ['idNTC_NumSerie' => 'fkNTC_NumSerie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCClienteVenta()
    {
        return $this->hasOne(NTCCliente::className(), ['idNTC_Cliente' => 'fkNTC_ClienteVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCAlmacen()
    {
        return $this->hasOne(NTCAlmacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa()
    {
        return $this->hasOne(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaDevolucionVentas()
    {
        return $this->hasMany(NTCLineaDevolucionVenta::className(), ['fkNTC_CabDevolucionVenta' => 'idNTC_CabDevolucionVenta']);
    }
}
