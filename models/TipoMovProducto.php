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
    public function getDiarioProductos()
    {
        return $this->hasMany(DiarioProducto::className(), ['fkNTC_TipoMovProducto' => 'idNTC_TipoMovProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovProductos()
    {
        return $this->hasMany(MovProducto::className(), ['fkNTC_TipoMovProducto' => 'idNTC_TipoMovProducto']);
    }
}
