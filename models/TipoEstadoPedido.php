<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoEstadoPedido".
 *
 * @property integer $idNTC_TipoEstadoPedido
 * @property string $Nombre
 *
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 */
class TipoEstadoPedido extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoEstadoPedido';
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
            'idNTC_TipoEstadoPedido' => 'Id Ntc  Tipo Estado Pedido',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_TipoEstadoPedido' => 'idNTC_TipoEstadoPedido']);
    }
}
