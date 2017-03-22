<table style="width: 100%">
	<tr>
		<td style="text-align: center; font-size: 6pt; color: #444; width: 100%">
			<span><?php echo Yii::t('reports', 'Documento Disponible en su Cuenta', array(), 'messages', Yii::app()->language); ?></span>            
    		<br />
			<?php echo $empresa->Dominio ?>
			<br />
			<?php echo Yii::t('reports','Para más información, contacte con nosotros:', array(), 'messages', Yii::app()->language); ?>
			<br />
			<?php echo Yii::t('reports','Teléfono:', array(), 'messages', Yii::app()->language); ?>&nbsp;
			<?php echo $empresa->Telefono; ?>
			<?php if(isset($empresa->Fax)): ?>
			<?php echo Yii::t('reports','Fax:', array(), 'messages', Yii::app()->language); ?>&nbsp;
			<?php echo $empresa->Fax; ?>			
			<?php endif; ?>
			<br />
            <?php if(isset($empresa->HorarioContacto)): ?>
			<?php echo Yii::t('reports','HorarioContacto:', array(), 'messages', Yii::app()->language); ?>&nbsp;
			<?php echo $empresa->HorarioContacto; ?>			
			<?php endif; ?>
		</td>
	</tr>
</table>