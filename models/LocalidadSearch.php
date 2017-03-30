<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Localidad;

/**
 * LocalidadSearch represents the model behind the search form about `app\models\Localidad`.
 */
class LocalidadSearch extends Localidad
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Quitar'], 'integer'],
            [['Nombre'], 'safe'],
            [['CoordY', 'CoordX'], 'number'],
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
        $query = Localidad::find();

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
            'idNTC_Localidad' => $this->idNTC_Localidad,
            'fkNTC_Provincia' => $this->fkNTC_Provincia,
            'fkNTC_Pais' => $this->fkNTC_Pais,
            'CoordY' => $this->CoordY,
            'CoordX' => $this->CoordX,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
