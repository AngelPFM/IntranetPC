<?php $this->beginContent('//layouts/main'); ?>
<section id="cuerpo">
	
	<section id="bloque_contenido">
		<section id="contenido">
		<?php 
			echo $content; 
		?>
		</section>
	</section>
	<?php 
	if( isset($this->sublistados) ){
	?>
	<section id="menus_sublistados">
		<section id="dentro_menus_sublistados">
		<?php
			$this->widget('zii.widgets.CMenu', array(
					'items'=>$this->sublistados,
					'htmlOptions'=>array('class'=>'operations'),
			));
		?>
		</section>
	</section>
	<section id="contiene_sublistado" style="border-top:1px solid #6FACCF; margin-top:20px; padding-top:20px;"></section>
	<?php 
	}
	?>
</section>
<?php $this->endContent(); ?>