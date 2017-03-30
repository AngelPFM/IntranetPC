<?php

/**
 * Controlador para el modelo FormaPago
 * @author Jesús Mira
 *
 */
class FormaPagoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'FormaPago');
	}
	
}
