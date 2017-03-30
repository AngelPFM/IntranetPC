<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Contacto;

/**
 * ContactoSearch represents the model behind the search form about `app\models\Contacto`.
 */
class ContactoSearch extends Contacto
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Contacto', 'fkNTC_UsuarioWeb', 'fkNTC_Cliente', 'Quitar'], 'integer'],
            [['Nombre', 'Apellidos', 'Telefono', 'Email', 'Asunto', 'Comentario', 'FechaAlta', 'IpContacto'], 'safe'],
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
        $query = Contacto::find();

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
            'idNTC_Contacto' => $this->idNTC_Contacto,
            'fkNTC_UsuarioWeb' => $this->fkNTC_UsuarioWeb,
            'fkNTC_Cliente' => $this->fkNTC_Cliente,
            'Quitar' => $this->Quitar,
            'FechaAlta' => $this->FechaAlta,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellidos', $this->Apellidos])
            ->andFilterWhere(['like', 'Telefono', $this->Telefono])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Asunto', $this->Asunto])
            ->andFilterWhere(['like', 'Comentario', $this->Comentario])
            ->andFilterWhere(['like', 'IpContacto', $this->IpContacto]);

        return $dataProvider;
    }
}
