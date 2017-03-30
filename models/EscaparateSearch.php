<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Escaparate;

/**
 * EscaparateSearch represents the model behind the search form about `app\models\Escaparate`.
 */
class EscaparateSearch extends Escaparate
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Escaparate', 'fkNTC_Articulo', 'fkNTC_Categoria', 'TextoDerecha', 'Orden', 'Quitar'], 'integer'],
            [['Titulo', 'Descripcion', 'TextoBoton', 'Url'], 'safe'],
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
        $query = Escaparate::find();

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
            'idNTC_Escaparate' => $this->idNTC_Escaparate,
            'fkNTC_Articulo' => $this->fkNTC_Articulo,
            'fkNTC_Categoria' => $this->fkNTC_Categoria,
            'TextoDerecha' => $this->TextoDerecha,
            'Orden' => $this->Orden,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'TextoBoton', $this->TextoBoton])
            ->andFilterWhere(['like', 'Url', $this->Url]);

        return $dataProvider;
    }
}
