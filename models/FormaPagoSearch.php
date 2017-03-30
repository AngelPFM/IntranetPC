<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FormaPago;

/**
 * FormaPagoSearch represents the model behind the search form about `app\models\FormaPago`.
 */
class FormaPagoSearch extends FormaPago
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_FormaPago', 'PorDefecto', 'fkNTC_TerminoPago', 'Activa', 'Quitar', 'EnProduccion', 'ValidacionPasiva', 'Gratuita'], 'integer'],
            [['Nombre', 'Descripcion', 'InfoAdicional', 'UrlTest', 'UrlProduccion', 'TokenValidacion', 'UrlOK', 'UrlKO'], 'safe'],
            [['Recargo'], 'number'],
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
        $query = FormaPago::find();

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
            'idNTC_FormaPago' => $this->idNTC_FormaPago,
            'Recargo' => $this->Recargo,
            'PorDefecto' => $this->PorDefecto,
            'fkNTC_TerminoPago' => $this->fkNTC_TerminoPago,
            'Activa' => $this->Activa,
            'Quitar' => $this->Quitar,
            'EnProduccion' => $this->EnProduccion,
            'ValidacionPasiva' => $this->ValidacionPasiva,
            'Gratuita' => $this->Gratuita,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'InfoAdicional', $this->InfoAdicional])
            ->andFilterWhere(['like', 'UrlTest', $this->UrlTest])
            ->andFilterWhere(['like', 'UrlProduccion', $this->UrlProduccion])
            ->andFilterWhere(['like', 'TokenValidacion', $this->TokenValidacion])
            ->andFilterWhere(['like', 'UrlOK', $this->UrlOK])
            ->andFilterWhere(['like', 'UrlKO', $this->UrlKO]);

        return $dataProvider;
    }
}
