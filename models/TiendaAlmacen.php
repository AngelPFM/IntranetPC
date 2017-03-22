<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Tienda_Almacen".
 *
 * @property integer $idNTC_Tienda_Almacen
 * @property integer $fkNTC_Tienda
 * @property integer $fkNTC_Almacen
 * @property integer $Quitar
 *
 * @property NTCTienda $fkNTCTienda
 * @property NTCAlmacen $fkNTCAlmacen
 */
class TiendaAlmacen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Tienda_Almacen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Tienda', 'fkNTC_Almacen', 'Quitar'], 'integer'],
            [['fkNTC_Tienda'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTienda::className(), 'targetAttribute' => ['fkNTC_Tienda' => 'idNTC_Tienda']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Tienda_Almacen' => 'Id Ntc  Tienda  Almacen',
            'fkNTC_Tienda' => 'Fk Ntc  Tienda',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTienda()
    {
        return $this->hasOne(NTCTienda::className(), ['idNTC_Tienda' => 'fkNTC_Tienda']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCAlmacen()
    {
        return $this->hasOne(NTCAlmacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }
}
