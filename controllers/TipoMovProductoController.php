<?php

/**
 * Controlador para el modelo TipoMovProducto
 * @author Jesús Mira
 *
 */
class TipoMovProductoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoMovProducto');
	}
	
}
