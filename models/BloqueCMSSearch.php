<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\BloqueCMS;

/**
 * BloqueCMSSearch represents the model behind the search form about `app\models\BloqueCMS`.
 */
class BloqueCMSSearch extends BloqueCMS
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_BloqueCMS', 'fkNTC_Menu', 'Independiente', 'Ancho', 'Orden', 'Quitar'], 'integer'],
            [['Nombre', 'Titulo', 'Frase', 'Descripcion'], 'safe'],
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
        $query = BloqueCMS::find();

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
            'idNTC_BloqueCMS' => $this->idNTC_BloqueCMS,
            'fkNTC_Menu' => $this->fkNTC_Menu,
            'Independiente' => $this->Independiente,
            'Ancho' => $this->Ancho,
            'Orden' => $this->Orden,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Frase', $this->Frase])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
