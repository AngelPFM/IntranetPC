<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Operacion".
 *
 * @property integer $idNTC_Operacion
 * @property integer $fkNTC_Cliente
 * @property integer $fkNTC_DocumentoVenta
 * @property integer $fkNTC_FormaPago
 * @property integer $fkNTC_Tienda
 * @property integer $fkNTC_Divisa
 * @property string $FechaOperacion
 * @property string $FechaEstado
 * @property double $ImporteMoneda
 * @property double $ImporteEur
 * @property string $Referencia
 * @property string $ReferenciaPago
 * @property string $Descripcion
 * @property integer $EstadoPago
 * @property integer $Aplicada
 * @property integer $Quitar
 *
 * @property NTCCliente $fkNTCCliente
 * @property NTCDocumentoVenta $fkNTCDocumentoVenta
 * @property NTCTienda $fkNTCTienda
 * @property NTCDivisa $fkNTCDivisa
 * @property NTCFormaPago $fkNTCFormaPago
 */
class Operacion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Operacion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Cliente', 'fkNTC_DocumentoVenta', 'fkNTC_FormaPago', 'fkNTC_Tienda', 'fkNTC_Divisa', 'FechaOperacion', 'FechaEstado', 'ImporteMoneda', 'ImporteEur', 'Referencia', 'Descripcion', 'EstadoPago'], 'required'],
            [['fkNTC_Cliente', 'fkNTC_DocumentoVenta', 'fkNTC_FormaPago', 'fkNTC_Tienda', 'fkNTC_Divisa', 'EstadoPago', 'Aplicada', 'Quitar'], 'integer'],
            [['FechaOperacion', 'FechaEstado'], 'safe'],
            [['ImporteMoneda', 'ImporteEur'], 'number'],
            [['Referencia'], 'string', 'max' => 20],
            [['ReferenciaPago', 'Descripcion'], 'string', 'max' => 255],
            [['fkNTC_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_Cliente' => 'idNTC_Cliente']],
            [['fkNTC_DocumentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDocumentoVenta::className(), 'targetAttribute' => ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']],
            [['fkNTC_Tienda'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTienda::className(), 'targetAttribute' => ['fkNTC_Tienda' => 'idNTC_Tienda']],
            [['fkNTC_Divisa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDivisa::className(), 'targetAttribute' => ['fkNTC_Divisa' => 'idNTC_Divisa']],
            [['fkNTC_FormaPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCFormaPago::className(), 'targetAttribute' => ['fkNTC_FormaPago' => 'idNTC_FormaPago']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Operacion' => 'Id Ntc  Operacion',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'fkNTC_DocumentoVenta' => 'Fk Ntc  Documento Venta',
            'fkNTC_FormaPago' => 'Fk Ntc  Forma Pago',
            'fkNTC_Tienda' => 'Fk Ntc  Tienda',
            'fkNTC_Divisa' => 'Fk Ntc  Divisa',
            'FechaOperacion' => 'Fecha Operacion',
            'FechaEstado' => 'Fecha Estado',
            'ImporteMoneda' => 'Importe Moneda',
            'ImporteEur' => 'Importe Eur',
            'Referencia' => 'Referencia',
            'ReferenciaPago' => 'Referencia Pago',
            'Descripcion' => 'Descripcion',
            'EstadoPago' => 'Estado Pago',
            'Aplicada' => 'Aplicada',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['idNTC_Cliente' => 'fkNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVenta()
    {
        return $this->hasOne(DocumentoVenta::className(), ['idNTC_DocumentoVenta' => 'fkNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTienda()
    {
        return $this->hasOne(Tienda::className(), ['idNTC_Tienda' => 'fkNTC_Tienda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisa()
    {
        return $this->hasOne(Divisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormaPago()
    {
        return $this->hasOne(FormaPago::className(), ['idNTC_FormaPago' => 'fkNTC_FormaPago']);
    }
}
