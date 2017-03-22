<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_VisitaArticulo".
 *
 * @property integer $idNTC_VisitaArticulo
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Cliente
 * @property string $SessionId
 * @property string $Fecha
 * @property integer $Quitar
 */
class NTCVisitaArticulo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_VisitaArticulo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Articulo', 'fkNTC_Cliente', 'Quitar'], 'integer'],
            [['Fecha'], 'safe'],
            [['SessionId'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_VisitaArticulo' => 'Id Ntc  Visita Articulo',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Cliente' => 'Fk Ntc  Cliente',
            'SessionId' => 'Session ID',
            'Fecha' => 'Fecha',
            'Quitar' => 'Quitar',
        ];
    }
}
