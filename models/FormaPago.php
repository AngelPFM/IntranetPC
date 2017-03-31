<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_FormaPago".
 *
 * @property integer $idNTC_FormaPago
 * @property string $Nombre
 * @property string $Descripcion
 * @property string $InfoAdicional
 * @property double $Recargo
 * @property integer $PorDefecto
 * @property integer $fkNTC_TerminoPago
 * @property integer $Activa
 * @property integer $Quitar
 * @property integer $EnProduccion
 * @property string $UrlTest
 * @property string $UrlProduccion
 * @property integer $ValidacionPasiva
 * @property string $TokenValidacion
 * @property string $UrlOK
 * @property string $UrlKO
 * @property integer $Gratuita
 *
 * @property NTCCabAbonoVenta[] $nTCCabAbonoVentas
 * @property NTCCabFacturaVenta[] $nTCCabFacturaVentas
 * @property NTCConfiguracion[] $nTCConfiguracions
 * @property NTCCuponDescuento[] $nTCCuponDescuentos
 * @property NTCDocumentoVenta[] $nTCDocumentoVentas
 * @property NTCTerminoPago $fkNTCTerminoPago
 * @property NTCOperacion[] $nTCOperacions
 */
class FormaPago extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_FormaPago';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_FormaPago', 'Nombre', 'fkNTC_TerminoPago'], 'required'],
            [['idNTC_FormaPago', 'PorDefecto', 'fkNTC_TerminoPago', 'Activa', 'Quitar', 'EnProduccion', 'ValidacionPasiva', 'Gratuita'], 'integer'],
            [['InfoAdicional'], 'string'],
            [['Recargo'], 'number'],
            [['Nombre'], 'string', 'max' => 20],
            [['Descripcion'], 'string', 'max' => 50],
            [['UrlTest', 'UrlProduccion', 'TokenValidacion', 'UrlOK', 'UrlKO'], 'string', 'max' => 255],
            [['fkNTC_TerminoPago'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTerminoPago::className(), 'targetAttribute' => ['fkNTC_TerminoPago' => 'idNTC_TerminoPago']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_FormaPago' => 'Id Ntc  Forma Pago',
            'Nombre' => 'Nombre',
            'Descripcion' => 'Descripcion',
            'InfoAdicional' => 'Info Adicional',
            'Recargo' => 'Recargo',
            'PorDefecto' => 'Por Defecto',
            'fkNTC_TerminoPago' => 'Fk Ntc  Termino Pago',
            'Activa' => 'Activa',
            'Quitar' => 'Quitar',
            'EnProduccion' => 'En Produccion',
            'UrlTest' => 'Url Test',
            'UrlProduccion' => 'Url Produccion',
            'ValidacionPasiva' => 'Validacion Pasiva',
            'TokenValidacion' => 'Token Validacion',
            'UrlOK' => 'Url Ok',
            'UrlKO' => 'Url Ko',
            'Gratuita' => 'Gratuita',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabAbonoVentas()
    {
        return $this->hasMany(CabAbonoVenta::className(), ['fkNTC_FormaPago' => 'idNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCabFacturaVentas()
    {
        return $this->hasMany(CabFacturaVenta::className(), ['fkNTC_FormaPago' => 'idNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getConfiguracions()
    {
        return $this->hasMany(Configuracion::className(), ['fkNTC_FormaPago' => 'idNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCuponDescuentos()
    {
        return $this->hasMany(CuponDescuento::className(), ['fkNTC_FormaPago' => 'idNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getDocumentoVentas()
    {
        return $this->hasMany(DocumentoVenta::className(), ['fkNTC_FormaPago' => 'idNTC_FormaPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTerminoPago()
    {
        return $this->hasOne(TerminoPago::className(), ['idNTC_TerminoPago' => 'fkNTC_TerminoPago']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOperacions()
    {
        return $this->hasMany(Operacion::className(), ['fkNTC_FormaPago' => 'idNTC_FormaPago']);
    }
}
