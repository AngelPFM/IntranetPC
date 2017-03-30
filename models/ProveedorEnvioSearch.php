<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ProveedorEnvio;

/**
 * ProveedorEnvioSearch represents the model behind the search form about `app\models\ProveedorEnvio`.
 */
class ProveedorEnvioSearch extends ProveedorEnvio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_ProveedorEnvio', 'SandBox', 'Quitar'], 'integer'],
            [['Nombre', 'UrlProduccion', 'UrlPruebas', 'IdCliente', 'CuentaCliente', 'Key', 'Password'], 'safe'],
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
        $query = ProveedorEnvio::find();

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
            'idNTC_ProveedorEnvio' => $this->idNTC_ProveedorEnvio,
            'SandBox' => $this->SandBox,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'UrlProduccion', $this->UrlProduccion])
            ->andFilterWhere(['like', 'UrlPruebas', $this->UrlPruebas])
            ->andFilterWhere(['like', 'IdCliente', $this->IdCliente])
            ->andFilterWhere(['like', 'CuentaCliente', $this->CuentaCliente])
            ->andFilterWhere(['like', 'Key', $this->Key])
            ->andFilterWhere(['like', 'Password', $this->Password]);

        return $dataProvider;
    }
}
