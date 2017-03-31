<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ArticuloColorFiltro".
 *
 * @property integer $idNTC_ArticuloColorFiltro
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_ColorFiltro
 * @property integer $Quitar
 *
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCColorFiltro $fkNTCColorFiltro
 */
class ArticuloColorFiltro extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ArticuloColorFiltro';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Articulo', 'fkNTC_ColorFiltro'], 'required'],
            [['fkNTC_Articulo', 'fkNTC_ColorFiltro', 'Quitar'], 'integer'],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_ColorFiltro'], 'exist', 'skipOnError' => true, 'targetClass' => NTCColorFiltro::className(), 'targetAttribute' => ['fkNTC_ColorFiltro' => 'idNTC_ColorFiltro']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ArticuloColorFiltro' => 'Id Ntc  Articulo Color Filtro',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_ColorFiltro' => 'Fk Ntc  Color Filtro',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulo()
    {
        return $this->hasOne(Articulo::className(), ['idNTC_Articulo' => 'fkNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getColorFiltro()
    {
        return $this->hasOne(ColorFiltro::className(), ['idNTC_ColorFiltro' => 'fkNTC_ColorFiltro']);
    }
}
