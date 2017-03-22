<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ArticuloColor".
 *
 * @property integer $idNTC_ArticuloColor
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_OpcionAtributo
 * @property integer $Quitar
 *
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCOpcionAtributo $fkNTCOpcionAtributo
 */
class ArticuloColor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ArticuloColor';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Articulo', 'fkNTC_OpcionAtributo', 'Quitar'], 'integer'],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_OpcionAtributo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCOpcionAtributo::className(), 'targetAttribute' => ['fkNTC_OpcionAtributo' => 'idNTC_OpcionAtributo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ArticuloColor' => 'Id Ntc  Articulo Color',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_OpcionAtributo' => 'Fk Ntc  Opcion Atributo',
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
    public function getFkNTCOpcionAtributo()
    {
        return $this->hasOne(NTCOpcionAtributo::className(), ['idNTC_OpcionAtributo' => 'fkNTC_OpcionAtributo']);
    }
}
