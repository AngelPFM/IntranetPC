<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Modulo;

/**
 * Modulo2Search represents the model behind the search form about `app\models\Modulo`.
 */
class ModuloSearch extends Modulo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Modulo', 'MaxPorPagina', 'Padre', 'Visitas', 'Orden', 'TraduccionMultiple', 'Csv', 'Quitar'], 'integer'],
            [['Nombre', 'Modelo', 'Sql', 'Descripcion', 'Ordenacion'], 'safe'],
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
        $query = Modulo::find();

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
            'idNTC_Modulo' => $this->idNTC_Modulo,
            'MaxPorPagina' => $this->MaxPorPagina,
            'Padre' => $this->Padre,
            'Visitas' => $this->Visitas,
            'Orden' => $this->Orden,
            'TraduccionMultiple' => $this->TraduccionMultiple,
            'Csv' => $this->Csv,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Modelo', $this->Modelo])
            ->andFilterWhere(['like', 'Sql', $this->Sql])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Ordenacion', $this->Ordenacion]);

        return $dataProvider;
    }
}
