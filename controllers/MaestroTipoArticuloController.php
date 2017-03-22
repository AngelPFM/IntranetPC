<?php

/**
 * Controlador para el modelo MaestroTipoArticulo
 * @author Jesús Mira
 *
 */
class MaestroTipoArticuloController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'MaestroTipoArticulo');
	}
	
}
