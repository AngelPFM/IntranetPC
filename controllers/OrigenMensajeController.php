<?php

/**
 * Controlador para el modelo OrigenMensaje
 * @author Manuel Mestres
 *
 */
class OrigenMensajeController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'OrigenMensaje');
	}
	
}
