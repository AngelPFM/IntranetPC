<?php

class InactivoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Articulo');
	}
	
	 public function actionIndex() {
 
   $sql = "SELECT idNTC_Articulo, fichero.Fichero as 'Imagen', NTC_Articulo.Descripcion, Referencia, ReferenciaProveedor, surtido_libre as 'surtido_libre[tinyint]', fkNTC_Almacen, App
				FROM NTC_Articulo
				LEFT JOIN NTC_LoteArticulo as LA ON LA.fkNTC_Articulo = idNTC_Articulo
				LEFT JOIN NTC_Lote as lote ON LA.fkNTC_Lote = idNTC_Lote 
				LEFT JOIN NTC_Almacen as almacen ON fkNTC_Almacen = idNTC_Almacen
				LEFT JOIN NTC_Fichero as fichero ON fichero.fkNTC_Articulo = NTC_Articulo.idNTC_Articulo
				WHERE NTC_Articulo.Quitar = 0 AND (NTC_Articulo.Stock=0 or lote.Stock=0)
				GROUP BY Referencia
				ORDER BY idNTC_Articulo DESC";
                $command = Yii::app()->db->createCommand($sql);
                $result = $command->queryAll();

        $this->render('/intranet/inactivo', array('articulos' => $result));
    }
}