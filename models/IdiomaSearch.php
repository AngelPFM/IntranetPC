<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Idioma;

/**
 * IdiomaSearch represents the model behind the search form about `app\models\Idioma`.
 */
class IdiomaSearch extends Idioma
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Idioma', 'Nombre'], 'safe'],
            [['Activo', 'Quitar'], 'integer'],
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
        $query = Idioma::find();

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
            'Activo' => $this->Activo,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'idNTC_Idioma', $this->idNTC_Idioma])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
