<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Provincia;

/**
 * ProvinciaSearch represents the model behind the search form about `app\models\Provincia`.
 */
class ProvinciaSearch extends Provincia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Provincia', 'fkNTC_Pais', 'Quitar', 'fkNTC_TipoIvaNegocio'], 'integer'],
            [['Nombre', 'Codigo'], 'safe'],
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
        $query = Provincia::find();

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
            'idNTC_Provincia' => $this->idNTC_Provincia,
            'fkNTC_Pais' => $this->fkNTC_Pais,
            'Quitar' => $this->Quitar,
            'fkNTC_TipoIvaNegocio' => $this->fkNTC_TipoIvaNegocio,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Codigo', $this->Codigo]);

        return $dataProvider;
    }
}
