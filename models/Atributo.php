<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Atributo".
 *
 * @property integer $idNTC_Atributo
 * @property string $Codigo
 * @property string $Etiqueta
 * @property integer $Requerido
 * @property integer $Buscable
 * @property integer $Comparable
 * @property integer $fkNTC_TipoDatosAtributo
 * @property integer $TieneOpciones
 * @property string $ValorPorDefecto
 * @property integer $Validacion
 * @property integer $AplicarATodos
 * @property integer $DefineProducto
 * @property integer $FormatoOpciones
 * @property integer $MostrarEnFicha
 * @property integer $esColor
 * @property integer $esTalla
 * @property string $TablaAsociada
 * @property integer $Quitar
 *
 * @property NTCTipoDatosAtributo $fkNTCTipoDatosAtributo
 * @property NTCAtributoConjunto[] $nTCAtributoConjuntos
 * @property NTCConjuntoAtributos[] $fkNTCConjuntoAtributos
 * @property NTCOpcionAtributo[] $nTCOpcionAtributos
 */
class Atributo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Atributo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Codigo', 'fkNTC_TipoDatosAtributo', 'FormatoOpciones'], 'required'],
            [['Requerido', 'Buscable', 'Comparable', 'fkNTC_TipoDatosAtributo', 'TieneOpciones', 'Validacion', 'AplicarATodos', 'DefineProducto', 'FormatoOpciones', 'MostrarEnFicha', 'esColor', 'esTalla', 'Quitar'], 'integer'],
            [['Codigo'], 'string', 'max' => 25],
            [['Etiqueta'], 'string', 'max' => 80],
            [['ValorPorDefecto', 'TablaAsociada'], 'string', 'max' => 255],
            [['fkNTC_TipoDatosAtributo'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoDatosAtributo::className(), 'targetAttribute' => ['fkNTC_TipoDatosAtributo' => 'idNTC_TipoDatosAtributo']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Atributo' => 'Id Ntc  Atributo',
            'Codigo' => 'Codigo',
            'Etiqueta' => 'Etiqueta',
            'Requerido' => 'Requerido',
            'Buscable' => 'Buscable',
            'Comparable' => 'Comparable',
            'fkNTC_TipoDatosAtributo' => 'Fk Ntc  Tipo Datos Atributo',
            'TieneOpciones' => 'Tiene Opciones',
            'ValorPorDefecto' => 'Valor Por Defecto',
            'Validacion' => 'Validacion',
            'AplicarATodos' => 'Aplicar Atodos',
            'DefineProducto' => 'Define Producto',
            'FormatoOpciones' => 'Formato Opciones',
            'MostrarEnFicha' => 'Mostrar En Ficha',
            'esColor' => 'Es Color',
            'esTalla' => 'Es Talla',
            'TablaAsociada' => 'Tabla Asociada',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoDatosAtributo()
    {
        return $this->hasOne(NTCTipoDatosAtributo::className(), ['idNTC_TipoDatosAtributo' => 'fkNTC_TipoDatosAtributo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCAtributoConjuntos()
    {
        return $this->hasMany(NTCAtributoConjunto::className(), ['fkNTC_Atributo' => 'idNTC_Atributo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCConjuntoAtributos()
    {
        return $this->hasMany(NTCConjuntoAtributos::className(), ['idNTC_ConjuntoAtributos' => 'fkNTC_ConjuntoAtributos'])->viaTable('NTC_AtributoConjunto', ['fkNTC_Atributo' => 'idNTC_Atributo']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCOpcionAtributos()
    {
        return $this->hasMany(NTCOpcionAtributo::className(), ['fkNTC_Atributo' => 'idNTC_Atributo']);
    }
}
