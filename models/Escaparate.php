<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Escaparate".
 *
 * @property integer $idNTC_Escaparate
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Categoria
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $TextoBoton
 * @property integer $TextoDerecha
 * @property string $Url
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCCategoria $fkNTCCategoria
 */
class Escaparate extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Escaparate';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Articulo', 'fkNTC_Categoria', 'TextoDerecha', 'Orden', 'Quitar'], 'integer'],
            [['Descripcion'], 'string'],
            [['Titulo'], 'string', 'max' => 150],
            [['TextoBoton', 'Url'], 'string', 'max' => 50],
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
            'idNTC_Escaparate' => 'Id Ntc  Escaparate',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Categoria' => 'Fk Ntc  Categoria',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'TextoBoton' => 'Texto Boton',
            'TextoDerecha' => 'Texto Derecha',
            'Url' => 'Url',
            'Orden' => 'Orden',
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
    public function getFkNTCCategoria()
    {
        return $this->hasOne(NTCCategoria::className(), ['idNTC_Categoria' => 'fkNTC_Categoria']);
    }
}
