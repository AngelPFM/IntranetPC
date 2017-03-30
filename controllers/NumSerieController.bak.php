<?php

/**
 * Controlador para el modelo NumSerie
 * @author Oscar Tordera
 *
 */
class NumSerieController extends GenericController
{
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'NumSerie');
	}
}
