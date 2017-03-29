<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Categoria;

/**
 * CategoriaSearch represents the model behind the search form about `app\models\Categoria`.
 */
class CategoriaSearch extends Categoria
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Categoria', 'Raiz', 'fkNTC_padre', 'TieneHijos', 'IncluirEnMenu', 'Activa', 'MostrarArticulos', 'fkNTC_CMS', 'ConComposicion', 'Orden', 'Quitar'], 'integer'],
            [['Nombre', 'Titulo', 'Descripcion', 'Frase', 'TituloPagina', 'MetaTitle', 'MetaKeywords', 'MetaDescription', 'MetaRobots'], 'safe'],
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
        $query = Categoria::find();

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
            'idNTC_Categoria' => $this->idNTC_Categoria,
            'Raiz' => $this->Raiz,
            'fkNTC_padre' => $this->fkNTC_padre,
            'TieneHijos' => $this->TieneHijos,
            'IncluirEnMenu' => $this->IncluirEnMenu,
            'Activa' => $this->Activa,
            'MostrarArticulos' => $this->MostrarArticulos,
            'fkNTC_CMS' => $this->fkNTC_CMS,
            'ConComposicion' => $this->ConComposicion,
            'Orden' => $this->Orden,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Frase', $this->Frase])
            ->andFilterWhere(['like', 'TituloPagina', $this->TituloPagina])
            ->andFilterWhere(['like', 'MetaTitle', $this->MetaTitle])
            ->andFilterWhere(['like', 'MetaKeywords', $this->MetaKeywords])
            ->andFilterWhere(['like', 'MetaDescription', $this->MetaDescription])
            ->andFilterWhere(['like', 'MetaRobots', $this->MetaRobots]);

        return $dataProvider;
    }
}
