<?php

/**
 * Controlador para el modelo RedSocial
 * @author Manuel Mestres
 *
 */
class RedSocialController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'RedSocial');
	}
	
}
