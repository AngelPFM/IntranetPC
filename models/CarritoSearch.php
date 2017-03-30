<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Carrito;

/**
 * CarritoSearch represents the model behind the search form about `app\models\Carrito`.
 */
class CarritoSearch extends Carrito
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Carrito', 'fkNTC_UsuarioWeb', 'fkNTC_Cliente', 'fkNTC_DocumentoVenta', 'Abandonado', 'Quitar'], 'integer'],
            [['SessionId', 'Fecha'], 'safe'],
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
        $query = Carrito::find();

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
            'idNTC_Carrito' => $this->idNTC_Carrito,
            'fkNTC_UsuarioWeb' => $this->fkNTC_UsuarioWeb,
            'fkNTC_Cliente' => $this->fkNTC_Cliente,
            'fkNTC_DocumentoVenta' => $this->fkNTC_DocumentoVenta,
            'Fecha' => $this->Fecha,
            'Abandonado' => $this->Abandonado,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'SessionId', $this->SessionId]);

        return $dataProvider;
    }
}
