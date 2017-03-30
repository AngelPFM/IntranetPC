<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TarifaEnvio;

/**
 * TarifaEnvioSearch represents the model behind the search form about `app\models\TarifaEnvio`.
 */
class TarifaEnvioSearch extends TarifaEnvio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_TarifaEnvio', 'fkNTC_ProveedorEnvio', 'fkNTC_MetodoEnvio', 'fkNTC_Pais', 'fkNTC_Provincia', 'fkNTC_ZonaEnvio', 'fkNTC_ModuloEnvio', 'PesoDesde', 'fkNTC_Divisa', 'Quitar'], 'integer'],
            [['CodigoPostal', 'DiasEnvio'], 'safe'],
            [['PrecioEnvio', 'PrecioEnvioPlus'], 'number'],
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
        $query = TarifaEnvio::find();

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
            'idNTC_TarifaEnvio' => $this->idNTC_TarifaEnvio,
            'fkNTC_ProveedorEnvio' => $this->fkNTC_ProveedorEnvio,
            'fkNTC_MetodoEnvio' => $this->fkNTC_MetodoEnvio,
            'fkNTC_Pais' => $this->fkNTC_Pais,
            'fkNTC_Provincia' => $this->fkNTC_Provincia,
            'fkNTC_ZonaEnvio' => $this->fkNTC_ZonaEnvio,
            'fkNTC_ModuloEnvio' => $this->fkNTC_ModuloEnvio,
            'PesoDesde' => $this->PesoDesde,
            'PrecioEnvio' => $this->PrecioEnvio,
            'PrecioEnvioPlus' => $this->PrecioEnvioPlus,
            'fkNTC_Divisa' => $this->fkNTC_Divisa,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'CodigoPostal', $this->CodigoPostal])
            ->andFilterWhere(['like', 'DiasEnvio', $this->DiasEnvio]);

        return $dataProvider;
    }
}
