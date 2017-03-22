<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_LoteArticulo".
 *
 * @property integer $idNTC_LoteArticulo
 * @property integer $fkNTC_Lote
 * @property integer $fkNTC_Articulo
 * @property integer $Cantidad
 * @property integer $fkNTC_Variante
 * @property integer $Quitar
 *
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCLote $fkNTCLote
 * @property NTCVariante $fkNTCVariante
 */
class NTCLoteArticulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_LoteArticulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Lote', 'fkNTC_Articulo'], 'required'],
            [['fkNTC_Lote', 'fkNTC_Articulo', 'Cantidad', 'fkNTC_Variante', 'Quitar'], 'integer'],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Lote'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLote::className(), 'targetAttribute' => ['fkNTC_Lote' => 'idNTC_Lote']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_LoteArticulo' => 'Id Ntc  Lote Articulo',
            'fkNTC_Lote' => 'Fk Ntc  Lote',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'Cantidad' => 'Cantidad',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCArticulo()
    {
        return $this->hasOne(NTCArticulo::className(), ['idNTC_Articulo' => 'fkNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLote()
    {
        return $this->hasOne(NTCLote::className(), ['idNTC_Lote' => 'fkNTC_Lote']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCVariante()
    {
        return $this->hasOne(NTCVariante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
    }
}
