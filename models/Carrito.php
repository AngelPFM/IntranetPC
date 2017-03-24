<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Carrito".
 *
 * @property integer $idNTC_Carrito
 * @property integer $fkNTC_UsuarioWeb
 * @property integer $fkNTC_Cliente
 * @property string $SessionId
 * @property integer $fkNTC_DocumentoVenta
 * @property string $Fecha
 * @property integer $Abandonado
 * @property integer $Quitar
 *
 * @property NTCUsuarioWeb $fkNTCUsuarioWeb
 * @property NTCCliente $fkNTCCliente
 * @property NTCDocumentoVenta $fkNTCDocumentoVenta
 * @property NTCCuponCarrito[] $nTCCuponCarritos
 * @property NTCCuponDescuento[] $fkNTCCuponDescuentos
 * @property NTCLineaCarrito[] $nTCLineaCarritos
 */
class Carrito extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Carrito';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_UsuarioWeb', 'fkNTC_Cliente', 'fkNTC_DocumentoVenta', 'Abandonado', 'Quitar'], 'integer'],
            [['SessionId', 'Fecha'], 'required'],
            [['Fecha'], 'safe'],
            [['SessionId'], 'string', 'max' => 255],
            [['fkNTC_UsuarioWeb'], 'exist', 'skipOnError' => true, 'targetClass' => NTCUsuarioWeb::className(), 'targetAttribute' => ['fkNTC_UsuarioWeb' => 'idNTC_UsuarioWeb']],
            [['fkNTC_Cliente'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCliente::className(), 'targetAttribute' => ['fkNTC_Cliente' => 'idNTC_Cliente']],
            [['fkNTC_DocumentoVenta'], 'exist', 'skipOnError' => true, 'targetClass' => NTCDocumentoVenta::className(), 'targetAttribute' => ['fkNTC_DocumentoVenta' => 'idNTC_DocumentoVenta']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Carrito' => 'Id Ntc  Carrito',
            'fkNTC_UsuarioWeb' => 'Fk Ntc  Usuario Web',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'SessionId' => 'Session ID',
            'fkNTC_DocumentoVenta' => 'Fk Ntc  Documento Venta',
            'Fecha' => 'Fecha',
            'Abandonado' => 'Abandonado',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsuarioWeb()
    {
        return $this->hasOne(UsuarioWeb::className(), ['idNTC_UsuarioWeb' => 'fkNTC_UsuarioWeb']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCliente()
    {
        return $this->hasOne(Cliente::className(), ['idNTC_Cliente' => 'fkNTC_Cliente']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCDocumentoVenta()
    {
        return $this->hasOne(NTCDocumentoVenta::className(), ['idNTC_DocumentoVenta' => 'fkNTC_DocumentoVenta']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCuponCarritos()
    {
        return $this->hasMany(NTCCuponCarrito::className(), ['fkNTC_Carrito' => 'idNTC_Carrito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCCuponDescuentos()
    {
        return $this->hasMany(NTCCuponDescuento::className(), ['idNTC_CuponDescuento' => 'fkNTC_CuponDescuento'])->viaTable('NTC_CuponCarrito', ['fkNTC_Carrito' => 'idNTC_Carrito']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCLineaCarritos()
    {
        return $this->hasMany(NTCLineaCarrito::className(), ['fkNTC_Carrito' => 'idNTC_Carrito']);
    }
}
