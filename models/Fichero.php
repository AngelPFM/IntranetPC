<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Fichero".
 *
 * @property integer $idNTC_Fichero
 * @property string $Fichero
 * @property string $Nombre
 * @property integer $Size
 * @property integer $Width
 * @property integer $Height
 * @property integer $fkNTC_TipoFichero
 * @property string $Titulo
 * @property string $Descripcion
 * @property integer $Orden
 * @property integer $fkNTC_Articulo
 * @property integer $fkNTC_Empresa
 * @property integer $fkNTC_BloqueCMS
 * @property integer $fkNTC_Archivos
 * @property integer $fkNTC_Marca
 * @property string $FechaIns
 * @property integer $Quitar
 *
 * @property NTCEnlaceFichero[] $nTCEnlaceFicheroes
 * @property NTCArchivos $fkNTCArchivos
 * @property NTCArticulo $fkNTCArticulo
 * @property NTCEmpresa $fkNTCEmpresa
 * @property NTCMarca $fkNTCMarca
 */
class Fichero extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Fichero';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Size', 'Width', 'Height', 'fkNTC_TipoFichero', 'Orden', 'fkNTC_Articulo', 'fkNTC_Empresa', 'fkNTC_BloqueCMS', 'fkNTC_Archivos', 'fkNTC_Marca', 'Quitar'], 'integer'],
            [['Descripcion'], 'string'],
            [['FechaIns'], 'safe'],
            [['Fichero', 'Nombre'], 'string', 'max' => 250],
            [['Titulo'], 'string', 'max' => 255],
            [['fkNTC_Archivos'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArchivos::className(), 'targetAttribute' => ['fkNTC_Archivos' => 'idNTC_Archivos']],
            [['fkNTC_Articulo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCArticulo::className(), 'targetAttribute' => ['fkNTC_Articulo' => 'idNTC_Articulo']],
            [['fkNTC_Empresa'], 'exist', 'skipOnError' => true, 'targetClass' => NTCEmpresa::className(), 'targetAttribute' => ['fkNTC_Empresa' => 'idNTC_Empresa']],
            [['fkNTC_Marca'], 'exist', 'skipOnError' => true, 'targetClass' => NTCMarca::className(), 'targetAttribute' => ['fkNTC_Marca' => 'idNTC_Marca']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Fichero' => 'Id Ntc  Fichero',
            'Fichero' => 'Fichero',
            'Nombre' => 'Nombre',
            'Size' => 'Size',
            'Width' => 'Width',
            'Height' => 'Height',
            'fkNTC_TipoFichero' => 'Fk Ntc  Tipo Fichero',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Orden' => 'Orden',
            'fkNTC_Articulo' => 'Fk Ntc  Articulo',
            'fkNTC_Empresa' => 'Fk Ntc  Empresa',
            'fkNTC_BloqueCMS' => 'Fk Ntc  Bloque Cms',
            'fkNTC_Archivos' => 'Fk Ntc  Archivos',
            'fkNTC_Marca' => 'Fk Ntc  Marca',
            'FechaIns' => 'Fecha Ins',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEnlaceFicheroes()
    {
        return $this->hasMany(EnlaceFichero::className(), ['fkNTC_Fichero' => 'idNTC_Fichero']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArchivos()
    {
        return $this->hasOne(Archivos::className(), ['idNTC_Archivos' => 'fkNTC_Archivos']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArticulo()
    {
        return $this->hasOne(Articulo::className(), ['idNTC_Articulo' => 'fkNTC_Articulo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEmpresa()
    {
        return $this->hasOne(Empresa::className(), ['idNTC_Empresa' => 'fkNTC_Empresa']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getMarca()
    {
        return $this->hasOne(Marca::className(), ['idNTC_Marca' => 'fkNTC_Marca']);
    }
    public function getLote(){
        return $this->hasOne(Lote::className(), [  'idNTC_Articulo'=> 'fkNTC_Articulo']);
    }
}
