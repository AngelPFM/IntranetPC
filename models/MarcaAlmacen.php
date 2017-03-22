<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_MarcaAlmacen".
 *
 * @property integer $idNTC_MarcaAlmacen
 * @property integer $fkNTC_Marca
 * @property integer $fkNTC_Almacen
 *
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCMarca $fkNTCMarca
 */
class MarcaAlmacen extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_MarcaAlmacen';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Marca', 'fkNTC_Almacen'], 'integer'],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_Marca'], 'exist', 'skipOnError' => true, 'targetClass' => NTCMarca::className(), 'targetAttribute' => ['fkNTC_Marca' => 'idNTC_Marca']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_MarcaAlmacen' => 'Id Ntc  Marca Almacen',
            'fkNTC_Marca' => 'Fk Ntc  Marca',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCAlmacen()
    {
        return $this->hasOne(NTCAlmacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCMarca()
    {
        return $this->hasOne(NTCMarca::className(), ['idNTC_Marca' => 'fkNTC_Marca']);
    }
}
