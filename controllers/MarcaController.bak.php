<?php

/**
 * Controlador para el modelo Marca
 * @author Alejandro Moncholi
 *
 */
class MarcaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Marca');
	}
}
