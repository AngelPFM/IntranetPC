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
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAlbaranVentas()
    {
        return $this->hasMany(CabAlbaranVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::className(), ['fkNTC_GrupoDescuentoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_GrupoDtoCliente' => 'idNTC_GrupoDescuentoCliente']);
    }
}
