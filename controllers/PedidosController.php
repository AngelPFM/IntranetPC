<?php

class PedidosController extends GenericController {

    /**
     * @param string $id Identificador del controlador
     */
    public function __construct($id, $module = null) {
        parent::__construct($id, $module, 'DocumentoVenta');
    }

    public function filters() {
        return array('controlAcceso');
    }

    public function filterControlAcceso($filterChain) {
        if (Yii::$app->user->isGuest) {
            $url = $this->createUrl("site/login");
            Yii::$app->request->redirect($url);
        }

        $filterChain->run();
    }

    public function actionTramites() {

        $criteria = new CDbCriteria();
        $criteria->addCondition("Enviado=1");
        $criteria->addCondition("t.fkNTC_TipoEstadoPedido <> 3");
        $criteria->addCondition("t.fkNTC_TipoEstadoPedido <> 6");
        $criteria->order = "idNTC_DocumentoVenta DESC";
        $criteria->offset = 0;
        $criteria->limit = 50;
        $criteria->together = 1;
        $estados = TipoEstadoPedido::model()->findAll();
        $pedidos = DocumentoVenta::model()->with('lineas', 'lineas.lote', 'lineas.lote.Lotes')->together()->with('formaPago')->with('tipoEstadoPedido')->with('clienteVenta', 'clienteVenta.usuarioWeb')->together()->findAll($criteria);

        $this->render('/intranet/tramites', array('pedidos' => $pedidos,'estados'=>$estados));
    }

}
