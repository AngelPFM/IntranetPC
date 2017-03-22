<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Categoria".
 *
 * @property integer $idNTC_Categoria
 * @property integer $Raiz
 * @property integer $fkNTC_padre
 * @property string $Nombre
 * @property string $Titulo
 * @property string $Descripcion
 * @property string $Frase
 * @property integer $TieneHijos
 * @property string $TituloPagina
 * @property integer $IncluirEnMenu
 * @property integer $Activa
 * @property integer $MostrarArticulos
 * @property integer $fkNTC_CMS
 * @property string $MetaTitle
 * @property string $MetaKeywords
 * @property string $MetaDescription
 * @property string $MetaRobots
 * @property integer $ConComposicion
 * @property integer $Orden
 * @property integer $Quitar
 *
 * @property NTCArticuloCategoria[] $nTCArticuloCategorias
 * @property NTCArticuloNewsletter[] $nTCArticuloNewsletters
 * @property NTCCategoria $fkNTCPadre
 * @property NTCCategoria[] $nTCCategorias
 * @property NTCEscaparate[] $nTCEscaparates
 */
class Categoria extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Categoria';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Raiz', 'fkNTC_padre', 'TieneHijos', 'IncluirEnMenu', 'Activa', 'MostrarArticulos', 'fkNTC_CMS', 'ConComposicion', 'Orden', 'Quitar'], 'integer'],
            [['Nombre'], 'required'],
            [['Descripcion'], 'string'],
            [['Nombre'], 'string', 'max' => 80],
            [['Titulo'], 'string', 'max' => 100],
            [['Frase', 'TituloPagina', 'MetaTitle', 'MetaKeywords', 'MetaDescription', 'MetaRobots'], 'string', 'max' => 255],
            [['fkNTC_padre'], 'exist', 'skipOnError' => true, 'targetClass' => NTCCategoria::className(), 'targetAttribute' => ['fkNTC_padre' => 'idNTC_Categoria']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Categoria' => 'Id Ntc  Categoria',
            'Raiz' => 'Raiz',
            'fkNTC_padre' => 'Fk Ntc Padre',
            'Nombre' => 'Nombre',
            'Titulo' => 'Titulo',
            'Descripcion' => 'Descripcion',
            'Frase' => 'Frase',
            'TieneHijos' => 'Tiene Hijos',
            'TituloPagina' => 'Titulo Pagina',
            'IncluirEnMenu' => 'Incluir En Menu',
            'Activa' => 'Activa',
            'MostrarArticulos' => 'Mostrar Articulos',
            'fkNTC_CMS' => 'Fk Ntc  Cms',
            'MetaTitle' => 'Meta Title',
            'MetaKeywords' => 'Meta Keywords',
            'MetaDescription' => 'Meta Description',
            'MetaRobots' => 'Meta Robots',
            'ConComposicion' => 'Con Composicion',
            'Orden' => 'Orden',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloCategorias()
    {
        return $this->hasMany(NTCArticuloCategoria::className(), ['fkNTC_Categoria' => 'idNTC_Categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCArticuloNewsletters()
    {
        return $this->hasMany(NTCArticuloNewsletter::className(), ['fkNTC_Categoria' => 'idNTC_Categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCPadre()
    {
        return $this->hasOne(NTCCategoria::className(), ['idNTC_Categoria' => 'fkNTC_padre']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCCategorias()
    {
        return $this->hasMany(NTCCategoria::className(), ['fkNTC_padre' => 'idNTC_Categoria']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getNTCEscaparates()
    {
        return $this->hasMany(NTCEscaparate::className(), ['fkNTC_Categoria' => 'idNTC_Categoria']);
    }
}
