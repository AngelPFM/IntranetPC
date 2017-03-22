<?php

/**
 * Controlador para el modelo GrupoDescuentoCliente
 * @author Manuel Mestres
 *
 */
class GrupoDescuentoClienteController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'GrupoDescuentoCliente');
	}
	
}
