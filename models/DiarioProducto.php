<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_DiarioProducto".
 *
 * @property integer $idNTC_DiarioProducto
 * @property string $Fecha
 * @property integer $fkNTC_TipoMovProducto
 * @property integer $fkNTC_TipoDocumento
 * @property integer $fkNTC_Documento
 * @property integer $fkNTC_LineaDocumento
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Variante
 * @property integer $fkNTC_Almacen
 * @property string $Descripcion
 * @property double $Cantidad
 * @property double $Importe
 * @property integer $Aplicada
 * @property string $FechaRegistro
 * @property integer $fkNTC_UsuarioIntranet
 *
 * @property NTCTipoMovProducto $fkNTCTipoMovProducto
 * @property NTCTipoDocumento $fkNTCTipoDocumento
 * @property NTCUsuario2 $fkNTCUsuarioIntranet
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCVariante $fkNTCVariante
 * @property NTCAlmacen $fkNTCAlmacen
 */
class DiarioProducto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_DiarioProducto';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Fecha', 'fkNTC_TipoMovProducto', 'fkNTC_Articulo', 'fkNTC_Almacen', 'Descripcion', 'Cantidad', 'Importe', 'fkNTC_UsuarioIntranet'], 'required'],
            [['Fecha', 'FechaRegistro'], 'safe'],
            [['fkNTC_TipoMovProducto', 'fkNTC_TipoDocumento', 'fkNTC_Documento', 'fkNTC_LineaDocumento', 'fkNTC_Articulo', 'fkNTC_Variante', 'fkNTC_Almacen', 'Aplicada', 'fkNTC_UsuarioIntranet'], 'integer'],
            [['Cantidad', 'Importe'], 'number'],
            [['Descripcion'], 'string', 'max' => 150],
            [['fkNTC_TipoMovProducto'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoMovProducto::className(), 'targetAttribute' => ['fkNTC_TipoMovProducto' => 'idNTC_TipoMovProducto']],
            [['fkNTC_TipoDocumento'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoDocumento::className(), 'targetAttribute' => ['fkNTC_TipoDocumento' => 'idNTC_TipoDocumento']],
            [['fkNTC_UsuarioIntranet'], 'exist', 'skipOnError' => true, 'targetClass' => NTCUsuario2::className(), 'targetAttribute' => ['fkNTC_UsuarioIntranet' => 'idNTC_Usuario']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Variante'], 'exist', 'skipOnError' => true, 'targetClass' => NTCVariante::className(), 'targetAttribute' => ['fkNTC_Variante' => 'idNTC_Variante']],
            [['fkNTC_Almacen'], 'exist', 'skipOnError' => true, 'targetClass' => NTCAlmacen::className(), 'targetAttribute' => ['fkNTC_Almacen' => 'idNTC_Almacen']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_DiarioProducto' => 'Id Ntc  Diario Producto',
            'Fecha' => 'Fecha',
            'fkNTC_TipoMovProducto' => 'Fk Ntc  Tipo Mov Producto',
            'fkNTC_TipoDocumento' => 'Fk Ntc  Tipo Documento',
            'fkNTC_Documento' => 'Fk Ntc  Documento',
            'fkNTC_LineaDocumento' => 'Fk Ntc  Linea Documento',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Variante' => 'Fk Ntc  Variante',
            'fkNTC_Almacen' => 'Fk Ntc  Almacen',
            'Descripcion' => 'Descripcion',
            'Cantidad' => 'Cantidad',
            'Importe' => 'Importe',
            'Aplicada' => 'Aplicada',
            'FechaRegistro' => 'Fecha Registro',
            'fkNTC_UsuarioIntranet' => 'Fk Ntc  Usuario Intranet',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoMovProducto()
    {
        return $this->hasOne(TipoMovProducto::className(), ['idNTC_TipoMovProducto' => 'fkNTC_TipoMovProducto']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTipoDocumento()
    {
        return $this->hasOne(TipoDocumento::className(), ['idNTC_TipoDocumento' => 'fkNTC_TipoDocumento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioIntranet()
    {
        return $this->hasOne(Usuario2::className(), ['idNTC_Usuario' => 'fkNTC_UsuarioIntranet']);
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
    public function getAlmacen()
    {
        return $this->hasOne(Almacen::className(), ['idNTC_Almacen' => 'fkNTC_Almacen']);
    }
}
