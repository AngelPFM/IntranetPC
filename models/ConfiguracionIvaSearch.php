<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ConfiguracionIva;

/**
 * ConfiguracionIvaSearch represents the model behind the search form about `app\models\ConfiguracionIva`.
 */
class ConfiguracionIvaSearch extends ConfiguracionIva
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_ConfiguracionIva', 'fkNTC_TipoIVAProducto', 'fkNTC_TipoIVANegocio', 'fkNTC_TipoCalculoIVA'], 'integer'],
            [['Nombre'], 'safe'],
            [['PorcIva', 'PorcRecargoEquivalencia'], 'number'],
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
        $query = ConfiguracionIva::find();

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
            'idNTC_ConfiguracionIva' => $this->idNTC_ConfiguracionIva,
            'fkNTC_TipoIVAProducto' => $this->fkNTC_TipoIVAProducto,
            'fkNTC_TipoIVANegocio' => $this->fkNTC_TipoIVANegocio,
            'PorcIva' => $this->PorcIva,
            'fkNTC_TipoCalculoIVA' => $this->fkNTC_TipoCalculoIVA,
            'PorcRecargoEquivalencia' => $this->PorcRecargoEquivalencia,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre]);

        return $dataProvider;
    }
}
