<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ArticuloNewsletter".
 *
 * @property integer $idNTC_ArticuloNewsletter
 * @property integer $fkNTC_Newsletter
 * @property integer $fkNTC_Categoria
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Variante
 *
 * @property NTCCategoria $fkNTCCategoria
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCVariante $fkNTCVariante
 * @property NTCNewsletter $fkNTCNewsletter
 */
class ArticuloNewsletter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ArticuloNewsletter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Newsletter', 'fkNTC_Categoria'], 'required'],
            [['fkNTC_Newsletter', 'fkNTC_Categoria', 'fkNTC_Articulo', 'fkNTC_Variante'], 'integer'],
            [['fkNTC_Categoria'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCategoria::className(), 'targetAttribute' => ['fkNTC_Categoria' => 'idNTC_Categoria']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
            [['fkNTC_Newsletter'], 'exist', 'skipOnError' => true, 'targetClass' => NTCNewsletter::className(), 'targetAttribute' => ['fkNTC_Newsletter' => 'idNTC_Newsletter']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ArticuloNewsletter' => 'Id Ntc  Articulo Newsletter',
            'fkNTC_Newsletter' => 'Fk Ntc  Newsletter',
            'fkNTC_Categoria' => 'Fk Ntc  Categoria',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategoria()
    {
        return $this->hasOne(Categoria::className(), ['idNTC_Categoria' => 'fkNTC_Categoria']);
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
    public function getVariante()
    {
        return $this->hasOne(Variante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNewsletter()
    {
        return $this->hasOne(Newsletter::className(), ['idNTC_Newsletter' => 'fkNTC_Newsletter']);
    }
}
