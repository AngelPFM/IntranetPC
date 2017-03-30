<?php

/**
 * Controlador para el modelo Idioma
 * @author Jesús Mira
 *
 */
class IdiomaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Idioma');
	}
	
}
