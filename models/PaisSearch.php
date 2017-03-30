<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Pais;

/**
 * PaisSearch represents the model behind the search form about `app\models\Pais`.
 */
class PaisSearch extends Pais
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Pais', 'fkNTC_Divisa', 'fkNTC_TipoIvaNegocio', 'Quitar'], 'integer'],
            [['Nombre', 'fkNTC_Idioma', 'Iso2', 'Iso3', 'Prefijo', 'ccTLD'], 'safe'],
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
        $query = Pais::find();

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
            'idNTC_Pais' => $this->idNTC_Pais,
            'fkNTC_Divisa' => $this->fkNTC_Divisa,
            'fkNTC_TipoIvaNegocio' => $this->fkNTC_TipoIvaNegocio,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'fkNTC_Idioma', $this->fkNTC_Idioma])
            ->andFilterWhere(['like', 'Iso2', $this->Iso2])
            ->andFilterWhere(['like', 'Iso3', $this->Iso3])
            ->andFilterWhere(['like', 'Prefijo', $this->Prefijo])
            ->andFilterWhere(['like', 'ccTLD', $this->ccTLD]);

        return $dataProvider;
    }
}
