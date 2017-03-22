<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_GrupoPrecioCliente".
 *
 * @property integer $idNTC_GrupoPrecioCliente
 * @property string $Nombre
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCConfiguracion[] $nTCConfiguracions
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 */
class GrupoPrecioCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_GrupoPrecioCliente';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_GrupoPrecioCliente' => 'Id Ntc  Grupo Precio Cliente',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAbonoVentas()
    {
        return $this->hasMany(NTCCabAbonoVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAlbaranVentas()
    {
        return $this->hasMany(NTCCabAlbaranVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabFacturaVentas()
    {
        return $this->hasMany(NTCCabFacturaVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracions()
    {
        return $this->hasMany(NTCConfiguracion::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponDescuentos()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }
}
