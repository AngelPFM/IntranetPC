<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\UsuarioWeb;

/**
 * UsuarioWebSearch represents the model behind the search form about `app\models\UsuarioWeb`.
 */
class UsuarioWebSearch extends UsuarioWeb
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_UsuarioWeb', 'fkNTC_TipoUsuarioWeb', 'fkNTC_Cliente', 'MaxIntentos', 'Activo', 'Quitar', 'Telefono', 'Cif'], 'integer'],
            [['Nombre', 'Apellidos', 'Email', 'Hash', 'FechaValidezIni', 'FechaValidezFin', 'FechaRegistro', 'FechaUltimoAcceso', 'FechaActualAcceso', 'FechaNacimiento', 'IdFacebook', 'IdTwitter', 'IdLinkedin', 'IdGoogle', 'IdGithub', 'IdLive', 'Token', 'FechaCad'], 'safe'],
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
        $query = UsuarioWeb::find();

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
            'idNTC_UsuarioWeb' => $this->idNTC_UsuarioWeb,
            'fkNTC_TipoUsuarioWeb' => $this->fkNTC_TipoUsuarioWeb,
            'fkNTC_Cliente' => $this->fkNTC_Cliente,
            'MaxIntentos' => $this->MaxIntentos,
            'FechaValidezIni' => $this->FechaValidezIni,
            'FechaValidezFin' => $this->FechaValidezFin,
            'FechaRegistro' => $this->FechaRegistro,
            'FechaUltimoAcceso' => $this->FechaUltimoAcceso,
            'FechaActualAcceso' => $this->FechaActualAcceso,
            'Activo' => $this->Activo,
            'Quitar' => $this->Quitar,
            'FechaNacimiento' => $this->FechaNacimiento,
            'Telefono' => $this->Telefono,
            'Cif' => $this->Cif,
        ]);

        $query->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellidos', $this->Apellidos])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Hash', $this->Hash])
            ->andFilterWhere(['like', 'IdFacebook', $this->IdFacebook])
            ->andFilterWhere(['like', 'IdTwitter', $this->IdTwitter])
            ->andFilterWhere(['like', 'IdLinkedin', $this->IdLinkedin])
            ->andFilterWhere(['like', 'IdGoogle', $this->IdGoogle])
            ->andFilterWhere(['like', 'IdGithub', $this->IdGithub])
            ->andFilterWhere(['like', 'IdLive', $this->IdLive])
            ->andFilterWhere(['like', 'Token', $this->Token])
            ->andFilterWhere(['like', 'FechaCad', $this->FechaCad]);

        return $dataProvider;
    }
}
