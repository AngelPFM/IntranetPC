<?php

/**
 * Controlador para el modelo Suscripcion
 * @author Manuel Mestres
 *
 */
class SuscripcionController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Suscripcion');
	}
	
}
