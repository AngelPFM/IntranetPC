<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ElementoColeccion".
 *
 * @property integer $idNTC_ElementoColeccion
 * @property integer $fkNTC_Coleccion
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $TextoBoton
 * @property string $UrlBoton
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCColeccion $fkNTCColeccion
 */
class ElementoColeccion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ElementoColeccion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Coleccion', 'Orden', 'Quitar'], 'integer'],
            [['Nombre', 'TextoBoton'], 'string', 'max' => 50],
            [['Descripcion', 'UrlBoton'], 'string', 'max' => 255],
            [['fkNTC_Coleccion'], 'exist', 'skipOnError' => true, 'targetClass' => NTCColeccion::className(), 'targetAttribute' => ['fkNTC_Coleccion' => 'idNTC_Coleccion']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ElementoColeccion' => 'Id Ntc  Elemento Coleccion',
            'fkNTC_Coleccion' => 'Fk Ntc  Coleccion',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'TextoBoton' => 'Texto Boton',
            'UrlBoton' => 'Url Boton',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCColeccion()
    {
        return $this->hasOne(NTCColeccion::className(), ['idNTC_Coleccion' => 'fkNTC_Coleccion']);
    }
}
