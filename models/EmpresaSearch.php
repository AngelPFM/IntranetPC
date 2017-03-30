<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Empresa;

/**
 * EmpresaSearch represents the model behind the search form about `app\models\Empresa`.
 */
class EmpresaSearch extends Empresa
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Empresa', 'Agrupacion'], 'integer'],
            [['Nombre', 'Dominio', 'Descripcion', 'Slogan', 'HorarioContacto', 'Latitud', 'Longitud', 'Direccion1', 'DireccionDos', 'CP', 'Localizacion', 'Email', 'Emaillook', 'Titulo', 'BajoTitulo', 'NumerosDeCuenta', 'metaRobots', 'metaKeywords', 'metaDescription', 'metaTitle', 'metaContent', 'Telefono', 'Fax'], 'safe'],
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
        $query = Empresa::find();

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
            'idNTC_Empresa' => $this->idNTC_Empresa,
            'Agrupacion' => $this->Agrupacion,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Dominio', $this->Dominio])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'Slogan', $this->Slogan])
            ->andFilterWhere(['like', 'HorarioContacto', $this->HorarioContacto])
            ->andFilterWhere(['like', 'Latitud', $this->Latitud])
            ->andFilterWhere(['like', 'Longitud', $this->Longitud])
            ->andFilterWhere(['like', 'Direccion1', $this->Direccion1])
            ->andFilterWhere(['like', 'DireccionDos', $this->DireccionDos])
            ->andFilterWhere(['like', 'CP', $this->CP])
            ->andFilterWhere(['like', 'Localizacion', $this->Localizacion])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Emaillook', $this->Emaillook])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'BajoTitulo', $this->BajoTitulo])
            ->andFilterWhere(['like', 'NumerosDeCuenta', $this->NumerosDeCuenta])
            ->andFilterWhere(['like', 'metaRobots', $this->metaRobots])
            ->andFilterWhere(['like', 'metaKeywords', $this->metaKeywords])
            ->andFilterWhere(['like', 'metaDescription', $this->metaDescription])
            ->andFilterWhere(['like', 'metaTitle', $this->metaTitle])
            ->andFilterWhere(['like', 'metaContent', $this->metaContent])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Fax', $this->Fax]);

        return $dataProvider;
    }
}
