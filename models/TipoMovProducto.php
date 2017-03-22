<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoMovProducto".
 *
 * @property integer $idNTC_TipoMovProducto
 * @property string $Nombre
 *
 * @property NTCDiarioProducto[] $nTCDiarioProductos
 * @property NTCMovProducto[] $nTCMovProductos
 */
class TipoMovProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoMovProducto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoMovProducto' => 'Id Ntc  Tipo Mov Producto',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDiarioProductos()
    {
        return $this->hasMany(NTCDiarioProducto::className(), ['fkNTC_TipoMovProducto' => 'idNTC_TipoMovProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMovProductos()
    {
        return $this->hasMany(NTCMovProducto::className(), ['fkNTC_TipoMovProducto' => 'idNTC_TipoMovProducto']);
    }
}
