<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\DocumentoVenta;

/**
 * DocumentoVentaSearch represents the model behind the search form about `app\models\DocumentoVenta`.
 */
class DocumentoVentaSearch extends DocumentoVenta
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_DocumentoVenta', 'fkNTC_TipoDocumentoVenta', 'fkNTC_NumSerie', 'fkNTC_TipoEstadoPedido', 'fkNTC_ClienteVenta', 'fkNTC_ClienteFactura', 'fkNTC_ProvinciaFactura', 'fkNTC_PaisFactura', 'fkNTC_Tienda', 'fkNTC_TerminosPago', 'fkNTC_FormaPago', 'AlbaranValorado', 'EnviarFactura', 'Look', 'fkNTC_DireccionEnvio', 'fkNTC_Almacen', 'fkNTC_TarifaEnvio', 'fkNTC_Divisa', 'EnvioParcial', 'EnviadoCompletamente', 'FechaEntrega', 'ConfirmadaRecepcion', 'Enviado', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDtoCliente', 'fkNTC_Portes', 'ga'], 'integer'],
            [['Numero', 'Fecha', 'NombreCliente', 'DireccionCliente', 'CodPostalCliente', 'LocalidadCliente', 'ProvinciaCliente', 'PaisCliente', 'CifFactura', 'NombreFactura', 'DireccionFactura', 'CodPostalFactura', 'LocalidadFactura', 'ProvinciaFactura', 'PaisFactura', 'FechaVencimiento', 'FechaDtoPP', 'DireccionEnvio', 'CodPostalEnvio', 'LocalidadEnvio', 'ProvinciaEnvio', 'PaisEnvio', 'EnvioAtencionA', 'FechaEnvio', 'Peso', 'FechaRegistro', 'Comentario', 'Tracking', 'SobreAgencia', 'TelefonoAgencia', 'NombreAgencia'], 'safe'],
            [['PorcentajeDtoPP', 'Importe', 'ImporteIvaIncl', 'ImportePortes', 'ImportePortesSI', 'IvaImporte', 'ImporteRecargo', 'LogAlm', 'ImporteSLA', 'Total', 'PcIVA', 'ImpCR'], 'number'],
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
        $query = DocumentoVenta::find();

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
            'idNTC_DocumentoVenta' => $this->idNTC_DocumentoVenta,
            'fkNTC_TipoDocumentoVenta' => $this->fkNTC_TipoDocumentoVenta,
            'Fecha' => $this->Fecha,
            'fkNTC_NumSerie' => $this->fkNTC_NumSerie,
            'fkNTC_TipoEstadoPedido' => $this->fkNTC_TipoEstadoPedido,
            'fkNTC_ClienteVenta' => $this->fkNTC_ClienteVenta,
            'fkNTC_ClienteFactura' => $this->fkNTC_ClienteFactura,
            'fkNTC_ProvinciaFactura' => $this->fkNTC_ProvinciaFactura,
            'fkNTC_PaisFactura' => $this->fkNTC_PaisFactura,
            'fkNTC_Tienda' => $this->fkNTC_Tienda,
            'fkNTC_TerminosPago' => $this->fkNTC_TerminosPago,
            'fkNTC_FormaPago' => $this->fkNTC_FormaPago,
            'FechaVencimiento' => $this->FechaVencimiento,
            'PorcentajeDtoPP' => $this->PorcentajeDtoPP,
            'FechaDtoPP' => $this->FechaDtoPP,
            'AlbaranValorado' => $this->AlbaranValorado,
            'EnviarFactura' => $this->EnviarFactura,
            'Look' => $this->Look,
            'fkNTC_DireccionEnvio' => $this->fkNTC_DireccionEnvio,
            'fkNTC_Almacen' => $this->fkNTC_Almacen,
            'fkNTC_TarifaEnvio' => $this->fkNTC_TarifaEnvio,
            'FechaEnvio' => $this->FechaEnvio,
            'fkNTC_Divisa' => $this->fkNTC_Divisa,
            'FechaRegistro' => $this->FechaRegistro,
            'EnvioParcial' => $this->EnvioParcial,
            'EnviadoCompletamente' => $this->EnviadoCompletamente,
            'FechaEntrega' => $this->FechaEntrega,
            'ConfirmadaRecepcion' => $this->ConfirmadaRecepcion,
            'Importe' => $this->Importe,
            'ImporteIvaIncl' => $this->ImporteIvaIncl,
            'Enviado' => $this->Enviado,
            'fkNTC_GrupoPrecioCliente' => $this->fkNTC_GrupoPrecioCliente,
            'fkNTC_GrupoDtoCliente' => $this->fkNTC_GrupoDtoCliente,
            'fkNTC_Portes' => $this->fkNTC_Portes,
            'ImportePortes' => $this->ImportePortes,
            'ImportePortesSI' => $this->ImportePortesSI,
            'IvaImporte' => $this->IvaImporte,
            'ImporteRecargo' => $this->ImporteRecargo,
            'LogAlm' => $this->LogAlm,
            'ImporteSLA' => $this->ImporteSLA,
            'Total' => $this->Total,
            'PcIVA' => $this->PcIVA,
            'ImpCR' => $this->ImpCR,
            'ga' => $this->ga,
        ]);

        $query->andFilterWhere(['like', 'Numero', $this->Numero])
            ->andFilterWhere(['like', 'NombreCliente', $this->NombreCliente])
            ->andFilterWhere(['like', 'DireccionCliente', $this->DireccionCliente])
            ->andFilterWhere(['like', 'CodPostalCliente', $this->CodPostalCliente])
            ->andFilterWhere(['like', 'LocalidadCliente', $this->LocalidadCliente])
            ->andFilterWhere(['like', 'ProvinciaCliente', $this->ProvinciaCliente])
            ->andFilterWhere(['like', 'PaisCliente', $this->PaisCliente])
            ->andFilterWhere(['like', 'CifFactura', $this->CifFactura])
            ->andFilterWhere(['like', 'NombreFactura', $this->NombreFactura])
            ->andFilterWhere(['like', 'DireccionFactura', $this->DireccionFactura])
            ->andFilterWhere(['like', 'CodPostalFactura', $this->CodPostalFactura])
            ->andFilterWhere(['like', 'LocalidadFactura', $this->LocalidadFactura])
            ->andFilterWhere(['like', 'ProvinciaFactura', $this->ProvinciaFactura])
            ->andFilterWhere(['like', 'PaisFactura', $this->PaisFactura])
            ->andFilterWhere(['like', 'DireccionEnvio', $this->DireccionEnvio])
            ->andFilterWhere(['like', 'CodPostalEnvio', $this->CodPostalEnvio])
            ->andFilterWhere(['like', 'LocalidadEnvio', $this->LocalidadEnvio])
            ->andFilterWhere(['like', 'ProvinciaEnvio', $this->ProvinciaEnvio])
            ->andFilterWhere(['like', 'PaisEnvio', $this->PaisEnvio])
            ->andFilterWhere(['like', 'EnvioAtencionA', $this->EnvioAtencionA])
            ->andFilterWhere(['like', 'Peso', $this->Peso])
            ->andFilterWhere(['like', 'Comentario', $this->Comentario])
            ->andFilterWhere(['like', 'Tracking', $this->Tracking])
            ->andFilterWhere(['like', 'SobreAgencia', $this->SobreAgencia])
            ->andFilterWhere(['like', 'TelefonoAgencia', $this->TelefonoAgencia])
            ->andFilterWhere(['like', 'NombreAgencia', $this->NombreAgencia]);

        return $dataProvider;
    }
}
