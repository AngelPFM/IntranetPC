<?php

/**
 * Controlador para el modelo Menu
 * @author Jesús Mira
 *
 */
class MenuController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Menu');
	}

	public function actionIndex()
	{
		//$campos = $model->visibilidad('index');
		$this->render(
				'/intranet/menus',
				array(
						'dataTree'=>Menu::model()->arbolMenus(),
						'model'=>$model,
						'campos'=>$campos,
						'camposBusqueda'=>$camposBusqueda,
						'modelName'=>$this->modelName,
				)
		);
	}	
	
	public function actionMove(){
		if(Yii::$app->request->isAjaxRequest && isset($_POST['moved']) && isset($_POST['to']) && isset($_POST['pos']) && isset($_POST['parent'])){
// 			Yii::log('MOVER MENU '.$_POST['moved'].' a '.$_POST['to'].' posicion: '.$_POST['pos'].' padre: '.$_POST['parent']);
			$to = $_POST['to'];
			$pos = $_POST['pos'];				
			
			// Como no se pueden mover elementos entre menús, ambos tienen el mismo padre.
			$siblings = Menu::model()->findByPk($_POST['parent'])->opcionesMenu();
			// Menu->opcionesMenu() devuelve los elementos ordenados por el campo Orden.
			$menu = Menu::model()->findByPk($_POST['moved']);
// 			Yii::log('MOVER: '.$menu->Titulo);
			$position = 10;
	
			if($to==$_POST['parent']){
				$pos='before';
				$to=$siblings[0]->idNTC_Menu;
			}
			foreach ($siblings as $opcion){
				if($opcion->idNTC_Menu != $menu->idNTC_Menu){
					if($opcion->idNTC_Menu == $to){
// 						Yii::log($pos.' '.$opcion->Titulo);
						switch($pos){
							case 'before':	$menu->Orden = $position;
											$menu->save(false, array('Orden'));
											$position+=10;
											$opcion->Orden = $position;													
											break;
							case 'after':
							case 'inside':	$opcion->Orden = $position;													
											$position+=10;
											$menu->Orden = $position;
											$menu->save(false, array('Orden'));
						}		
// 						Yii::log($menu->Titulo.' -> '.$menu->Orden);				
					}
					else{
						$opcion->Orden=$position;						
					}					
// 					Yii::log($opcion->Titulo.' -> '.$opcion->Orden);
					$opcion->save(false, array('Orden'));
					$position+=10;
				}
			}
			echo true;
		}
	}
	
}
