<?php

/**
 * Controlador para el modelo TipoIvaProducto
 * @author Jesús Mira
 *
 */
class TipoIvaProductoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoIvaProducto');
	}
	
}
