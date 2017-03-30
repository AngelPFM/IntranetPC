<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Configuracion;

/**
 * ConfiguracionSearch represents the model behind the search form about `app\models\Configuracion`.
 */
class ConfiguracionSearch extends Configuracion
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Configuracion', 'fkNTC_Empresa', 'fkNTC_TipoAltaUsuarios', 'AvisoAltas', 'MaxIntentosLogin', 'EdadMinimaUsuarios', 'EdadMaximaUsuarios', 'PeriodoPrevioValidezCtas', 'PeriodoValidezCtas', 'fkNTC_PaisPorDefecto', 'fkNTC_TiendaPorDefecto', 'fkNTC_FormaPago', 'fkNTC_MetodoEnvio', 'fkNTC_GrupoPrecioCliente', 'fkNTC_GrupoDescuentoCliente', 'VerArticulosSinPrecio', 'VerArticulosSinStock', 'VerVariantesSinStock', 'MinutosCaducidadCarritos', 'fkNTC_Divisa', 'Translate', 'Maintenance', 'NumeroPostPagina'], 'integer'],
            [['EmailContacto', 'MaintenanceIPs', 'PrefijoTablas', 'RutaDocumentos'], 'safe'],
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
        $query = Configuracion::find();

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
            'idNTC_Configuracion' => $this->idNTC_Configuracion,
            'fkNTC_Empresa' => $this->fkNTC_Empresa,
            'fkNTC_TipoAltaUsuarios' => $this->fkNTC_TipoAltaUsuarios,
            'AvisoAltas' => $this->AvisoAltas,
            'MaxIntentosLogin' => $this->MaxIntentosLogin,
            'EdadMinimaUsuarios' => $this->EdadMinimaUsuarios,
            'EdadMaximaUsuarios' => $this->EdadMaximaUsuarios,
            'PeriodoPrevioValidezCtas' => $this->PeriodoPrevioValidezCtas,
            'PeriodoValidezCtas' => $this->PeriodoValidezCtas,
            'fkNTC_PaisPorDefecto' => $this->fkNTC_PaisPorDefecto,
            'fkNTC_TiendaPorDefecto' => $this->fkNTC_TiendaPorDefecto,
            'fkNTC_FormaPago' => $this->fkNTC_FormaPago,
            'fkNTC_MetodoEnvio' => $this->fkNTC_MetodoEnvio,
            'fkNTC_GrupoPrecioCliente' => $this->fkNTC_GrupoPrecioCliente,
            'fkNTC_GrupoDescuentoCliente' => $this->fkNTC_GrupoDescuentoCliente,
            'VerArticulosSinPrecio' => $this->VerArticulosSinPrecio,
            'VerArticulosSinStock' => $this->VerArticulosSinStock,
            'VerVariantesSinStock' => $this->VerVariantesSinStock,
            'MinutosCaducidadCarritos' => $this->MinutosCaducidadCarritos,
            'fkNTC_Divisa' => $this->fkNTC_Divisa,
            'Translate' => $this->Translate,
            'Maintenance' => $this->Maintenance,
            'NumeroPostPagina' => $this->NumeroPostPagina,
        ]);

        $query->andFilterWhere(['like', 'EmailContacto', $this->EmailContacto])
            ->andFilterWhere(['like', 'MaintenanceIPs', $this->MaintenanceIPs])
            ->andFilterWhere(['like', 'PrefijoTablas', $this->PrefijoTablas])
            ->andFilterWhere(['like', 'RutaDocumentos', $this->RutaDocumentos]);

        return $dataProvider;
    }
}
