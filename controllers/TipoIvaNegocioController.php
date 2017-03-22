<?php

/**
 * Controlador para el modelo TipoIvaNegocio
 * @author Jesús Mira
 *
 */
class TipoIvaNegocioController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoIvaNegocio');
	}
	
}
