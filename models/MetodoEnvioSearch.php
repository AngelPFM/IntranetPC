<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\MetodoEnvio;

/**
 * MetodoEnvioSearch represents the model behind the search form about `app\models\MetodoEnvio`.
 */
class MetodoEnvioSearch extends MetodoEnvio
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_MetodoEnvio', 'fkNTC_ProveedorEnvio', 'fkNTC_TipoValoracion', 'fkNTC_TipoCalculo', 'PesoMaxPaquete', 'PesoMinPaquete', 'fkNTC_TipoTarifa', 'fkNTC_UnidadMedida', 'TipoCosteManipulacion', 'TiempoPreparacion', 'Quitar'], 'integer'],
            [['Nombre', 'Descripcion'], 'safe'],
            [['CosteManipulacion', 'ImporteMinEnvioGratuito'], 'number'],
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
        $query = MetodoEnvio::find();

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
            'idNTC_MetodoEnvio' => $this->idNTC_MetodoEnvio,
            'fkNTC_ProveedorEnvio' => $this->fkNTC_ProveedorEnvio,
            'fkNTC_TipoValoracion' => $this->fkNTC_TipoValoracion,
            'fkNTC_TipoCalculo' => $this->fkNTC_TipoCalculo,
            'PesoMaxPaquete' => $this->PesoMaxPaquete,
            'PesoMinPaquete' => $this->PesoMinPaquete,
            'fkNTC_TipoTarifa' => $this->fkNTC_TipoTarifa,
            'fkNTC_UnidadMedida' => $this->fkNTC_UnidadMedida,
            'TipoCosteManipulacion' => $this->TipoCosteManipulacion,
            'CosteManipulacion' => $this->CosteManipulacion,
            'TiempoPreparacion' => $this->TiempoPreparacion,
            'ImporteMinEnvioGratuito' => $this->ImporteMinEnvioGratuito,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
