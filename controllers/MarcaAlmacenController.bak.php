<?php

/**
 * Controlador para el modelo MarcaAlmacen
 * @author Alejandro Moncholi
 *
 */
class MarcaAlmacenController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'MarcaAlmacen');
	}
}
