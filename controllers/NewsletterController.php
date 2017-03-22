<?php

class NewsletterController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'Newsletter');
	}
	
	public function actionPreview(){
		if(isset($_GET[id])){
			$model = Newsletter::model()->findByPk($_GET['id']);
			
			if(isset($model)){
				$items = $this->getNewsletterItems($model);
				$this->renderPartial('/intranet/mail/newsletter', array('model'=>$model, 'items'=>$items));
			}
		}		
	}
	
	public function actionSend(){
		if(isset($_GET[id])){
			$model = Newsletter::model()->findByPk($_GET['id']);
				
			if(isset($model)){
				$items = $this->getNewsletterItems($model);
				
				$suscriptores = Suscripcion::model()->findAll('Quitar=0');
				foreach ($suscriptores as $suscriptor){
					$message            = new YiiMailMessage;

					$message->view = "newsletter";
					$params = array('model'=>$model, 'items'=>$items);
					
					$message->subject    = Yii::t('newsletter', $model->Descripcion, array(), 'messages', Yii::app()->language);
					$message->setBody($params, 'text/html');
					$message->addTo($suscriptor->Email);
					Yii::log('FROM '.Yii::app()->params['Shop']['EmailNewsletters']);
					$message->from = Yii::app()->params['Shop']['EmailNewsletters'];
					Yii::log('FROM '.print_r($message->from,1));
					
					Yii::app()->mail->send($message);
					
					$suscriptor->FechaUltimoEnvio = date('Y-m-d H:i:s');
					$suscriptor->NombreUltimoEnvio = $model->Nombre;
					$suscriptor->save();
				}
			}
		}
	}
	
	private function getNewsletterItems($model){
		$items = array();
		foreach ($model->articulos() as $item){
				
			if(isset($item->fkNTC_Variante)){
				$variante = $item->variante();
				$articulo = $variante->articulo();
		
				$foto = $variante->foto();
				if(isset($foto)){
					$foto = Yii::app()->request->baseUrl.'/../Havillio/images/'.$foto->Fichero;
					Yii::log('FOTO VARIANTE: '.print_r($foto->attributes,1));
				}
				else{
					$fotos = $articulo->fotos();
					if(sizeof($fotos)>0){
						Yii::log('FOTO ARTICULO (v): '.print_r($fotos[0]->attributes,1));
						$foto = Yii::app()->request->baseUrl.'/../Havillio/images/'.$fotos[0]->Fichero;
					}
					else{
						$foto = '';
					}
				}
				$precio = $articulo->precioConImpuestos(1, false, null);
				if(isset($precio)){
					$descuento = $articulo->calcularDescuento(1, $precio, null);
					$precioDto = MetodosComunes::formatCurrency($precio - $descuento);
					$precio = MetodosComunes::formatCurrency($precio);
				}
				$items[] = array('idArticulo'=>$variante->fkNTC_Articulo, 'idVariante'=>$variante->idNTC_Variante ,'foto'=>$foto, 'nombre'=>$articulo->DescripcionCorta.' ('.$variante->Nombre.')', 'descripcion'=>$articulo->Descripcion, 'preciobase'=>$precio, 'precio'=>$precioDto);
			}
			else{
				if(isset($item->fkNTC_Articulo)){
					$articulo = $item->articulo();
					$fotos = $articulo->fotos();
						
					if(sizeof($fotos)>0){
						Yii::log('FOTO ARTICULO: '.print_r($foto[0]->attributes,1));
						$foto = Yii::app()->request->baseUrl.'/../Havillio/images/'.$fotos[0]->Fichero;
					}
					else{
						$foto = '';
					}
					$precio = $articulo->precioConImpuestos(1, false, null);
					if(isset($precio)){
						$descuento = $articulo->calcularDescuento(1, $precio, null);
						$precioDto = MetodosComunes::formatCurrency($precio - $descuento);
						$precio = MetodosComunes::formatCurrency($precio);
					}
					$items[] = array('idArticulo'=>$variante->fkNTC_Articulo,'foto'=>$foto, 'nombre'=>$articulo->DescripcionCorta, 'descripcion'=>$articulo->Descripcion, 'preciobase'=>$precio, 'precio'=>$precioDto);
				}
				else{
					if(isset($item->fkNTC_Categoria)){
						foreach($item->categoria()->articulos as $articulo){
							$fotos = $articulo->fotos();
							if(sizeof($fotos)>0){
								Yii::log('FOTO ARTICULO (c): '.print_r($fotos[0]->attributes,1));
								$foto = Yii::app()->request->baseUrl.'/../Havillio/images/'.$fotos[0]->Fichero;
							}
							else{
								$foto = '';
							}
							$precio = $articulo->precioConImpuestos(1, false, null);
							if(isset($precio)){
								$descuento = $articulo->calcularDescuento(1, $precio, null);
								$precioDto = MetodosComunes::formatCurrency($precio - $descuento);
								$precio = MetodosComunes::formatCurrency($precio);
							}
							$items[] = array('idArticulo'=>$variante->fkNTC_Articulo,'foto'=>$foto, 'nombre'=>$articulo->DescripcionCorta, 'descripcion'=>$articulo->Descripcion, 'preciobase'=>$precio, 'precio'=>$precioDto);
						}
					}
				}
			}
		}
		return $items;		
	}
}