<?php

/**
 * Controlador para el modelo DocumentoVenta
 * @author Jesús Mira
 *
 */
class DocumentoVentaController extends GenericController {

    /**
     * @param string $id Identificador del controlador
     */
    public function __construct($id, $module = null) {
        parent::__construct($id, $module, 'DocumentoVenta');
    }

    public function actionEnviar($id) {
        $pedido = DocumentoVenta::model()->findByPk($id);
        $this->pageTitle = 'Enviar Pedido ' . ' #' . $id . '#';

        $model = new EnviarPedidoForm();

        if (isset($_POST['EnviarPedidoForm'])) {
            $model->attributes = $_POST["EnviarPedidoForm"];
            // Ajax-based validation
            if (Yii::app()->request->isAjaxRequest && isset($_POST['ajax']) && $_POST['ajax'] === 'enviar-form') {
                Yii::log('Ajax');
                echo CActiveForm::validate($model);
                Yii::app()->end();
            }

            if ($model->validate()) {
                //CREAR ALBARAN
                $albaran = $pedido->enviar($model->FechaEnvio, $model->Comentario, $model->AlbaranValorado);
                if ($albaran != null) {
                    Yii::log('PEDIDO ENVIADO');
                    $pedido->Enviado = true;
                    $pedido->fkNTC_TipoEstadoPedido = TipoEstadoPedido::ESTADO_ENVIADO;
                    $pedido->save();
                    //IMPRIMIR ALBARAN (valorado o no)
                    $urlAlbaran = $this->actionImprimirAlbaran($albaran);
                    if ($model->EnviarFactura) {
                        $factura = $pedido->facturar();
                        if ($factura != null) {
                            //Generar Factura
                            $urlFactura = $this->actionImprimirFactura($factura);
                            Yii::log('PEDIDO FACTURADO');
                            $pedido->fkNTC_TipoEstadoPedido = TipoEstadoPedido::ESTADO_FINALIZADO;
                            $pedido->save();
                        }
                    }
                }
            }
        }

        $this->menu = $pedido->accionesIntranetModelo($this->getModuleName($pedido->getModelName()), array('create', 'update', 'delete'));

        if ($pedido->EnviarFactura || $pedido->facturaObligatoria()) {
            $model->EnviarFactura = true;
        }


        $model->AlbaranValorado = $pedido->AlbaranValorado;
        $model->FechaEnvio = date('d/m/Y');

        $this->render('/intranet/shop/pedido/enviar', array('model' => $model, 'pedido' => $pedido, 'menu' => $menu));
    }

    public function actionFacturar($id) {
        $pedido = DocumentoVenta::model()->findByPk($id);

        if ($pedido->fkNTC_TipoEstadoPedido == TipoEstadoPedido::ESTADO_ENVIADO) {
            $this->pageTitle = 'Facturar Pedido ' . ' #' . $id . '#';
            $model = new FacturarPedidoForm();

            if (isset($_POST['FacturarPedidoForm'])) {
                $model->attributes = $_POST["FacturarPedidoForm"];
                // Ajax-based validation
                if (Yii::app()->request->isAjaxRequest && isset($_POST['ajax']) && $_POST['ajax'] === 'enviar-form') {
                    Yii::log('Ajax');
                    echo CActiveForm::validate($model);
                    Yii::app()->end();
                }

                if ($model->validate()) {
                    $factura = $pedido->facturar();
                    if ($factura != null) {
                        //Generar Factura
                        $urlFactura = $this->actionImprimirFactura($factura);
                        Yii::log('PEDIDO FACTURADO');
                        $pedido->fkNTC_TipoEstadoPedido = TipoEstadoPedido::ESTADO_FINALIZADO;
                        $pedido->save();
                    }
                }
            }

            $this->menu = $pedido->accionesIntranetModelo($this->getModuleName($pedido->getModelName()), array('create', 'update', 'delete'));

            $this->render('/intranet/shop/pedido/facturar', array('model' => $model, 'pedido' => $pedido, 'menu' => $menu));
        }
    }

    public function actionImprimirAlbaran($albaran) {
        if (isset($albaran)) {
            $filename = Yii::app()->params['rutaDocumentos'] . $albaran->Numero . '.pdf';

            $empresa = Empresa::model()->findByPk(Yii::app()->params['Shop']['fkNTC_Empresa']);
            $report = $this->renderPartial('/reports/albaran', array('documento' => $albaran, 'empresa' => $empresa), true, false);

            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->WriteHTML($report);
            $html2pdf->Output($filename, EYiiPdf::OUTPUT_TO_FILE);

            return $filename;
        } else {
            if (isset($_GET['id'])) {
                $albaran = CabAlbaranVenta::model()->findByPk($id);
                if (isset($albaran) && $albaran->Enviado) {
                    if (file_exists(Yii::app()->params['rutaDocumentos'] . $albaran->Numero . '.pdf')) {
                        $this->redirect(Yii::app()->params['rutaDocumentos'] . $albaran->Numero . '.pdf');
                    }
                }
            }
        }
    }

    public function actionImprimirFactura($factura) {
        if (isset($albaran)) {
            $filename = Yii::app()->params['rutaDocumentos'] . $factura->Numero . '.pdf';

            $empresa = Empresa::model()->findByPk(Yii::app()->params['Shop']['fkNTC_Empresa']);
            $report = $this->renderPartial('/reports/factura', array('documento' => $factura, 'empresa' => $empresa), true, false);

            $html2pdf = Yii::app()->ePdf->HTML2PDF();
            $html2pdf->WriteHTML($report);
            $html2pdf->Output($filename, EYiiPdf::OUTPUT_TO_FILE);

            return $filename;
        } else {
            if (isset($_GET['id'])) {
                $factura = CabFacturaVenta::model()->findByPk($id);
                if (isset($factura) && isset($factura->FechaRegistro)) {
                    if (file_exists(Yii::app()->params['rutaDocumentos'] . $fatura->Numero . '.pdf')) {
                        $this->redirect(Yii::app()->params['rutaDocumentos'] . $fatura->Numero . '.pdf');
                    }
                }
            }
        }
    }

    public function actionIndex() {

        if($_GET['mod']=='255'){          
            $this->actionFinalizados();
        }elseif($_GET['mod']=='254'){          
            $this->actionCancelados();
        }
            else{
            $this->actionPendientes();
        }
    }
      public function actionPendientes() {   
        $criteria = new CDbCriteria();
        $criteria->addCondition("Enviado=0");
        $criteria->addCondition("t.fkNTC_TipoEstadoPedido<>3");
        $criteria->addCondition("t.fkNTC_TipoEstadoPedido<>6");
        $criteria->order = "idNTC_DocumentoVenta DESC";
     
        $pedidos = DocumentoVenta::model()->with('lineas', 'lineas.articulo','lineas.articulo.intralmacen')->with('clienteVenta','clienteVenta.usuarioWeb')->with('terminosPago')->together()->findAll($criteria);   
        $this->render('/intranet/pedidos', array('pedidos' => $pedidos));
    }
    
    public function actionCancelados() {
        
        $criteria = new CDbCriteria();
        $criteria->addCondition("t.fkNTC_TipoEstadoPedido=3");
        $criteria->order = "idNTC_DocumentoVenta DESC";
        $estados = TipoEstadoPedido::model()->findAll();        
        $pedidos = DocumentoVenta::model()->with('clienteVenta','clienteVenta.usuarioWeb')->with('terminosPago')->together()->findAll($criteria);  
        //CVarDumper::dump($pedidos,10,1);
        $this->render('/intranet/finalizados', array('pedidos' => $pedidos,'estados' => $estados));
    }
    
    public function actionFinalizados() {
 
        $criteria = new CDbCriteria();
        $criteria->addCondition("t.fkNTC_TipoEstadoPedido=6");
        $criteria->order = "idNTC_DocumentoVenta DESC";
        $estados = TipoEstadoPedido::model()->findAll();
        $pedidos = DocumentoVenta::model()->with('clienteVenta','clienteVenta.usuarioWeb')->with('terminosPago')->together()->findAll($criteria);   
        //CVarDumper::dump($pedidos,10,1);
        $this->render('/intranet/finalizados', array('pedidos' => $pedidos,'estados' => $estados));
    }

}   
