<?php

/**
 * Controlador para el modelo TipoTarifaVenta
 * @author Manuel Mestres
 *
 */
class TipoTarifaVentaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoTarifaVenta');
	}
	
}
