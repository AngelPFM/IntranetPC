<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Coleccion".
 *
 * @property integer $idNTC_Coleccion
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $TextoBoton
 * @property string $UrlBoton
 * @property integer $Activa
 * @property integer $Quitar
 *
 * @property NTCElementoColeccion[] $nTCElementoColeccions
 */
class NTCColeccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Coleccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Activa', 'Quitar'], 'integer'],
            [['Nombre', 'TextoBoton'], 'string', 'max' => 50],
            [['Descripcion', 'UrlBoton'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Coleccion' => 'Id Ntc  Coleccion',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'TextoBoton' => 'Texto Boton',
            'UrlBoton' => 'Url Boton',
            'Activa' => 'Activa',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCElementoColeccions()
    {
        return $this->hasMany(NTCElementoColeccion::className(), ['fkNTC_Coleccion' => 'idNTC_Coleccion']);
    }
}
