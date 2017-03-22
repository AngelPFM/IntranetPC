<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ArticuloEtiqueta".
 *
 * @property integer $idNTC_ArticuloEtiqueta
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Etiqueta
 * @property string $FechaDesde
 * @property string $FechaHasta
 * @property integer $Quitar
 *
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCEtiqueta $fkNTCEtiqueta
 */
class NTCArticuloEtiqueta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ArticuloEtiqueta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Articulo', 'fkNTC_Etiqueta', 'Quitar'], 'integer'],
            [['FechaDesde', 'FechaHasta'], 'safe'],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Etiqueta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCEtiqueta::className(), 'targetAttribute' => ['fkNTC_Etiqueta' => 'idNTC_Etiqueta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ArticuloEtiqueta' => 'Id Ntc  Articulo Etiqueta',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Etiqueta' => 'Fk Ntc  Etiqueta',
            'FechaDesde' => 'Fecha Desde',
            'FechaHasta' => 'Fecha Hasta',
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
    public function getFkNTCEtiqueta()
    {
        return $this->hasOne(NTCEtiqueta::className(), ['idNTC_Etiqueta' => 'fkNTC_Etiqueta']);
    }
}
