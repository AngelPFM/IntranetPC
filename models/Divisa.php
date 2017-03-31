<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Divisa".
 *
 * @property integer $idNTC_Divisa
 * @property string $Nombre
 * @property string $Simbolo
 * @property string $Iso4217
 * @property integer $Quitar
 * @property double $VariableConversion
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabDevolucionVenta[] $nTCCabDevolucionVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCCambioDivisa $nTCCambioDivisa
 * @property NTCCambioDivisa $nTCCambioDivisa0
 * @property NTCDivisa[] $fkNTCDivisa2s
 * @property NTCDivisa[] $fkNTCDivisa1s
 * @property NTCConfiguracion[] $nTCConfiguracions
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 * @property NTCCuponDescuento[] $nTCCuponDescuentos0
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCOperacion[] $nTCOperacions
 * @property NTCRelacionDivisa[] $nTCRelacionDivisas
 * @property NTCRelacionDivisa[] $nTCRelacionDivisas0
 * @property NTCTarifaEnvio[] $nTCTarifaEnvios
 */
class Divisa extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Divisa';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Simbolo', 'Iso4217', 'Quitar'], 'required'],
            [['Quitar'], 'integer'],
            [['VariableConversion'], 'number'],
            [['Nombre'], 'string', 'max' => 50],
            [['Simbolo'], 'string', 'max' => 5],
            [['Iso4217'], 'string', 'max' => 3],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Divisa' => 'Id Ntc  Divisa',
            'Nombre' => 'Nombre',
            'Simbolo' => 'Simbolo',
            'Iso4217' => 'Iso4217',
            'Quitar' => 'Quitar',
            'VariableConversion' => 'Variable Conversion',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabDevolucionVentas()
    {
        return $this->hasMany(CabDevolucionVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCambioDivisa()
    {
        return $this->hasOne(CambioDivisa::className(), ['fkNTC_Divisa1' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCambioDivisa0()
    {
        return $this->hasOne(CambioDivisa::className(), ['fkNTC_Divisa2' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisa2s()
    {
        return $this->hasMany(Divisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa2'])->viaTable('NTC_CambioDivisa', ['fkNTC_Divisa1' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDivisa1s()
    {
        return $this->hasMany(Divisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa1'])->viaTable('NTC_CambioDivisa', ['fkNTC_Divisa2' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos0()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_DivisaImporteMinimo' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacions()
    {
        return $this->hasMany(Operacion::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelacionDivisas()
    {
        return $this->hasMany(RelacionDivisa::className(), ['fkNTC_Divisa1' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRelacionDivisas0()
    {
        return $this->hasMany(RelacionDivisa::className(), ['fkNTC_Divisa2' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTarifaEnvios()
    {
        return $this->hasMany(TarifaEnvio::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }
}
