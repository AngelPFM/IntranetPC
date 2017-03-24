<?php 
$this->renderPartial('/reports/_cabecera', array('model'=>$documento, 'empresa'=>$empresa)); 
$ivaIncluido = ($documento->Importe != $documento->ImporteIvaIncl);
$simbolo = $documento->divisa()->Simbolo; ?>

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
								<?php echo Yii::t('report', 'Dirección Facturación', array(), 'messages', Yii::$app->language) ?>
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
			<td style="width: 15%; padding-right: 7px; text-align: right; vertical-align: top; font-size: 7pt;">
			<!-- CUSTOMER INFORMATION -->
				<?php $pedido =$documento->pedido(); ?>
				<b><?php echo $pedido->getAttributeLabel('Numero'); ?></b>
				<br />											
				<?php echo $pedido->Numero ?>
				<br /><br />
				<b><?php echo $pedido->getAttributeLabel('Fecha'); ?></b><br />
				<?php echo $pedido->Fecha //TODO: Formato Fecha según pais ?><br />
				<br />
				<b><?php echo $pedido->getAttributeLabel('fkNTC_FormaPago'); ?></b><br />
				<?php echo $pedido->formaPago()->Nombre; ?><br />
				<br />
			<!-- / CUSTOMER INFORMATION -->
			</td>
			<td style="width: 85%; text-align: right">
				<table style="width: 100%; font-size: 8pt;">
					<tr style="line-height:4px;">
						<?php 
						$linea = new LineaAlbaranVenta();
						//TODO: Simbolo de moneda a derecha o izquierda dependiendo del pais.
						?>
						<td style="text-align: left; background-color: #4D4D4D; color: #FFF; padding-left: 10px; font-weight: bold; width: 10%">
							<?php echo $linea->getAttributeLabel('Referencia'); ?>
						</td>
						<td style="text-align: left; background-color: #4D4D4D; color: #FFF; padding-left: 10px; font-weight: bold; width: 50%">
							<?php echo $linea->getAttributeLabel('Descripcion'); ?>
						</td>						
						<td style="background-color: #4D4D4D; color: #FFF; text-align: center; font-weight: bold; width: 10%">
							<?php echo $linea->getAttributeLabel('Cantidad'); ?>
						</td>						
						<td style="background-color: #4D4D4D; color: #FFF; text-align: right; font-weight: bold; width: 15%">
							<?php if ($documento->AlbaranValorado){ echo $linea->getAttributeLabel('Importe'); } ?><br />
						</td>
						<td style="background-color: #4D4D4D; color: #FFF; text-align: right; font-weight: bold; width: 15%">
							<?php if ($documento->AlbaranValorado && ($ivaIncluido)){ 
									echo $linea->getAttributeLabel('ImporteIva').'<br />'; } ?>
						</td>
					</tr>
					<?php 
					$tipo="impar";
					foreach ($documento->lineas as $linea): ?>
						<tr style="line-height:6px; background-color:<?php echo (($tipo=="impar")? '#FFF':'#DDD') ?>;">
							<td style="text-align: left; width: 10%"><?php echo $linea->articulo()->Referencia; ?></td>
							<td style="text-align: left; width: 50%"><?php echo $linea->Descripcion; ?></td>							
							<td style="text-align: center; width: 10%"><?php echo $linea->Cantidad; ?></td>
							<td style="text-align: right; width: 15%"><?php if ($documento->AlbaranValorado){ echo $linea->Importe.' '.$simbolo; } ?></td>
							<td style="text-align: right; width: 15%"><?php if ($documento->AlbaranValorado && ($ivaIncluido)){ echo $linea->ImporteIva.' '.$simbolo; }?></td>
						</tr>						
					<?php 
						$tipo = (($tipo=="impar")? "par":"impar");
					endforeach; ?>
				</table>
	
				<table style="width: 100%">
				<?php if($documento->AlbaranValorado): ?>
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
				<?php endif; ?>
				</table>
			</td>
		</tr>
	</table>
	<!-- / PRODUCTS TAB -->
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