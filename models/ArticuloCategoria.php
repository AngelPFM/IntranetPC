<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ArticuloCategoria".
 *
 * @property integer $idNTC_ArticuloCategoria
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Categoria
 * @property string $FechaEliminados
 * @property integer $Quitar
 * @property integer $Orden
 *
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCCategoria $fkNTCCategoria
 */
class ArticuloCategoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ArticuloCategoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Articulo', 'fkNTC_Categoria'], 'required'],
            [['fkNTC_Articulo', 'fkNTC_Categoria', 'Quitar', 'Orden'], 'integer'],
            [['FechaEliminados'], 'safe'],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Categoria'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCategoria::className(), 'targetAttribute' => ['fkNTC_Categoria' => 'idNTC_Categoria']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ArticuloCategoria' => 'Id Ntc  Articulo Categoria',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Categoria' => 'Fk Ntc  Categoria',
            'FechaEliminados' => 'Fecha Eliminados',
            'Quitar' => 'Quitar',
            'Orden' => 'Orden',
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
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['idNTC_Categoria' => 'fkNTC_Categoria']);
    }
}
