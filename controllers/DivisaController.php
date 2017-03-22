<?php

/**
 * Controlador para el modelo Divisa
 * @author Jesús Mira
 *
 */
class DivisaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Divisa');
	}
	
}
