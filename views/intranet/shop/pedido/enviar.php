
<section id="cabecera_resumen" style="margin-top:5px; margin-bottom: 20px; padding-top:5px;">
	<?php 
	$enviarFactura = ($pedido->EnviarFactura || $pedido->facturaObligatoria());

	$this->widget('application.components.widgets.XDetailView', array(
			'data' => array(
									'Numero'=>0,
									'Fecha'=>0,
									'Estado'=>0,
									'Cliente'=>0,
// 									'DatosEnvio'=>0,
									'Direccion'=>0,
									'Localidad'=>0,
									'ProvinciaCP'=>0,
									'Pais'=>0,
// 									'DatosContacto'=>0,
									'Atencion'=>0,
									'Telefono'=>0,
									'Comentarios'=>0,
								),
			'ItemColumns' => 2,
			'attributes' => array(
									array('label'=>$pedido->getAttributeLabel('Numero'),'type'=>'raw','value'=>$pedido->Numero),
									array('label'=>$pedido->getAttributeLabel('Fecha'),'type'=>'raw','value'=>$pedido->Fecha),
									array('label'=>$pedido->getAttributeLabel('fkNTC_TipoEstadoPedido'),'type'=>'raw','value'=>$pedido->tipoEstadoPedido->Nombre),
									array('label'=>$pedido->getAttributeLabel('NombreCliente'),'type'=>'raw','value'=>$pedido->NombreCliente),
// 									array('label'=>'','type'=>'raw','value'=>'DATOS DE ENVIO'),
									null,
									null,
									array('label'=>$pedido->getAttributeLabel('DireccionEnvio'),'type'=>'raw','value'=>$pedido->DireccionEnvio),
									array('label'=>$pedido->getAttributeLabel('LocalidadEnvio'),'type'=>'raw','value'=>$pedido->LocalidadEnvio),
									array('label'=>$pedido->getAttributeLabel('ProvinciaEnvio'),'type'=>'raw','value'=>$pedido->ProvinciaEnvio),
									array('label'=>$pedido->getAttributeLabel('CodPostalEnvio'),'type'=>'raw','value'=>$pedido->CodPostalEnvio),
									array('label'=>$pedido->getAttributeLabel('PaisEnvio'),'type'=>'raw','value'=>$pedido->PaisEnvio),
									null,
// 									array('label'=>'','type'=>'raw','value'=>'DATOS DE CONTACTO'),
									null,
									null,
									array('label'=>$pedido->getAttributeLabel('EnvioAtencionA'),'type'=>'raw','value'=>$pedido->EnvioAtencionA),
									array('label'=>'Teléfono','type'=>'raw','value'=>'('.$pedido->direccionEnvio()->PrefijoTelefono.') '.$pedido->direccionEnvio()->Telefono),
// 									array('label'=>'','type'=>'raw','value'=>'COMENTARIO'),
									null,
									null,
									array('label'=>$pedido->getAttributeLabel('Comentario'),'type'=>'raw','value'=>$pedido->Comentario),
			),
	)); ?>
</section>
<section id="lineas_resumen" style="margin-top:20px; padding-top:20px;">
<?php 			
	$criteria = new CDbCriteria();
	$criteria->compare('fkNTC_DocumentoVenta',$pedido->idNTC_DocumentoVenta);
	$criteria->limit = -1; //No limit
	$this->widget('zii.widgets.grid.CGridView', 
		array(
				'baseScriptUrl'=>Yii::$app->theme->baseUrl . '/gridview',
				'id'=>'buscador_listado',				
				'dataProvider'=> new CActiveDataProvider('LineaVenta', array(
								    'criteria'=>$criteria,
								    'sort'=>array('defaultOrder'=>'idNTC_LineaVenta ASC'), // orden por defecto según el atributo nombre
								  )),
				'columns'=>array(		
								'articulo.Referencia',						
								'Descripcion',
								'Cantidad',
								'Importe',
								'ImporteIva',
							),
				'enablePagination'=>false,
				'enableSorting'=>false, 
				'summaryText' => "",
			)
		);
?>
</section>
<section id="form-enviar" style="border-top:1px solid #6FACCF; margin-top:20px; padding-top:20px;">
	<div class="form">
		<?php 
		$form=$this->beginWidget('CActiveForm', 
			array(
				'id'=>'enviar-form',
				'enableAjaxValidation'=>true,
				'enableClientValidation'=>true,
				'clientOptions'=>array('validateOnSubmit'=>true),
				'htmlOptions'=>array('class'=>'fancy-form'),
	  		)
	  	);
		?>	  	
		<div class="row odd"> <?php
			$yearRange = 'c-100:c+10';
			if(strlen($model->FechaEnvio)>0 ){
				$model->FechaEnvio = date("d/m/Y", strtotime($model->FechaEnvio));
			}
			else{
				$model->FechaEnvio = date("d/m/Y");
			}
						
			echo $form->labelEx($model, FechaEnvio);
			Yii::import('application.extensions.CJuiDatePicker.CJuiDatePicker');
			$this->widget('zii.widgets.jui.CJuiDatePicker', array(
					'model'=>$model,   // model object
					'attribute'=>FechaEnvio,
					'value'=>$model->FechaEnvio,
					'options'=>array(
							'autoSize'=>true,
							'dateFormat'=>'dd/mm/yy',
							'defaultDate'=>$model->FechaEnvio,
							'buttomImageOnly'=>true,
							'buttonText'=>'Select',
							'showAnim'=>'fold',
							'showOn'=>'button',
							'showButtonPanel'=>true,
							'yearRange'=> $yearRange, 
							'changeMonth' => true,
							'changeYear' => true,
					),
					'language'=>'es',
			)); ?>
		</div>
		<div class="row even"> <?php
			echo $form->labelEx($model, 'Comentario');
			echo $form->textArea($model, 'Comentario', array('style'=>'vertical-align: top;')); ?>
		</div> 
		<div class="row odd"> <?php 
			echo $form->labelEx($model, 'AlbaranValorado');
			echo $form->checkBox($model, 'AlbaranValorado'); ?>
		</div>
		<div class="row even"> <?php 
			echo $form->labelEx($model, 'EnviarFactura');
			echo $form->checkBox($model, 'EnviarFactura'); ?>
		</div>		
		<p class="note">Los campos con <span class="required">*</span> son requeridos.</p>
		<?php echo $form->errorSummary($model); ?>
		<div class="row buttons">
				<?php echo CHtml::submitButton('Enviar', array("class"=>"btn btn-success") ); ?>
		</div> 
		<?php
		$this->endWidget(); ?>
	</div>
</section>
