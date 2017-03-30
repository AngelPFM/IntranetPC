<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Lote;

/**
 * LoteSearch represents the model behind the search form about `app\models\Lote`.
 */
class LoteSearch extends Lote
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Lote', 'Quitar', 'surtido_libre', 'Stock', 'Look'], 'integer'],
            [['Nombre', 'ReferenciaLote', 'Descripcion', 'Nuevo_DesdeFecha', 'Nuevo_HastaFecha', 'Modificado'], 'safe'],
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
        $query = Lote::find();

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
            'idNTC_Lote' => $this->idNTC_Lote,
            'Quitar' => $this->Quitar,
            'Nuevo_DesdeFecha' => $this->Nuevo_DesdeFecha,
            'Nuevo_HastaFecha' => $this->Nuevo_HastaFecha,
            'surtido_libre' => $this->surtido_libre,
            'Stock' => $this->Stock,
            'Look' => $this->Look,
            'Modificado' => $this->Modificado,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'ReferenciaLote', $this->ReferenciaLote])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion]);

        return $dataProvider;
    }
}
