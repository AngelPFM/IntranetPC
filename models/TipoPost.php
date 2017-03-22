<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "NTC_TipoPost".
 *
 * @property integer $idNTC_TipoPost
 * @property string $Nombre
 * @property integer $Quitar
 * @property string $MetaTitle
 * @property string $MetaDescription
 * @property string $MetaKeywords
 * @property string $MetaRobots
 *
 * @property NTCPost[] $nTCPosts
 */
class TipoPost extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'NTC_TipoPost';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['Nombre'], 'required'],
            [['Quitar'], 'integer'],
            [['Nombre'], 'string', 'max' => 50],
            [['MetaTitle', 'MetaDescription', 'MetaKeywords', 'MetaRobots'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'idNTC_TipoPost' => 'Id Ntc  Tipo Post',
            'Nombre' => 'Nombre',
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
    public function getNTCPosts()
    {
        return $this->hasMany(NTCPost::className(), ['fkNTC_TipoPost' => 'idNTC_TipoPost']);
    }
}
