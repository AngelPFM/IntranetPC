<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Usuario;

/**
 * UsuarioSearch represents the model behind the search form about `app\models\Usuario`.
 */
class UsuarioSearch extends Usuario
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Usuario', 'fkNTC_Rol', 'MaxIntentos', 'Quitar'], 'integer'],
            [['Nombre', 'FechaValidezIni', 'FechaValidezFin', 'Hash', 'Email'], 'safe'],
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
        $query = Usuario::find();

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
            'idNTC_Usuario' => $this->idNTC_Usuario,
            'fkNTC_Rol' => $this->fkNTC_Rol,
            'MaxIntentos' => $this->MaxIntentos,
            'FechaValidezIni' => $this->FechaValidezIni,
            'FechaValidezFin' => $this->FechaValidezFin,
            'Quitar' => $this->Quitar,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Hash', $this->Hash])
            ->andFilterWhere(['like', 'Email', $this->Email]);

        return $dataProvider;
    }
}
