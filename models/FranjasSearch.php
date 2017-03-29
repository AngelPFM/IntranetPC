<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Franja;

/**
 * FranjasSearch represents the model behind the search form about `app\models\Franja`.
 */
class FranjasSearch extends Franja
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Franja', 'Quitar'], 'integer'],
            [['PrecioxPar', 'Incremento'], 'number'],
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
        $query = Franja::find();

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
            'idNTC_Franja' => $this->idNTC_Franja,
            'PrecioxPar' => $this->PrecioxPar,
            'Incremento' => $this->Incremento,
            'Quitar' => $this->Quitar,
        ]);

        return $dataProvider;
    }
}
