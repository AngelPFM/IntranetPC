<?php

/**
 * Controlador para el modelo DireccionEnvio
 * @author Oscar Tordera
 *
 */
class DireccionEnvioController extends GenericController
{
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'DireccionEnvio');
	}
}
