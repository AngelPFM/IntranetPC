<?php

/**
 * Controlador para el modelo Escaparate
 * @author Jesús Mira
 *
 */
class EscaparateController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Escaparate');
	}
	
}
