<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\TarifaVenta;

/**
 * TarifaVentaSearch represents the model behind the search form about `app\models\TarifaVenta`.
 */
class TarifaVentaSearch extends TarifaVenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_TarifaVenta', 'fkNTC_TipoTarifaVenta', 'fkNTC_GrupoPrecioCliente', 'fkNTC_Cliente', 'fkNTC_Articulo', 'fkNTC_UnidadMedida', 'fkNTC_Divisa', 'CantidadMinima', 'fkNTC_Pais', 'PermiteDtoFactura', 'PermiteDtoLinea', 'Quitar'], 'integer'],
            [['PrecioVenta', 'PrecioCoste'], 'number'],
            [['FechaInicial', 'FechaFinal'], 'safe'],
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
        $query = TarifaVenta::find();

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
            'idNTC_TarifaVenta' => $this->idNTC_TarifaVenta,
            'fkNTC_TipoTarifaVenta' => $this->fkNTC_TipoTarifaVenta,
            'fkNTC_GrupoPrecioCliente' => $this->fkNTC_GrupoPrecioCliente,
            'fkNTC_Cliente' => $this->fkNTC_Cliente,
            'fkNTC_Articulo' => $this->fkNTC_Articulo,
            'fkNTC_UnidadMedida' => $this->fkNTC_UnidadMedida,
            'fkNTC_Divisa' => $this->fkNTC_Divisa,
            'CantidadMinima' => $this->CantidadMinima,
            'PrecioVenta' => $this->PrecioVenta,
            'PrecioCoste' => $this->PrecioCoste,
            'fkNTC_Pais' => $this->fkNTC_Pais,
            'FechaInicial' => $this->FechaInicial,
            'FechaFinal' => $this->FechaFinal,
            'PermiteDtoFactura' => $this->PermiteDtoFactura,
            'PermiteDtoLinea' => $this->PermiteDtoLinea,
            'Quitar' => $this->Quitar,
        ]);

        return $dataProvider;
    }
}
