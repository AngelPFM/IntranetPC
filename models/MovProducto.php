<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_MovProducto".
 *
 * @property integer $idNTC_MovProducto
 * @property string $Fecha
 * @property integer $fkNTC_TipoMovProducto
 * @property integer $fkNTC_TipoDocumento
 * @property integer $fkNTC_Documento
 * @property integer $fkNTC_LineaDocumento
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Variante
 * @property integer $fkNTC_Almacen
 * @property string $Descripcion
 * @property integer $Pendiente
 * @property double $Cantidad
 * @property double $CantidadFacturada
 * @property double $CantidadPendiente
 * @property double $Importe
 *
 * @property NTCTipoMovProducto $fkNTCTipoMovProducto
 * @property NTCTipoDocumento $fkNTCTipoDocumento
 * @property NTCAlmacen $fkNTCAlmacen
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCVariante $fkNTCVariante
 */
class MovProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_MovProducto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'fkNTC_TipoMovProducto', 'fkNTC_Articulo', 'fkNTC_Almacen', 'Descripcion', 'Pendiente', 'Cantidad', 'CantidadFacturada', 'CantidadPendiente', 'Importe'], 'required'],
            [['Fecha'], 'safe'],
            [['fkNTC_TipoMovProducto', 'fkNTC_TipoDocumento', 'fkNTC_Documento', 'fkNTC_LineaDocumento', 'fkNTC_Articulo', 'fkNTC_Variante', 'fkNTC_Almacen', 'Pendiente'], 'integer'],
            [['Cantidad', 'CantidadFacturada', 'CantidadPendiente', 'Importe'], 'number'],
            [['Descripcion'], 'string', 'max' => 150],
            [['fkNTC_TipoMovProducto'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoMovProducto::className(), 'targetAttribute' => ['fkNTC_TipoMovProducto' => 'idNTC_TipoMovProducto']],
            [['fkNTC_TipoDocumento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoDocumento::className(), 'targetAttribute' => ['fkNTC_TipoDocumento' => 'idNTC_TipoDocumento']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_MovProducto' => 'Id Ntc  Mov Producto',
            'Fecha' => 'Fecha',
            'fkNTC_TipoMovProducto' => 'Fk Ntc  Tipo Mov Producto',
            'fkNTC_TipoDocumento' => 'Fk Ntc  Tipo Documento',
            'fkNTC_Documento' => 'Fk Ntc  Documento',
            'fkNTC_LineaDocumento' => 'Fk Ntc  Linea Documento',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'Descripcion' => 'Descripcion',
            'Pendiente' => 'Pendiente',
            'Cantidad' => 'Cantidad',
            'CantidadFacturada' => 'Cantidad Facturada',
            'CantidadPendiente' => 'Cantidad Pendiente',
            'Importe' => 'Importe',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoMovProducto()
    {
        return $this->hasOne(NTCTipoMovProducto::className(), ['idNTC_TipoMovProducto' => 'fkNTC_TipoMovProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoDocumento()
    {
        return $this->hasOne(NTCTipoDocumento::className(), ['idNTC_TipoDocumento' => 'fkNTC_TipoDocumento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCAlmacen()
    {
        return $this->hasOne(NTCAlmacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
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
    public function getFkNTCVariante()
    {
        return $this->hasOne(NTCVariante::className(), ['idNTC_Variante' => 'fkNTC_Variante']);
    }
}
