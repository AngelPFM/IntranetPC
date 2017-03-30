<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\OpcionAtributo;

/**
 * OpcionAtributoSearch represents the model behind the search form about `app\models\OpcionAtributo`.
 */
class OpcionAtributoSearch extends OpcionAtributo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_OpcionAtributo', 'fkNTC_Atributo', 'Orden', 'Quitar'], 'integer'],
            [['Nombre', 'Opcion', 'Descripcion', 'Medida'], 'safe'],
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
        $query = OpcionAtributo::find();

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
            'idNTC_OpcionAtributo' => $this->idNTC_OpcionAtributo,
            'fkNTC_Atributo' => $this->fkNTC_Atributo,
            'Orden' => $this->Orden,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Opcion', $this->Opcion])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Medida', $this->Medida]);

        return $dataProvider;
    }
}
