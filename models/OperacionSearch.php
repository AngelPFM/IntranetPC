<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Operacion;

/**
 * OperacionSearch represents the model behind the search form about `app\models\Operacion`.
 */
class OperacionSearch extends Operacion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Operacion', 'fkNTC_Cliente', 'fkNTC_DocumentoVenta', 'fkNTC_FormaPago', 'fkNTC_Tienda', 'fkNTC_Divisa', 'EstadoPago', 'Aplicada', 'Quitar'], 'integer'],
            [['FechaOperacion', 'FechaEstado', 'Referencia', 'ReferenciaPago', 'Descripcion'], 'safe'],
            [['ImporteMoneda', 'ImporteEur'], 'number'],
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
        $query = Operacion::find();

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
            'idNTC_Operacion' => $this->idNTC_Operacion,
            'fkNTC_Cliente' => $this->fkNTC_Cliente,
            'fkNTC_DocumentoVenta' => $this->fkNTC_DocumentoVenta,
            'fkNTC_FormaPago' => $this->fkNTC_FormaPago,
            'fkNTC_Tienda' => $this->fkNTC_Tienda,
            'fkNTC_Divisa' => $this->fkNTC_Divisa,
            'FechaOperacion' => $this->FechaOperacion,
            'FechaEstado' => $this->FechaEstado,
            'ImporteMoneda' => $this->ImporteMoneda,
            'ImporteEur' => $this->ImporteEur,
            'EstadoPago' => $this->EstadoPago,
            'Aplicada' => $this->Aplicada,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Referencia', $this->Referencia])
            ->andFilterWhere(['like', 'ReferenciaPago', $this->ReferenciaPago])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
