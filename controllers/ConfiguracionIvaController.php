<?php

/**
 * Controlador para el modelo ConfiguracionIva
 * @author Manuel Mestres
 *
 */
class ConfiguracionIvaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'ConfiguracionIva');
	}
	
}
