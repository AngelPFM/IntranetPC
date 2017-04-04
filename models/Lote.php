<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Lote".
 *
 * @property integer $idNTC_Lote
 * @property string $Nombre
 * @property string $ReferenciaLote
 * @property string $Descripcion
 * @property integer $Quitar
 * @property string $Nuevo_DesdeFecha
 * @property string $Nuevo_HastaFecha
 * @property integer $surtido_libre
 * @property integer $Stock
 * @property integer $Look
 * @property string $Modificado
 *
 * @property NTCLineaCarrito[] $nTCLineaCarritos
 * @property NTCLineaVenta[] $nTCLineaVentas
 * @property NTCLoteArticulo[] $nTCLoteArticulos
 */
class Lote extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Lote';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'string'],
            [['Quitar', 'surtido_libre', 'Stock', 'Look'], 'integer'],
            [['Nuevo_DesdeFecha', 'Nuevo_HastaFecha', 'Modificado'], 'safe'],
            [['Modificado'], 'required'],
            [['Nombre', 'ReferenciaLote'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Lote' => 'Id Ntc  Lote',
            'Nombre' => 'Nombre',
            'ReferenciaLote' => 'Referencia Lote',
            'Descripcion' => 'Descripcion',
            'Quitar' => 'Quitar',
            'Nuevo_DesdeFecha' => 'Nuevo  Desde Fecha',
            'Nuevo_HastaFecha' => 'Nuevo  Hasta Fecha',
            'surtido_libre' => 'Surtido Libre',
            'Stock' => 'Stock',
            'Look' => 'Look',
            'Modificado' => 'Modificado',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaCarritos()
    {
        return $this->hasMany(LineaCarrito::className(), ['fkNTC_Lote' => 'idNTC_Lote']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLineaVentas()
    {
        return $this->hasMany(LineaVenta::className(), ['fkNTC_Lote' => 'idNTC_Lote']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getLoteArticulos()
    {
        return $this->hasMany(LoteArticulo::className(), ['fkNTC_Lote' => 'idNTC_Lote']);
    }
    public function getFicheros()
    {
        return $this->hasMany(Fichero::className(), ['fkNTC_Articulo' => 'idNTC_Articulo']);
    }
    
}
