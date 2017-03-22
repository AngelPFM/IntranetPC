<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Wishlist".
 *
 * @property integer $idNTC_Wishlist
 * @property integer $fkNTC_Cliente
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_OpcionAtributoColor
 * @property string $FechaAlta
 * @property integer $Comprado
 * @property double $PrecioVenta
 */
class Wishlist extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Wishlist';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Cliente', 'fkNTC_Articulo', 'fkNTC_OpcionAtributoColor', 'FechaAlta', 'PrecioVenta'], 'required'],
            [['fkNTC_Cliente', 'fkNTC_Articulo', 'fkNTC_OpcionAtributoColor', 'Comprado'], 'integer'],
            [['FechaAlta'], 'safe'],
            [['PrecioVenta'], 'number'],
            [['fkNTC_Cliente', 'fkNTC_Articulo'], 'unique', 'targetAttribute' => ['fkNTC_Cliente', 'fkNTC_Articulo'], 'message' => 'The combination of Fk Ntc  Cliente and Fk Ntc  Articulo has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Wishlist' => 'Id Ntc  Wishlist',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_OpcionAtributoColor' => 'Fk Ntc  Opcion Atributo Color',
            'FechaAlta' => 'Fecha Alta',
            'Comprado' => 'Comprado',
            'PrecioVenta' => 'Precio Venta',
        ];
    }
}
