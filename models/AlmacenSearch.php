<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Almacen;

/**
 * AlmacenSearch represents the model behind the search form about `app\models\Almacen`.
 */
class AlmacenSearch extends Almacen
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Almacen', 'fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Transito', 'Quitar', 'Activa', 'fkNTC_UsuarioWeb'], 'integer'],
            [['Nombre', 'Titulo', 'Direccion', 'CodigoPostal', 'Contacto', 'Telefono', 'Fax', 'Email'], 'safe'],
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
        $query = Almacen::find();

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
            'idNTC_Almacen' => $this->idNTC_Almacen,
            'fkNTC_Localidad' => $this->fkNTC_Localidad,
            'fkNTC_Provincia' => $this->fkNTC_Provincia,
            'fkNTC_Pais' => $this->fkNTC_Pais,
            'Transito' => $this->Transito,
            'Quitar' => $this->Quitar,
            'Activa' => $this->Activa,
            'fkNTC_UsuarioWeb' => $this->fkNTC_UsuarioWeb,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Titulo', $this->Titulo])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'CodigoPostal', $this->CodigoPostal])
            ->andFilterWhere(['like', 'Contacto', $this->Contacto])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Fax', $this->Fax])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
