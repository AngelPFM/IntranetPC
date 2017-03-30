<?php

/**
 * Controlador para el modelo ModuloEnvioProvincia
 * @author Alejandro Moncholi
 *
 */
class ModuloEnvioProvinciaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'ModuloEnvioProvincia');
	}
}
