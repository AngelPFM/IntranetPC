<?php

/**
 * Controlador para el modelo TarifaVenta
 * @author Manuel Mestres
 *
 */
class TarifaVentaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TarifaVenta');
	}
	
}
