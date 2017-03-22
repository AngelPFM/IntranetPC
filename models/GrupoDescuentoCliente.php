<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_GrupoDescuentoCliente".
 *
 * @property integer $idNTC_GrupoDescuentoCliente
 * @property string $Nombre
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabAlbaranVenta[] $nTCCabAlbaranVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCConfiguracion[] $nTCConfiguracions
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 */
class GrupoDescuentoCliente extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_GrupoDescuentoCliente';
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
            'idNTC_GrupoDescuentoCliente' => 'Id Ntc  Grupo Descuento Cliente',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAbonoVentas()
    {
        return $this->hasMany(NTCCabAbonoVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabAlbaranVentas()
    {
        return $this->hasMany(NTCCabAlbaranVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCabFacturaVentas()
    {
        return $this->hasMany(NTCCabFacturaVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCConfiguracions()
    {
        return $this->hasMany(NTCConfiguracion::className(), ['fkNTC_GrupoDescuentoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }
}
