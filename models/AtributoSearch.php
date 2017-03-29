<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Atributo;

/**
 * AtributoSearch represents the model behind the search form about `app\models\Atributo`.
 */
class AtributoSearch extends Atributo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Atributo', 'Requerido', 'Buscable', 'Comparable', 'fkNTC_TipoDatosAtributo', 'TieneOpciones', 'Validacion', 'AplicarATodos', 'DefineProducto', 'FormatoOpciones', 'MostrarEnFicha', 'esColor', 'esTalla', 'Quitar'], 'integer'],
            [['Codigo', 'Etiqueta', 'ValorPorDefecto', 'TablaAsociada'], 'safe'],
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
        $query = Atributo::find();

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
            'idNTC_Atributo' => $this->idNTC_Atributo,
            'Requerido' => $this->Requerido,
            'Buscable' => $this->Buscable,
            'Comparable' => $this->Comparable,
            'fkNTC_TipoDatosAtributo' => $this->fkNTC_TipoDatosAtributo,
            'TieneOpciones' => $this->TieneOpciones,
            'Validacion' => $this->Validacion,
            'AplicarATodos' => $this->AplicarATodos,
            'DefineProducto' => $this->DefineProducto,
            'FormatoOpciones' => $this->FormatoOpciones,
            'MostrarEnFicha' => $this->MostrarEnFicha,
            'esColor' => $this->esColor,
            'esTalla' => $this->esTalla,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Codigo', $this->Codigo])
            ->andFilterWhere(['like', 'Etiqueta', $this->Etiqueta])
            ->andFilterWhere(['like', 'ValorPorDefecto', $this->ValorPorDefecto])
            ->andFilterWhere(['like', 'TablaAsociada', $this->TablaAsociada]);

        return $dataProvider;
    }
}
