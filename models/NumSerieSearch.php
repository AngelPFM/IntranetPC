<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\NumSerie;

/**
 * NumSerieSearch represents the model behind the search form about `app\models\NumSerie`.
 */
class NumSerieSearch extends NumSerie
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_NumSerie'], 'integer'],
            [['Nombre', 'Descripcion', 'Desde', 'Hasta', 'Ultimo'], 'safe'],
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
        $query = NumSerie::find();

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
            'idNTC_NumSerie' => $this->idNTC_NumSerie,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Desde', $this->Desde])
            ->andFilterWhere(['like', 'Hasta', $this->Hasta])
            ->andFilterWhere(['like', 'Ultimo', $this->Ultimo]);

        return $dataProvider;
    }
}
