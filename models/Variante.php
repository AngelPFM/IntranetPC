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
    public function getArticuloNewsletters()
    {
        return $this->hasMany(ArticuloNewsletter::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDetalleVariantes()
    {
        return $this->hasMany(DetalleVariante::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDiarioProductos()
    {
        return $this->hasMany(DiarioProducto::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaAbonoVentas()
    {
        return $this->hasMany(LineaAbonoVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaAlbaranVentas()
    {
        return $this->hasMany(LineaAlbaranVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaCarritos()
    {
        return $this->hasMany(LineaCarrito::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaDevolucionVentas()
    {
        return $this->hasMany(LineaDevolucionVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaFacturaVentas()
    {
        return $this->hasMany(LineaFacturaVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaVentas()
    {
        return $this->hasMany(LineaVenta::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoteArticulos()
    {
        return $this->hasMany(LoteArticulo::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMovProductos()
    {
        return $this->hasMany(MovProducto::className(), ['fkNTC_Variante' => 'idNTC_Variante']);
    }
}
