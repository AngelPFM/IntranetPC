<?php

/**
 * Controlador para el modelo ModuloEnvio
 * @author Alejandro Moncholi
 *
 */
class ZonaEnvioPaisController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'ZonaEnvioPais');
	}
}
