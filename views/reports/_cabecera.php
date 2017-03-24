<table style="width: 100%">
	<tr>
		<td style="width: 50%">
		<?php 
		$logo =  $empresa->logoInformes();
		if(isset($logo)): 
			Yii::log('IMAGEN CABECERA: '.realpath('/var/www/havillio/uploads/'.$logo->Nombre));$_COOKIE ?>
			<img src="<?php echo realpath('/var/www/havillio/uploads/'.$logo->Nombre) ?>" style="width:<?php echo $logo->Width; ?>px; height:<?php echo $logo->Height; ?>px;" />
		<?php 
		endif; ?>
		</td>
		<td style="width: 50%; text-align: right;">
			<table style="width: 100%">
				<tr>
					<td style="font-weight: bold; font-size: 14pt; color: #444; width: 100%">
						<?php echo $empresa->Slogan;?>
					</td>
				</tr>
				<tr>
					<td style="font-size: 14pt; color: #9E9F9E">
						<?php //TODO: Adapdar a formato regional 
						echo date('d/m/Y'); ?>
					</td>
				</tr>
				<tr>
				<td style="font-size: 14pt; color: #9E9F9E">
					<?php echo Yii::t('report', 'titulo_{modelo}', array('{model}'=>get_class($model)), 'messages', Yii::$app->language) ?>
				</td>
				</tr>
			</table>
		</td>
	</tr>
</table>