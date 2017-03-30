<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\EstaticosCMS;

/**
 * EstaticosCMSSearch represents the model behind the search form about `app\models\EstaticosCMS`.
 */
class EstaticosCMSSearch extends EstaticosCMS
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_EstaticosCMS', 'IsHTML', 'EstilosCSS', 'Quitar'], 'integer'],
            [['Nombre', 'Titulo', 'Descripcion', 'fkNTC_Idioma', 'MetaTitle', 'MetaDescription', 'MetaKeywords', 'MetaRobots'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = EstaticosCMS::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'idNTC_EstaticosCMS' => $this->idNTC_EstaticosCMS,
            'IsHTML' => $this->IsHTML,
            'EstilosCSS' => $this->EstilosCSS,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'fkNTC_Idioma', $this->fkNTC_Idioma])
            ->andFilterWhere(['like', 'MetaTitle', $this->MetaTitle])
            ->andFilterWhere(['like', 'MetaDescription', $this->MetaDescription])
            ->andFilterWhere(['like', 'MetaKeywords', $this->MetaKeywords])
            ->andFilterWhere(['like', 'MetaRobots', $this->MetaRobots]);

        return $dataProvider;
    }
}
