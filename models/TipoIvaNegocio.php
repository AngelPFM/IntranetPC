<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoIvaNegocio".
 *
 * @property integer $idNTC_TipoIvaNegocio
 * @property string $Nombre
 * @property integer $FacturacionObligatoria
 * @property integer $Quitar
 * @property integer $fkNTC_NumSeriePedidos
 * @property integer $fkNTC_NumSerieAlbaranes
 * @property integer $fkNTC_NumSerieFacturas
 * @property integer $fkNTC_NumSerieDevoluciones
 * @property integer $fkNTC_NumSerieAbonos
 *
 * @property NTCConfiguracionIva[] $nTCConfiguracionIvas
 */
class TipoIvaNegocio extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoIvaNegocio';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'fkNTC_NumSeriePedidos', 'fkNTC_NumSerieAlbaranes', 'fkNTC_NumSerieFacturas', 'fkNTC_NumSerieDevoluciones', 'fkNTC_NumSerieAbonos'], 'required'],
            [['FacturacionObligatoria', 'Quitar', 'fkNTC_NumSeriePedidos', 'fkNTC_NumSerieAlbaranes', 'fkNTC_NumSerieFacturas', 'fkNTC_NumSerieDevoluciones', 'fkNTC_NumSerieAbonos'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoIvaNegocio' => 'Id Ntc  Tipo Iva Negocio',
            'Nombre' => 'Nombre',
            'FacturacionObligatoria' => 'Facturacion Obligatoria',
            'Quitar' => 'Quitar',
            'fkNTC_NumSeriePedidos' => 'Fk Ntc  Num Serie Pedidos',
            'fkNTC_NumSerieAlbaranes' => 'Fk Ntc  Num Serie Albaranes',
            'fkNTC_NumSerieFacturas' => 'Fk Ntc  Num Serie Facturas',
            'fkNTC_NumSerieDevoluciones' => 'Fk Ntc  Num Serie Devoluciones',
            'fkNTC_NumSerieAbonos' => 'Fk Ntc  Num Serie Abonos',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracionIvas()
    {
        return $this->hasMany(ConfiguracionIva::className(), ['fkNTC_TipoIVANegocio' => 'idNTC_TipoIvaNegocio']);
    }
}
