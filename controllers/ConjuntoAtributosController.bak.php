<?php

/**
 * Controlador para el modelo ConjuntoAtributos
 * @author Jesús Mira
 *
 */
class ConjuntoAtributosController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'ConjuntoAtributos');
	}
	
}
