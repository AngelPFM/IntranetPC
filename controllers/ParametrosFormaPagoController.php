<?php

/**
 * Controlador para el modelo ParametrosFormaPago
 * @author Jesús Mira
 *
 */
class ParametrosFormaPagoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'ParametrosFormaPago');
	}
	
}
