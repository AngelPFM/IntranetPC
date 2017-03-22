<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoDocumentoVenta".
 *
 * @property integer $idNTC_TipoDocumentoVenta
 * @property string $Nombre
 *
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 */
class TipoDocumentoVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoDocumentoVenta';
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
            'idNTC_TipoDocumentoVenta' => 'Id Ntc  Tipo Documento Venta',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDocumentoVentas()
    {
        return $this->hasMany(NTCDocumentoVenta::className(), ['fkNTC_TipoDocumentoVenta' => 'idNTC_TipoDocumentoVenta']);
    }
}
