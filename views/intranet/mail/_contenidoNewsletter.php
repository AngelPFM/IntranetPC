<?php 
if (isset($model)): ?>
	<table style="margin:0 auto;width:100%;">
<?php
	if(isset($model->Descripcion)): ?>
		<tr style="border: 1px solid #000;">
			<td style="padding:10px; text-align: center; color: #33CCCC"><?php echo Yii::t('newsletter', $model->Descripcion, array(), 'messages', Yii::$app->language) ?></td>
		</tr> <?php 
	endif; 
	$i = 0;
	foreach ($items as $item): 
		$i++; ?> 
		<tr>
			<td>
				<table style="margin:0 auto;width:100%;padding: 20px 0px;">
				<?php if(sizeof($items)==1): ?>
					<tr>
						<td style="text-align: center; height: 275px; vertical-align: top;"><img src="<?php echo $item['foto'] ?>" style="width: 275px;"></td>
					</tr>
					<tr>
					<td style="text-align: center; font-family: 'Marcellus', serif; font-size: 22px; color: #000; height: 50px;"><?php echo $item['nombre'] ?></td>
					</tr>
					<tr>
						<td style="text-align: center; font-size: 16px; color: #888;padding-bottom: 20px;"><?php echo $item['descripcion'] ?></td>
					</tr>					
					<tr>
						<td style="text-align: center; padding-bottom: 30px;"><span style="margin-right: 30px;font-size: 25px;font-family: 'Marcellus', 'serif'; color: #000;"><?php echo $item['precio'] ?></span><span style="color: #888;font-size: 25px;font-family: 'Marcellus';text-decoration: line-through;"><?php echo $item['preciobase']?></span></td>
					</tr>
					<tr>
						<td style="text-align: center; padding-bottom: 25px;"><a href="#" style="padding: 10px 20px; background-color: #000; color: #FFF; font-weight: normal;text-decoration: none;"><?php echo Yii::t('newsletter', 'Añadir a mi cesta', array(), 'messages', Yii::$app->language)?></a></td>
					</tr>
				<?php else: ?>
					<tr>
						<td style="width: 50%;<?php echo (($i<sizeof($items))? 'border-bottom: 1px solid #888;':'');?>"><img src="<?php echo $item['foto'] ?>" style="width: 275px;"></td>
						<td style="width: 50%;<?php echo (($i<sizeof($items))? 'border-bottom: 1px solid #888;':'');?>">
							<table style="margin: 0 auto; width: 100%;">
								<tr>
									<td style="text-align: center; font-family: 'Marcellus', serif; font-size: 22px; color: #000; height: 50px;"><?php echo $item['nombre'] ?></td>
								</tr>
								<tr>
									<td style="text-align: center; font-size: 16px; color: #888;padding-bottom: 20px;"><?php echo $item['descripcion'] ?></td>
								</tr>					
								<tr>
									<td style="text-align: center; padding-bottom: 30px;"><span style="margin-right: 30px;font-size: 25px;font-family: 'Marcellus', 'serif'; color: #000;"><?php echo $item['precio'] ?></span><span style="color: #888;font-size: 25px;font-family: 'Marcellus';text-decoration: line-through;"><?php echo $item['preciobase']?></span></td>
								</tr>
								<tr>
									<td style="text-align: center; padding-bottom: 25px;"><a href="#" style="padding: 10px 20px; background-color: #000; color: #FFF; font-weight: normal;text-decoration: none;"><?php echo Yii::t('newsletter', 'Añadir a mi cesta', array(), 'messages', Yii::$app->language)?></a></td>
								</tr>
							</table>
						</td>
					</tr>
				<?php endif; ?>			
				</table>
			</td>
		</tr>
	<?php 
	endforeach;?>
		<tr>
			<td style="text-align: center"><a href="http://www.danielhavillio.com" style="text-decoration: underline;">www.danielhavillio.com</a></td>
		</tr>		
	</table>
<?php 
endif;?>