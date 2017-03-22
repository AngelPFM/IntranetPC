<?php

/**
 * Controlador para el modelo FormularioContacto
 * @author Manuel Mestres
 *
 */
class FormularioContactoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'FormularioContacto');
	}
	
}
