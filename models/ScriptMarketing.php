<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_ScriptMarketing".
 *
 * @property integer $idNTC_ScriptMarketing
 * @property string $Nombre
 * @property string $fkNTC_Idioma
 * @property integer $fkNTC_Pais
 * @property integer $Header
 * @property integer $Footer
 * @property integer $PaginaPedidoOk
 * @property integer $Home
 * @property integer $Registro
 * @property integer $look
 * @property string $Script
 * @property integer $Quitar
 *
 * @property NTCIdioma $fkNTCIdioma
 * @property NTCPais $fkNTCPais
 */
class ScriptMarketing extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_ScriptMarketing';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_Pais', 'Header', 'Footer', 'PaginaPedidoOk', 'Home', 'Registro', 'look', 'Quitar'], 'integer'],
            [['Script'], 'string'],
            [['Nombre'], 'string', 'max' => 50],
            [['fkNTC_Idioma'], 'string', 'max' => 2],
            [['fkNTC_Idioma'], 'exist', 'skipOnError' => true, 'targetClass' => NTCIdioma::className(), 'targetAttribute' => ['fkNTC_Idioma' => 'idNTC_Idioma']],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_ScriptMarketing' => 'Id Ntc  Script Marketing',
            'Nombre' => 'Nombre',
            'fkNTC_Idioma' => 'Fk Ntc  Idioma',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'Header' => 'Header',
            'Footer' => 'Footer',
            'PaginaPedidoOk' => 'Pagina Pedido Ok',
            'Home' => 'Home',
            'Registro' => 'Registro',
            'look' => 'Look',
            'Script' => 'Script',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCIdioma()
    {
        return $this->hasOne(NTCIdioma::className(), ['idNTC_Idioma' => 'fkNTC_Idioma']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCPais()
    {
        return $this->hasOne(NTCPais::className(), ['idNTC_Pais' => 'fkNTC_Pais']);
    }
}
