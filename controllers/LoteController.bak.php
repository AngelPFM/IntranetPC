<?php

/**
 * Controlador para el modelo Lote
 * @author Manuel Mestres
 *
 */
class LoteController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Lote');
	}
}
