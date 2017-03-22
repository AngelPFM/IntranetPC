<?php

/**
 * Controlador para el modelo TipoArticulo
 * @author Jesús Mira
 *
 */
class TipoArticuloController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoArticulo');
	}
	
}
