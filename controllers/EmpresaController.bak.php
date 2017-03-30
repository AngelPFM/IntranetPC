<?php

/**
 * Controlador para el modelo Empresa
 * @author Oscar Tordera
 *
 */
class EmpresaController extends GenericController
{
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Empresa');
	}
}
