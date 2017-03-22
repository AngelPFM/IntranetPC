<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Variante".
 *
 * @property integer $idNTC_Variante
 * @property integer $fkNTC_Articulo
 * @property string $Nombre
 * @property integer $Quitar
 *
 * @property NTCArticuloNewsletter[] $nTCArticuloNewsletters
 * @property NTCDetalleVariante[] $nTCDetalleVariantes
 * @property NTCDiarioProducto[] $nTCDiarioProductos
 * @property NTCLineaAbonoVenta[] $nTCLineaAbonoVentas
 * @property NTCLineaAlbaranVenta[] $nTCLineaAlbaranVentas
 * @property NTCLineaCarrito[] $nTCLineaCarritos
 * @property NTCLineaDevolucionVenta[] $nTCLineaDevolucionVentas
 * @property NTCLineaFacturaVenta[] $nTCLineaFacturaVentas
 * @property NTCLineaVenta[] $nTCLineaVentas
 * @property NTCLoteArticulo[] $nTCLoteArticulos
 * @property NTCMovProducto[] $nTCMovProductos
 */
class Variante extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Variante';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Articulo', 'Nombre'], 'required'],
            [['fkNTC_Articulo', 'Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Variante' => 'Id Ntc  Variante',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'Nombre' => 'Nombre',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloNewsletters()
    {
        return $this->hasMany(NTCArticuloNewsletter::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDetalleVariantes()
    {
        return $this->hasMany(NTCDetalleVariante::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDiarioProductos()
    {
        return $this->hasMany(NTCDiarioProducto::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaAbonoVentas()
    {
        return $this->hasMany(NTCLineaAbonoVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaAlbaranVentas()
    {
        return $this->hasMany(NTCLineaAlbaranVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaCarritos()
    {
        return $this->hasMany(NTCLineaCarrito::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaDevolucionVentas()
    {
        return $this->hasMany(NTCLineaDevolucionVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaFacturaVentas()
    {
        return $this->hasMany(NTCLineaFacturaVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaVentas()
    {
        return $this->hasMany(NTCLineaVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLoteArticulos()
    {
        return $this->hasMany(NTCLoteArticulo::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMovProductos()
    {
        return $this->hasMany(NTCMovProducto::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }
}
