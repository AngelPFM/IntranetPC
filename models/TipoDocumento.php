<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoDocumento".
 *
 * @property integer $idNTC_TipoDocumento
 * @property string $Nombre
 *
 * @property NTCDiarioProducto[] $nTCDiarioProductos
 * @property NTCMovProducto[] $nTCMovProductos
 */
class TipoDocumento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoDocumento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Nombre'], 'string', 'max' => 80],
            [['Nombre'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoDocumento' => 'Id Ntc  Tipo Documento',
            'Nombre' => 'Nombre',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCDiarioProductos()
    {
        return $this->hasMany(NTCDiarioProducto::className(), ['fkNTC_TipoDocumento' => 'idNTC_TipoDocumento']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCMovProductos()
    {
        return $this->hasMany(NTCMovProducto::className(), ['fkNTC_TipoDocumento' => 'idNTC_TipoDocumento']);
    }
}
