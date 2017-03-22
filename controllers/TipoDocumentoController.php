<?php

/**
 * Controlador para el modelo TipoDocumento
 * @author Jesús Mira
 *
 */
class TipoDocumentoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoDocumento');
	}
	
}
