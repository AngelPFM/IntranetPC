<?php

/**
 * Controlador para el modelo TarifaEnvio
 * @author Manuel Mestres
 *
 */
class TarifaEnvioController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TarifaEnvio');
	}
	
}
