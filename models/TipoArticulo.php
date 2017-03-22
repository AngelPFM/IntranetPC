<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoArticulo".
 *
 * @property integer $idNTC_TipoArticulo
 * @property integer $fkNTC_MaestroTipoArticulo
 * @property integer $fkNTC_ConjuntoAtributos
 * @property string $Nombre
 * @property string $Descripcion
 */
class NTCTipoArticulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoArticulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_MaestroTipoArticulo', 'fkNTC_ConjuntoAtributos', 'Nombre'], 'required'],
            [['fkNTC_MaestroTipoArticulo', 'fkNTC_ConjuntoAtributos'], 'integer'],
            [['Nombre'], 'string', 'max' => 45],
            [['Descripcion'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoArticulo' => 'Id Ntc  Tipo Articulo',
            'fkNTC_MaestroTipoArticulo' => 'Fk Ntc  Maestro Tipo Articulo',
            'fkNTC_ConjuntoAtributos' => 'Fk Ntc  Conjunto Atributos',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
        ];
    }
}
