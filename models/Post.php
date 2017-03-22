<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_Post".
 *
 * @property integer $idNTC_Post
 * @property integer $fkNTC_TipoPost
 * @property string $Fecha
 * @property string $Titulo
 * @property string $Resumen
 * @property string $Descripcion
 * @property string $Slug
 * @property string $UrlVideo
 * @property string $UrlEnlace
 * @property string $Medio
 * @property string $FechaPublicacion
 * @property integer $Quitar
 * @property string $MetaTitle
 * @property string $MetaDescription
 * @property string $MetaKeywords
 * @property string $MetaRobots
 *
 * @property NTCTipoPost $fkNTCTipoPost
 */
class Post extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_Post';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fkNTC_TipoPost', 'Fecha', 'Titulo', 'Slug'], 'required'],
            [['fkNTC_TipoPost', 'Quitar'], 'integer'],
            [['Fecha', 'FechaPublicacion'], 'safe'],
            [['Descripcion'], 'string'],
            [['Titulo'], 'string', 'max' => 150],
            [['Resumen', 'UrlVideo', 'UrlEnlace', 'MetaTitle', 'MetaDescription', 'MetaKeywords', 'MetaRobots'], 'string', 'max' => 255],
            [['Slug', 'Medio'], 'string', 'max' => 100],
            [['fkNTC_TipoPost'], 'exist', 'skipOnError' => true, 'targetClass' => NTCTipoPost::className(), 'targetAttribute' => ['fkNTC_TipoPost' => 'idNTC_TipoPost']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_Post' => 'Id Ntc  Post',
            'fkNTC_TipoPost' => 'Fk Ntc  Tipo Post',
            'Fecha' => 'Fecha',
            'Titulo' => 'Titulo',
            'Resumen' => 'Resumen',
            'Descripcion' => 'Descripcion',
            'Slug' => 'Slug',
            'UrlVideo' => 'Url Video',
            'UrlEnlace' => 'Url Enlace',
            'Medio' => 'Medio',
            'FechaPublicacion' => 'Fecha Publicacion',
            'Quitar' => 'Quitar',
            'MetaTitle' => 'Meta Title',
            'MetaDescription' => 'Meta Description',
            'MetaKeywords' => 'Meta Keywords',
            'MetaRobots' => 'Meta Robots',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFkNTCTipoPost()
    {
        return $this->hasOne(NTCTipoPost::className(), ['idNTC_TipoPost' => 'fkNTC_TipoPost']);
    }
}
