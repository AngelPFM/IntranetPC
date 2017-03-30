<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\ModuloEnvioProvincia;

/**
 * ModuloEnvioProvinciaSearch represents the model behind the search form about `app\models\ModuloEnvioProvincia`.
 */
class ModuloEnvioProvinciaSearch extends ModuloEnvioProvincia
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['pkNTC_ModuloEnvioProvincia', 'fkNTC_Provincia', 'fkNTC_ModuloEnvio'], 'integer'],
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
        $query = ModuloEnvioProvincia::find();

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
            'pkNTC_ModuloEnvioProvincia' => $this->pkNTC_ModuloEnvioProvincia,
            'fkNTC_Provincia' => $this->fkNTC_Provincia,
            'fkNTC_ModuloEnvio' => $this->fkNTC_ModuloEnvio,
        ]);

        return $dataProvider;
    }
}
