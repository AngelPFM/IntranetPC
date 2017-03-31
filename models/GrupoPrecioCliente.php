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
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_GrupoPrecioCliente' => 'idNTC_GrupoPrecioCliente']);
    }
}
