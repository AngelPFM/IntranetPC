<?php

/**
 * Controlador para el modelo TipoCalculoIva
 * @author Manuel Mestres
 *
 */
class TipoCalculoIvaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoCalculoIva');
	}
	
}
