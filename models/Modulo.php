<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Modulo".
 *
 * @property integer $idNTC_Modulo
 * @property string $Nombre
 * @property string $Modelo
 * @property string $Sql
 * @property string $Descripcion
 * @property integer $MaxPorPagina
 * @property integer $Padre
 * @property integer $Visitas
 * @property integer $Orden
 * @property string $Ordenacion
 * @property integer $TraduccionMultiple
 * @property integer $Csv
 * @property integer $Quitar
 *
 * @property NTCAccion[] $nTCAccions
 * @property NTCCampo[] $nTCCampos
 */
class Modulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Modulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Descripcion'], 'required'],
            [['Descripcion'], 'string'],
            [['MaxPorPagina', 'Padre', 'Visitas', 'Orden', 'TraduccionMultiple', 'Csv', 'Quitar'], 'integer'],
            [['Nombre', 'Modelo'], 'string', 'max' => 255],
            [['Sql'], 'string', 'max' => 4000],
            [['Ordenacion'], 'string', 'max' => 150],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Modulo' => 'Id Ntc  Modulo',
            'Nombre' => 'Nombre',
            'Modelo' => 'Modelo',
            'Sql' => 'Sql',
            'Descripcion' => 'Descripcion',
            'MaxPorPagina' => 'Max Por Pagina',
            'Padre' => 'Padre',
            'Visitas' => 'Visitas',
            'Orden' => 'Orden',
            'Ordenacion' => 'Ordenacion',
            'TraduccionMultiple' => 'Traduccion Multiple',
            'Csv' => 'Csv',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAccions()
    {
        return $this->hasMany(Accion::className(), ['fkNTC_Modulo' => 'idNTC_Modulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCampos()
    {
        return $this->hasMany(Campo::className(), ['fkNTC_Modulo' => 'idNTC_Modulo']);
    }
}
