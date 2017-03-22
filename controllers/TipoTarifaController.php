<?php

/**
 * Controlador para el modelo TipoTarifa
 * @author Manuel Mestres
 *
 */
class TipoTarifaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoTarifa');
	}
	
}
