<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoIvaProducto".
 *
 * @property integer $idNTC_TipoIvaProducto
 * @property string $Nombre
 * @property integer $Quitar
 *
 * @property NTCConfiguracionIva[] $nTCConfiguracionIvas
 */
class TipoIvaProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoIvaProducto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoIvaProducto' => 'Id Ntc  Tipo Iva Producto',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracionIvas()
    {
        return $this->hasMany(ConfiguracionIva::className(), ['fkNTC_TipoIVAProducto' => 'idNTC_TipoIvaProducto']);
    }
}
