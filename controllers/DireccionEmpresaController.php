<?php

/**
 * Controlador para el modelo DireccionEmpresa
 * @author Oscar Tordera
 *
 */
class DireccionEmpresaController extends GenericController
{
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'DireccionEmpresa');
	}
}
