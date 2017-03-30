<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Cliente;

/**
 * ClienteSearch represents the model behind the search form about `app\models\Cliente`.
 */
class ClienteSearch extends Cliente
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Cliente', 'fkNTC_Localidad', 'fkNTC_Provincia', 'fkNTC_Pais', 'Sexo', 'fkNTC_FacturaACliente', 'fkNTC_TipoIvaNegocio', 'PrecioIvaIncluido', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDescuentoCliente', 'fkNTC_Divisa', 'fkNTC_ProvinciaFactura', 'fkNTC_PaisFactura', 'fkNTC_LocalidadFactura', 'fkNTC_ConfiguracionIva', 'Quitar'], 'integer'],
            [['NIF', 'Nombre', 'Apellidos', 'Direccion', 'Localidad', 'Provincia', 'CodigoPostal', 'PrefijoTelefono1', 'Telefono1', 'PrefijoTelefono2', 'Telefono2', 'Contacto', 'Email', 'Fax', 'fkNTC_Idioma', 'CifFactura', 'NombreFactura', 'DireccionFactura', 'CodPostalFactura', 'LocalidadFactura', 'ProvinciaFactura', 'PaisFactura', 'FechaRegistro'], 'safe'],
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
        $query = Cliente::find();

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
            'idNTC_Cliente' => $this->idNTC_Cliente,
            'fkNTC_Localidad' => $this->fkNTC_Localidad,
            'fkNTC_Provincia' => $this->fkNTC_Provincia,
            'fkNTC_Pais' => $this->fkNTC_Pais,
            'Sexo' => $this->Sexo,
            'fkNTC_FacturaACliente' => $this->fkNTC_FacturaACliente,
            'fkNTC_TipoIvaNegocio' => $this->fkNTC_TipoIvaNegocio,
            'PrecioIvaIncluido' => $this->PrecioIvaIncluido,
            'fkNTC_GrupoPrecioCliente' => $this->fkNTC_GrupoPrecioCliente,
            'fkNTC_GrupoDescuentoCliente' => $this->fkNTC_GrupoDescuentoCliente,
            'fkNTC_Divisa' => $this->fkNTC_Divisa,
            'fkNTC_ProvinciaFactura' => $this->fkNTC_ProvinciaFactura,
            'fkNTC_PaisFactura' => $this->fkNTC_PaisFactura,
            'fkNTC_LocalidadFactura' => $this->fkNTC_LocalidadFactura,
            'fkNTC_ConfiguracionIva' => $this->fkNTC_ConfiguracionIva,
            'Quitar' => $this->Quitar,
            'FechaRegistro' => $this->FechaRegistro,
        ]);

        $query->andFilterWhere(['like', 'NIF', $this->NIF])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Apellidos', $this->Apellidos])
            ->andFilterWhere(['like', 'Direccion', $this->Direccion])
            ->andFilterWhere(['like', 'Localidad', $this->Localidad])
            ->andFilterWhere(['like', 'Provincia', $this->Provincia])
            ->andFilterWhere(['like', 'CodigoPostal', $this->CodigoPostal])
            ->andFilterWhere(['like', 'PrefijoTelefono1', $this->PrefijoTelefono1])
            ->andFilterWhere(['like', 'Telefono1', $this->Telefono1])
            ->andFilterWhere(['like', 'PrefijoTelefono2', $this->PrefijoTelefono2])
            ->andFilterWhere(['like', 'Telefono2', $this->Telefono2])
            ->andFilterWhere(['like', 'Contacto', $this->Contacto])
            ->andFilterWhere(['like', 'Email', $this->Email])
            ->andFilterWhere(['like', 'Fax', $this->Fax])
            ->andFilterWhere(['like', 'fkNTC_Idioma', $this->fkNTC_Idioma])
            ->andFilterWhere(['like', 'CifFactura', $this->CifFactura])
            ->andFilterWhere(['like', 'NombreFactura', $this->NombreFactura])
            ->andFilterWhere(['like', 'DireccionFactura', $this->DireccionFactura])
            ->andFilterWhere(['like', 'CodPostalFactura', $this->CodPostalFactura])
            ->andFilterWhere(['like', 'LocalidadFactura', $this->LocalidadFactura])
            ->andFilterWhere(['like', 'ProvinciaFactura', $this->ProvinciaFactura])
            ->andFilterWhere(['like', 'PaisFactura', $this->PaisFactura]);

        return $dataProvider;
    }
}
