<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Menu".
 *
 * @property integer $idNTC_Menu
 * @property string $Nombre
 * @property integer $fkNTC_Padre
 * @property integer $fkNTC_TipoMenu
 * @property string $fkNTC_Idioma
 * @property string $Descripcion
 * @property string $Frase
 * @property string $Url
 * @property integer $Externo
 * @property string $Titulo
 * @property integer $TieneHijos
 * @property integer $Expandido
 * @property integer $RequiereLogin
 * @property string $TablaTotales
 * @property integer $fkNTC_UsuarioWeb
 * @property string $FiltroTotales
 * @property string $TablaCategorias
 * @property string $FiltroCategorias
 * @property integer $Orden
 * @property integer $Independiente
 * @property integer $Ancho
 * @property string $HtmlClass
 * @property string $MetaTitle
 * @property string $MetaDescription
 * @property string $MetaKeywords
 * @property string $MetaRobots
 * @property integer $Quitar
 *
 * @property NTCBloqueCMS[] $nTCBloqueCMSs
 */
class Menu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Menu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre', 'HtmlClass'], 'required'],
            [['fkNTC_Padre', 'fkNTC_TipoMenu', 'Externo', 'TieneHijos', 'Expandido', 'RequiereLogin', 'fkNTC_UsuarioWeb', 'Orden', 'Independiente', 'Ancho', 'Quitar'], 'integer'],
            [['Descripcion'], 'string'],
            [['Nombre', 'Titulo', 'TablaTotales', 'TablaCategorias'], 'string', 'max' => 80],
            [['fkNTC_Idioma'], 'string', 'max' => 2],
            [['Frase', 'Url', 'FiltroTotales', 'FiltroCategorias', 'MetaTitle', 'MetaDescription', 'MetaKeywords', 'MetaRobots'], 'string', 'max' => 255],
            [['HtmlClass'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Menu' => 'Id Ntc  Menu',
            'Nombre' => 'Nombre',
            'fkNTC_Padre' => 'Fk Ntc  Padre',
            'fkNTC_TipoMenu' => 'Fk Ntc  Tipo Menu',
            'fkNTC_Idioma' => 'Fk Ntc  Idioma',
            'Descripcion' => 'Descripcion',
            'Frase' => 'Frase',
            'Url' => 'Url',
            'Externo' => 'Externo',
            'Titulo' => 'Titulo',
            'TieneHijos' => 'Tiene Hijos',
            'Expandido' => 'Expandido',
            'RequiereLogin' => 'Requiere Login',
            'TablaTotales' => 'Tabla Totales',
            'fkNTC_UsuarioWeb' => 'Fk Ntc  Usuario Web',
            'FiltroTotales' => 'Filtro Totales',
            'TablaCategorias' => 'Tabla Categorias',
            'FiltroCategorias' => 'Filtro Categorias',
            'Orden' => 'Orden',
            'Independiente' => 'Independiente',
            'Ancho' => 'Ancho',
            'HtmlClass' => 'Html Class',
            'MetaTitle' => 'Meta Title',
            'MetaDescription' => 'Meta Description',
            'MetaKeywords' => 'Meta Keywords',
            'MetaRobots' => 'Meta Robots',
            'Quitar' => 'Quitar',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBloqueCMSs()
    {
        return $this->hasMany(BloqueCMS::className(), ['fkNTC_Menu' => 'idNTC_Menu']);
    }
    
}
