<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_NumSerie".
 *
 * @property integer $idNTC_NumSerie
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $Desde
 * @property string $Hasta
 * @property string $Ultimo
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabDevolucionVenta[] $nTCCabDevolucionVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 */
class NumSerie extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_NumSerie';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Desde', 'Hasta', 'Ultimo'], 'required'],
            [['Nombre', 'Desde', 'Hasta', 'Ultimo'], 'string', 'max' => 50],
            [['Descripcion'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_NumSerie' => 'Id Ntc  Num Serie',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'Desde' => 'Desde',
            'Hasta' => 'Hasta',
            'Ultimo' => 'Ultimo',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_NumSerie' => 'idNTC_NumSerie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_NumSerie' => 'idNTC_NumSerie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabDevolucionVentas()
    {
        return $this->hasMany(CabDevolucionVenta::className(), ['fkNTC_NumSerie' => 'idNTC_NumSerie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_NumSerie' => 'idNTC_NumSerie']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_NumSerie' => 'idNTC_NumSerie']);
    }
}
