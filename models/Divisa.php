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
    public function getNTCCabAbonoVentas()
    {
        return $this->hasMany(NTCCabAbonoVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAlbaranVentas()
    {
        return $this->hasMany(NTCCabAlbaranVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabDevolucionVentas()
    {
        return $this->hasMany(NTCCabDevolucionVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabFacturaVentas()
    {
        return $this->hasMany(NTCCabFacturaVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCambioDivisa()
    {
        return $this->hasOne(NTCCambioDivisa::className(), ['fkNTC_Divisa1' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCambioDivisa0()
    {
        return $this->hasOne(NTCCambioDivisa::className(), ['fkNTC_Divisa2' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa2s()
    {
        return $this->hasMany(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa2'])->viaTable('NTC_CambioDivisa', ['fkNTC_Divisa1' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDivisa1s()
    {
        return $this->hasMany(NTCDivisa::className(), ['idNTC_Divisa' => 'fkNTC_Divisa1'])->viaTable('NTC_CambioDivisa', ['fkNTC_Divisa2' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracions()
    {
        return $this->hasMany(NTCConfiguracion::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDescuentos()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDescuentos0()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['fkNTC_DivisaImporteMinimo' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCOperacions()
    {
        return $this->hasMany(NTCOperacion::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCRelacionDivisas()
    {
        return $this->hasMany(NTCRelacionDivisa::className(), ['fkNTC_Divisa1' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCRelacionDivisas0()
    {
        return $this->hasMany(NTCRelacionDivisa::className(), ['fkNTC_Divisa2' => 'idNTC_Divisa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCTarifaEnvios()
    {
        return $this->hasMany(NTCTarifaEnvio::className(), ['fkNTC_Divisa' => 'idNTC_Divisa']);
    }
}
