<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Usuario2".
 *
 * @property integer $idNTC_Usuario
 * @property string $Nombre
 * @property integer $fkNTC_Rol
 * @property integer $MaxIntentos
 * @property string $FechaValidezIni
 * @property string $FechaValidezFin
 * @property string $Hash
 * @property integer $Quitar
 * @property string $Email
 *
 * @property NTCDiarioProducto[] $nTCDiarioProductos
 */
class Usuario2 extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Usuario2';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Rol', 'MaxIntentos', 'Quitar'], 'integer'],
            [['FechaValidezIni', 'FechaValidezFin'], 'safe'],
            [['Nombre', 'Hash', 'Email'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Usuario' => 'Id Ntc  Usuario',
            'Nombre' => 'Nombre',
            'fkNTC_Rol' => 'Fk Ntc  Rol',
            'MaxIntentos' => 'Max Intentos',
            'FechaValidezIni' => 'Fecha Validez Ini',
            'FechaValidezFin' => 'Fecha Validez Fin',
            'Hash' => 'Hash',
            'Quitar' => 'Quitar',
            'Email' => 'Email',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDiarioProductos()
    {
        return $this->hasMany(NTCDiarioProducto::className(), ['fkNTC_UsuarioIntranet' => 'idNTC_Usuario']);
    }
}
