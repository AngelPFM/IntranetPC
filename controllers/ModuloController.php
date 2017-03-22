<?php

/**
 * Controlador para el modelo Modulo
 * @author Oscar Tordera
 *
 */
class ModuloController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Modulo');
	}
	
	public function actionVisitasAjax($mod=0){
		$modulo = Modulo::model()->findByPk($mod);
		
		$modulo->Visitas++;
		$retorno = '0';
		
		if( $modulo->Save() ){
			$retorno = '1';
		}
		
		echo $retorno;
	}
	
	public function actionPermisosAjax($rol=0, $mod=null){
		$aModulo = Modulo::model()->findAllByAttributes(array("idNTC_Modulo"=>$mod));
		$modulo = $aModulo[0];
		$modelo = $modulo->Modelo;	
		
		$instancia = new $modelo();
		$misAcciones = Accion::model()->findAllByAttributes(array("fkNTC_Modulo"=>$modulo->idNTC_Modulo, "fkNTC_Rol"=> $rol, "Quitar"=>0 ));
		
		Yii::app()->clientScript->registerScript(
		'ordenarCamposPermisos', "
			
			var elems = $('fieldset[orden]').remove();
		    elems.sort(function(a,b){
		        return parseInt($(a).attr('orden')) > parseInt($(b).attr('orden'));
		    });

		    $('#contenedor_campos').append(elems);
			
		", CClientScript::POS_READY);
		
		Yii::app()->clientScript->registerScript(
			'checks_de_accion',
			"$('.chk_Accion').each(
				function(index){
					$(this).on(
						'click',
						function(event){
							var modulo  = $(this).val().split('.')[0];
							var rol     = $(this).val().split('.')[1];
							var accion  = $(this).val().split('.')[2];
							var checked = $(this).attr('checked');
							var estado  = (checked!='checked')?1:0;
							
							$.get('" .  $this->createUrl('Accion/checkeaAjax') . "', 'mod=' + modulo + '&rol=' + rol + '&accion=' + accion + '&state='+estado);
						}
					);
				}
			);",
			CClientScript::POS_READY 
		);
		
		Yii::app()->clientScript->registerScript(
			'checks_de_campo',
			"$('.chk_Campo').each(
				function(index){
					$(this).on(
						'click',
						function(event){
							var modulo    = $(this).val().split('.')[0];
							var rol       = $(this).val().split('.')[1];
							var campo     = $(this).val().split('.')[2];
							var escenario = $(this).val().split('.')[3];
							var checked   = $(this).attr('checked');
							var estado = (checked!='checked')?1:0;
				
							$.get('" .  $this->createUrl('Campo/checkeaAjax') . "', 'mod=' + modulo + '&rol=' + rol + '&campo=' + campo + '&escenario='+escenario + '&state='+estado);
						}
					);
				}
			);",
			CClientScript::POS_READY 
		);
		
		$this->renderPartial(
				'/intranet/permisoModulo',
				array(
						'modulo'=>$modulo,
						'misAcciones'=>$misAcciones,
						'instancia'=>$instancia,
						'rol'=>$rol,
				),
				false,
				true
		);
	}
}
