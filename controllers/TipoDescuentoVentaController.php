<?php

/**
 * Controlador para el modelo TipoDescuentoVenta
 * @author Manuel Mestres
 *
 */
class TipoDescuentoVentaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoDescuentoVenta');
	}
	
}
