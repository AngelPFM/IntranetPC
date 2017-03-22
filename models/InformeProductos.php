<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_InformeProductos".
 *
 * @property integer $idNTC_Articulo
 * @property string $Descripcion
 * @property string $Referencia
 * @property string $ReferenciaProveedor
 * @property integer $surtido_libre
 * @property string $Nombre
 */
class InformeProductos extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_InformeProductos';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Articulo', 'surtido_libre'], 'integer'],
            [['Descripcion'], 'string', 'max' => 255],
            [['Referencia'], 'string', 'max' => 45],
            [['ReferenciaProveedor', 'Nombre'], 'string', 'max' => 80],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Articulo' => 'Id Ntc  Articulo',
            'Descripcion' => 'Descripcion',
            'Referencia' => 'Referencia',
            'ReferenciaProveedor' => 'Referencia Proveedor',
            'surtido_libre' => 'Surtido Libre',
            'Nombre' => 'Nombre',
        ];
    }
}
