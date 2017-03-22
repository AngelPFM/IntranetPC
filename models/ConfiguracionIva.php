<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ConfiguracionIva".
 *
 * @property integer $idNTC_ConfiguracionIva
 * @property integer $fkNTC_TipoIVAProducto
 * @property integer $fkNTC_TipoIVANegocio
 * @property string $Nombre
 * @property double $PorcIva
 * @property integer $fkNTC_TipoCalculoIVA
 * @property double $PorcRecargoEquivalencia
 *
 * @property NTCCliente[] $nTCClientes
 * @property NTCTipoIvaProducto $fkNTCTipoIVAProducto
 * @property NTCTipoIvaNegocio $fkNTCTipoIVANegocio
 * @property NTCTipoCalculoIva $fkNTCTipoCalculoIVA
 */
class NTCConfiguracionIva extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ConfiguracionIva';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_TipoIVAProducto', 'fkNTC_TipoIVANegocio', 'Nombre', 'fkNTC_TipoCalculoIVA'], 'required'],
            [['fkNTC_TipoIVAProducto', 'fkNTC_TipoIVANegocio', 'fkNTC_TipoCalculoIVA'], 'integer'],
            [['PorcIva', 'PorcRecargoEquivalencia'], 'number'],
            [['Nombre'], 'string', 'max' => 50],
            [['fkNTC_TipoIVAProducto'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoIvaProducto::className(), 'targetAttribute' => ['fkNTC_TipoIVAProducto' => 'idNTC_TipoIvaProducto']],
            [['fkNTC_TipoIVANegocio'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoIvaNegocio::className(), 'targetAttribute' => ['fkNTC_TipoIVANegocio' => 'idNTC_TipoIvaNegocio']],
            [['fkNTC_TipoCalculoIVA'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoCalculoIva::className(), 'targetAttribute' => ['fkNTC_TipoCalculoIVA' => 'idNTC_TipoCalculoIva']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ConfiguracionIva' => 'Id Ntc  Configuracion Iva',
            'fkNTC_TipoIVAProducto' => 'Fk Ntc  Tipo Ivaproducto',
            'fkNTC_TipoIVANegocio' => 'Fk Ntc  Tipo Ivanegocio',
            'Nombre' => 'Nombre',
            'PorcIva' => 'Porc Iva',
            'fkNTC_TipoCalculoIVA' => 'Fk Ntc  Tipo Calculo Iva',
            'PorcRecargoEquivalencia' => 'Porc Recargo Equivalencia',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCClientes()
    {
        return $this->hasMany(NTCCliente::className(), ['fkNTC_ConfiguracionIva' => 'idNTC_ConfiguracionIva']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoIVAProducto()
    {
        return $this->hasOne(NTCTipoIvaProducto::className(), ['idNTC_TipoIvaProducto' => 'fkNTC_TipoIVAProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoIVANegocio()
    {
        return $this->hasOne(NTCTipoIvaNegocio::className(), ['idNTC_TipoIvaNegocio' => 'fkNTC_TipoIVANegocio']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoCalculoIVA()
    {
        return $this->hasOne(NTCTipoCalculoIva::className(), ['idNTC_TipoCalculoIva' => 'fkNTC_TipoCalculoIVA']);
    }
}
