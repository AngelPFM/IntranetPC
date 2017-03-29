<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Articulo;

/**
 * ArticuloSearch represents the model behind the search form about `app\models\Articulo`.
 */
class ArticuloSearch extends Articulo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idNTC_Articulo', 'fkNTC_TipoArticulo', 'Habilitado', 'HabilitadoProfesionales', 'fkNTC_ConjuntoAtributos', 'fkNTC_TipoIVAProducto', 'fkNTC_UnidadMedida', 'fkNTC_UnidadMedidaVenta', 'GestionExistencias', 'IncrementoCantidad', 'DivisibleParaEnvio', 'PedidosArticulosAgotados', 'AvisoClienteArticuloPedidoAgotado', 'Quitar', 'fkNTC_Almacen', 'fkNTC_Marca', 'App', 'Stock'], 'integer'],
            [['Referencia', 'ReferenciaProveedor', 'ReferenciaColor', 'Nombre', 'Descripcion', 'DescripcionCorta', 'Nuevo_DesdeFecha', 'Nuevo_HastaFecha', 'MetaTitle', 'MetaKeywords', 'MetaDescription', 'MetaRobots', 'Art_modificado'], 'safe'],
            [['CantidadMinimaCarrito', 'CantidadMaximaCarrito', 'CantidadIncremento', 'CantidadMarcaSinStock'], 'number'],
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
        $query = Articulo::find();

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
            'idNTC_Articulo' => $this->idNTC_Articulo,
            'fkNTC_TipoArticulo' => $this->fkNTC_TipoArticulo,
            'Nuevo_DesdeFecha' => $this->Nuevo_DesdeFecha,
            'Nuevo_HastaFecha' => $this->Nuevo_HastaFecha,
            'Habilitado' => $this->Habilitado,
            'HabilitadoProfesionales' => $this->HabilitadoProfesionales,
            'fkNTC_ConjuntoAtributos' => $this->fkNTC_ConjuntoAtributos,
            'fkNTC_TipoIVAProducto' => $this->fkNTC_TipoIVAProducto,
            'fkNTC_UnidadMedida' => $this->fkNTC_UnidadMedida,
            'fkNTC_UnidadMedidaVenta' => $this->fkNTC_UnidadMedidaVenta,
            'GestionExistencias' => $this->GestionExistencias,
            'CantidadMinimaCarrito' => $this->CantidadMinimaCarrito,
            'CantidadMaximaCarrito' => $this->CantidadMaximaCarrito,
            'IncrementoCantidad' => $this->IncrementoCantidad,
            'CantidadIncremento' => $this->CantidadIncremento,
            'CantidadMarcaSinStock' => $this->CantidadMarcaSinStock,
            'DivisibleParaEnvio' => $this->DivisibleParaEnvio,
            'PedidosArticulosAgotados' => $this->PedidosArticulosAgotados,
            'AvisoClienteArticuloPedidoAgotado' => $this->AvisoClienteArticuloPedidoAgotado,
            'Quitar' => $this->Quitar,
            'fkNTC_Almacen' => $this->fkNTC_Almacen,
            'fkNTC_Marca' => $this->fkNTC_Marca,
            'App' => $this->App,
            'Stock' => $this->Stock,
            'Art_modificado' => $this->Art_modificado,
        ]);

        $query->andFilterWhere(['like', 'Referencia', $this->Referencia])
            ->andFilterWhere(['like', 'ReferenciaProveedor', $this->ReferenciaProveedor])
            ->andFilterWhere(['like', 'ReferenciaColor', $this->ReferenciaColor])
            ->andFilterWhere(['like', 'Nombre', $this->Nombre])
            ->andFilterWhere(['like', 'Descripcion', $this->Descripcion])
            ->andFilterWhere(['like', 'DescripcionCorta', $this->DescripcionCorta])
            ->andFilterWhere(['like', 'MetaTitle', $this->MetaTitle])
            ->andFilterWhere(['like', 'MetaKeywords', $this->MetaKeywords])
            ->andFilterWhere(['like', 'MetaDescription', $this->MetaDescription])
            ->andFilterWhere(['like', 'MetaRobots', $this->MetaRobots]);

        return $dataProvider;
    }
}
