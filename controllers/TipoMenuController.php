<?php

/**
 * Controlador para el modelo TipoMenu
 * @author Jesús Mira
 *
 */
class TipoMenuController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'TipoMenu');
	}
	
}
