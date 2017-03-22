<?php

/**
 * Controlador para el modelo Tienda
 * @author Oscar Tordera
 *
 */
class TiendaController extends GenericController
{
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Tienda');
	}
}
