<?php 
$this->renderPartial('/reports/_cabecera', array('model'=>$documento, 'empresa'=>$empresa));
$ivaIncluido = ($documento->Importe != $documento->ImporteIvaIncl);
$simbolo = $documento->divisa()->Simbolo; 
?>
<div style="font-size: 8pt; color: #444">

	<table>
		<tr><td>&nbsp;</td></tr>
	</table>

	<!-- ADDRESSES -->
	<table style="width: 100%">
		<tr>
			<td style="width: 15%"></td>
			<td style="width: 85%">
				<table style="width: 100%">
					<tr>
						<td style="width: 50%">
							<span style="font-weight: bold; font-size: 10pt; color: #9E9F9E">
								<?php echo Yii::t('report', $documento->getAttributeLabel('fkNTC_DireccionEnvio'), array(), 'messages', Yii::$app->language) ?>
							</span><br />
							<?php //DIRECCION DE ENVIO
								echo $documento->DireccionEnvio.'<br />';
								echo $documento->LocalidadEnvio.'<br />';
								echo $documento->CodPostalEnvio.' - '.$documento->ProvinciaEnvio.'<br />';
								echo $documento->PaisEnvio;
							?>							
						</td>
						<td style="width: 50%">
							<span style="font-weight: bold; font-size: 10pt; color: #9E9F9E">
								<?php echo Yii::t('report', $documento->getAttributeLabel('fkNTC_DireccionFacturacion'), array(), 'messages', Yii::$app->language) ?>
							</span><br />
							<?php //DIRECCION DE FACTURACION
								echo $documento->DireccionFactura.'<br />';
								echo $documento->LocalidadFactura.'<br />';
								echo $documento->CodPostalFactura.' - '.$documento->ProvinciaFactura.'<br />';
								echo $documento->PaisFactura;
							?>		
						</td>
					</tr>
				</table>
			</td>
		</tr>
	</table>
	<!-- / ADDRESSES -->

	<div style="line-height: 1pt">&nbsp;</div>

<!-- PRODUCTS TAB -->
	<table style="width: 100%">
		<tr>
			<td style="width: 17%; padding-right: 7px; text-align: right; vertical-align: top; font-size: 7pt;">
				<!-- CUSTOMER INFORMATION -->
					<?php $pedido =$documento->pedido(); ?>
					<b><?php echo $pedido->getAttributeLabel('Numero'); ?></b>
					<br />											
					<?php echo $pedido->Numero ?>
					<br /><br />
					<b><?php echo $pedido->getAttributeLabel('Fecha'); ?></b><br />
					<?php echo $pedido->Fecha //TODO: Formato Fecha según pais ?><br />
					<br />
					<b><?php echo $pedido->getAttributeLabel('fkNTC_MetodoPago'); ?></b><br />
					<?php echo $pedido->formaPago()->Nombre; ?><br />
					<br />
				<!-- / CUSTOMER INFORMATION -->
				</td>
			</td>
			<td style="width: 83%; text-align: right">
				<table style="width: 100%; font-size: 8pt;">
					<tr style="line-height:4px;">
						<?php $linea = new LineaFacturaVenta();?>
						<td style="text-align: left; background-color: #4D4D4D; color: #FFF; padding-left: 10px; font-weight: bold; width: 10%;"><?php echo $linea->getAttributeLabel('Referencia'); ?></td>
						<td style="text-align: left; background-color: #4D4D4D; color: #FFF; padding-left: 10px; font-weight: bold; width: <?php echo (($ivaIncluido)? '25%':'35%');?>"><?php echo $linea->getAttributeLabel('Descripcion'); ?></td>
						<!-- unit price tax excluded is mandatory -->
						<td style="background-color: #4D4D4D; color: #FFF; text-align: right; font-weight: bold; width: 15%"><?php echo $linea->getAttributeLabel('Importe')?><br /></td>
						<?php if($ivaIncluido): ?>
						<td style="background-color: #4D4D4D; color: #FFF; text-align: right; font-weight: bold; width: 15%"><?php echo $linea->getAttributeLabel('ImporteIva')?></td>							
						<?php endif; ?>
						<td style="background-color: #4D4D4D; color: #FFF; text-align: right; font-weight: bold; width: 10%; white-space: nowrap;"><?php echo $linea->getAttributeLabel('Descuento')?></td>
						<td style="background-color: #4D4D4D; color: #FFF; text-align: center; font-weight: bold; width: 10%"><?php echo $linea->getAttributeLabel('Cantidad')?></td>
						<td style="background-color: #4D4D4D; color: #FFF; text-align: right; font-weight: bold; width: <?php echo (($ivaIncluido)? '15%':'25%');?>">
							<?php echo Yii::t('report', 'Subtotal', array(), 'messages', Yii::$app->language) ?>
						</td>
					</tr>
					<!-- PRODUCTS -->
										<?php 
					$tipo="impar";
					foreach ($documento->lineas as $linea): ?>
						<tr style="line-height:6px; background-color:<?php echo (($tipo=="impar")? '#FFF':'#DDD') ?>;">
							<td style="text-align: left; width: 10%"><?php echo $linea->articulo()->Referencia; ?></td>
							<td style="text-align: left; width: <?php echo (($ivaIncluido)? '25%':'35%');?>"><?php echo $linea->Descripcion; ?></td>		
							<td style="text-align: right; width: 15%"><?php echo $linea->Importe.' '.$simbolo; ?></td>
							<?php if ($ivaIncluido): ?>
							<td style="text-align: right; width: 15%"><?php echo $linea->ImporteIva.' '.$simbolo; ?></td>
							<?php endif; ?>	
							<td style="text-align: center; width: 10%"><?php echo $linea->Descuento; ?></td>				
							<td style="text-align: center; width: 10%"><?php echo $linea->Cantidad; ?></td>
							<td style="background-color: #4D4D4D; color: #FFF; text-align: right; font-weight: bold; width: <?php echo (($ivaIncluido)? '15%':'25%');?>">
								<?php echo Yii::t('report', 'Subtotal', array(), 'messages', Yii::$app->language) ?>
							</td>
						</tr>						
					<?php 
						$tipo = (($tipo=="impar")? "par":"impar");
					endforeach; ?>
					<!-- END PRODUCTS -->
				</table>
	
				<table style="width: 100%">
					<tr style="line-height:5px;">
						<td style="width: 85%; text-align: right; font-weight: bold">
							<?php echo $documento->getAttributeLabel('ImporteEnvio'); ?>
						</td>
						<td style="width: 15%; text-align: right;">
							<?php echo $documento->ImporteEnvio.' '.$simbolo; ?>
						</td>
					</tr>						
					<tr style="line-height:5px;">
						<td style="width: 85%; text-align: right; font-weight: bold">
							<?php echo $documento->getAttributeLabel('Importe') ?>
						</td>
						<td style="width: 15%; text-align: right;">
							<?php echo $documento->getAttributeLabel('Importe').' '.$simbolo; ?>
						</td>
					</tr>
					<?php if($ivaIncluido): ?>
					<tr style="line-height:5px;">
						<td style="width: 85%; text-align: right; font-weight: bold">
							<?php echo $documento->getAttributeLabel('ImporteIvaIncl') ?>
						</td>
						<td style="width: 15%; text-align: right;">
							<?php echo $documento->getAttributeLabel('ImporteIvaIncl').' '.$simbolo; ?>
						</td>
					</tr>						
					<?php endif; ?>	
				</table>
	
			</td>
		</tr>
	</table>
	<!-- / PRODUCTS TAB -->

	<div style="line-height: 1pt">&nbsp;</div>
	
	<!-- RESUMEN IVA -->
	<!-- / RESUMEN IVA -->
	
	<?php if(isset($documento->Comentario)): ?>
	<div style="line-height: 1pt">&nbsp;</div>
	<table style="width: 100%">
		<tr>
			<td style="width: 17%"></td>
			<td style="width: 83%">$documento->Comentario</td>
		</tr>
	</table>
	<?php endif; ?>

</div>

<?php  $this->renderPartial('/reports/_pie', array('model'=>$documento, 'empresa'=>$empresa)); ?>