<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ScriptMarketing;

/**
 * ScriptMarketingSearch represents the model behind the search form about `app\models\ScriptMarketing`.
 */
class ScriptMarketingSearch extends ScriptMarketing
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_ScriptMarketing', 'fkNTC_Pais', 'Header', 'Footer', 'PaginaPedidoOk', 'Home', 'Registro', 'look', 'Quitar'], 'integer'],
            [['Nombre', 'fkNTC_Idioma', 'Script'], 'safe'],
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
        $query = ScriptMarketing::find();

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
            'idNTC_ScriptMarketing' => $this->idNTC_ScriptMarketing,
            'fkNTC_Pais' => $this->fkNTC_Pais,
            'Header' => $this->Header,
            'Footer' => $this->Footer,
            'PaginaPedidoOk' => $this->PaginaPedidoOk,
            'Home' => $this->Home,
            'Registro' => $this->Registro,
            'look' => $this->look,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'fkNTC_Idioma', $this->fkNTC_Idioma])
            ->andFilterWhere(['like', 'Script', $this->Script]);

        return $dataProvider;
    }
}
