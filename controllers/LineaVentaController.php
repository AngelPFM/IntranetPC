<?php

/**
 * Controlador para el modelo LineaVenta
 * @author Jesús Mira
 *
 */
class LineaVentaController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'LineaVenta');
	}
	
}
