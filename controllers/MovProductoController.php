<?php

/**
 * Controlador para el modelo MovProducto
 * @author Jesús Mira
 *
 */
class MovProductoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'MovProducto');
	}
	
}
