<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_PuntosVenta".
 *
 * @property integer $idNTC_PuntoVenta
 * @property string $Nombre
 * @property string $Direccion
 * @property integer $fkNTC_Localidad
 * @property integer $fkNTC_Provincia
 * @property string $CodigoPostal
 * @property integer $fkNTC_Pais
 * @property string $CoordX
 * @property string $CoordY
 * @property string $Telefono
 * @property string $Fax
 * @property string $Email
 * @property integer $Online
 * @property string $Web
 * @property string $Contacto
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCLocalidad $fkNTCLocalidad
 * @property NTCProvincia $fkNTCProvincia
 * @property NTCPais $fkNTCPais
 */
class NTCPuntosVenta extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_PuntosVenta';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'Direccion', 'fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'CoordX', 'CoordY', 'Telefono', 'Fax', 'Email', 'Web', 'Contacto'], 'required'],
            [['fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Online', 'Orden', 'Quitar'], 'integer'],
            [['Nombre', 'Contacto'], 'string', 'max' => 80],
            [['Direccion', 'Email'], 'string', 'max' => 150],
            [['CodigoPostal', 'Telefono', 'Fax'], 'string', 'max' => 10],
            [['CoordX', 'CoordY'], 'string', 'max' => 50],
            [['Web'], 'string', 'max' => 255],
            [['fkNTC_Localidad'], 'exist', 'skipOnError' => true, 'targetClass' => NTCLocalidad::className(), 'targetAttribute' => ['fkNTC_Localidad' => 'idNTC_Localidad']],
            [['fkNTC_Provincia'], 'exist', 'skipOnError' => true, 'targetClass' => NTCProvincia::className(), 'targetAttribute' => ['fkNTC_Provincia' => 'idNTC_Provincia']],
            [['fkNTC_Pais'], 'exist', 'skipOnError' => true, 'targetClass' => NTCPais::className(), 'targetAttribute' => ['fkNTC_Pais' => 'idNTC_Pais']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_PuntoVenta' => 'Id Ntc  Punto Venta',
            'Nombre' => 'Nombre',
            'Direccion' => 'Direccion',
            'fkNTC_Localidad' => 'Fk Ntc  Localidad',
            'fkNTC_Provincia' => 'Fk Ntc  Provincia',
            'CodigoPostal' => 'Codigo Postal',
            'fkNTC_Pais' => 'Fk Ntc  Pais',
            'CoordX' => 'Coord X',
            'CoordY' => 'Coord Y',
            'Telefono' => 'Telefono',
            'Fax' => 'Fax',
            'Email' => 'Email',
            'Online' => 'Online',
            'Web' => 'Web',
            'Contacto' => 'Contacto',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCLocalidad()
    {
        return $this->hasOne(NTCLocalidad::className(), ['idNTC_Localidad' => 'fkNTC_Localidad']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCProvincia()
    {
        return $this->hasOne(NTCProvincia::className(), ['idNTC_Provincia' => 'fkNTC_Provincia']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCPais()
    {
        return $this->hasOne(NTCPais::className(), ['idNTC_Pais' => 'fkNTC_Pais']);
    }
}
