<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Menu;

/**
 * MenuSearch represents the model behind the search form about `app\models\Menu`.
 */
class MenuSearch extends Menu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Menu', 'fkNTC_Padre', 'fkNTC_TipoMenu', 'Externo', 'TieneHijos', 'Expandido', 'RequiereLogin', 'fkNTC_UsuarioWeb', 'Orden', 'Independiente', 'Ancho', 'Quitar'], 'integer'],
            [['Nombre', 'fkNTC_Idioma', 'Descripcion', 'Frase', 'Url', 'Titulo', 'TablaTotales', 'FiltroTotales', 'TablaCategorias', 'FiltroCategorias', 'HtmlClass', 'MetaTitle', 'MetaDescription', 'MetaKeywords', 'MetaRobots'], 'safe'],
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
        $query = Menu::find();

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
            'idNTC_Menu' => $this->idNTC_Menu,
            'fkNTC_Padre' => $this->fkNTC_Padre,
            'fkNTC_TipoMenu' => $this->fkNTC_TipoMenu,
            'Externo' => $this->Externo,
            'TieneHijos' => $this->TieneHijos,
            'Expandido' => $this->Expandido,
            'RequiereLogin' => $this->RequiereLogin,
            'fkNTC_UsuarioWeb' => $this->fkNTC_UsuarioWeb,
            'Orden' => $this->Orden,
            'Independiente' => $this->Independiente,
            'Ancho' => $this->Ancho,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'fkNTC_Idioma', $this->fkNTC_Idioma])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Frase', $this->Frase])
            ->andFilterWhere(['like', 'Url', $this->Url])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'TablaTotales', $this->TablaTotales])
            ->andFilterWhere(['like', 'FiltroTotales', $this->FiltroTotales])
            ->andFilterWhere(['like', 'TablaCategorias', $this->TablaCategorias])
            ->andFilterWhere(['like', 'FiltroCategorias', $this->FiltroCategorias])
            ->andFilterWhere(['like', 'HtmlClass', $this->HtmlClass])
            ->andFilterWhere(['like', 'MetaTitle', $this->MetaTitle])
            ->andFilterWhere(['like', 'MetaDescription', $this->MetaDescription])
            ->andFilterWhere(['like', 'MetaKeywords', $this->MetaKeywords])
            ->andFilterWhere(['like', 'MetaRobots', $this->MetaRobots]);

        return $dataProvider;
    }
}
