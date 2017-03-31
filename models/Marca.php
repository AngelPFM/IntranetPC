<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Marca".
 *
 * @property integer $idNTC_Marca
 * @property string $Nombre
 * @property string $Imagen
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCArticulo[] $nTCArticulos
 * @property NTCFichero[] $nTCFicheroes
 * @property NTCMarcaAlmacen[] $nTCMarcaAlmacens
 */
class Marca extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Marca';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Orden', 'Quitar'], 'integer'],
            [['Nombre', 'Imagen'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Marca' => 'Id Ntc  Marca',
            'Nombre' => 'Nombre',
            'Imagen' => 'Imagen',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulos()
    {
        return $this->hasMany(Articulo::className(), ['fkNTC_Marca' => 'idNTC_Marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFicheroes()
    {
        return $this->hasMany(Fichero::className(), ['fkNTC_Marca' => 'idNTC_Marca']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarcaAlmacens()
    {
        return $this->hasMany(MarcaAlmacen::className(), ['fkNTC_Marca' => 'idNTC_Marca']);
    }
}
