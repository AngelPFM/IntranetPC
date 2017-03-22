<?php

/**
 * Controlador para el modelo Usuario
 * @author Oscar Tordera
 *
 */
class UsuarioController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Usuario');
	}
}
