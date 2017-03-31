<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TerminoPago".
 *
 * @property integer $idNTC_TerminoPago
 * @property string $Nombre
 * @property string $Descripcion
 * @property integer $Dias
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCFormaPago[] $nTCFormaPagos
 */
class TerminoPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TerminoPago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Dias'], 'required'],
            [['Dias'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['Descripcion'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TerminoPago' => 'Id Ntc  Termino Pago',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Dias' => 'Dias',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_TerminosPago' => 'idNTC_TerminoPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_TerminosPago' => 'idNTC_TerminoPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_TerminosPago' => 'idNTC_TerminoPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFormaPagos()
    {
        return $this->hasMany(FormaPago::className(), ['fkNTC_TerminoPago' => 'idNTC_TerminoPago']);
    }
}
