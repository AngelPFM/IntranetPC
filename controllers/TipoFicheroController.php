<?php

/**
 * Controlador para el modelo TipoFichero
 * @author Manuel Mestres
 *
 */
class TipoFicheroController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoFichero');
	}
	
}
