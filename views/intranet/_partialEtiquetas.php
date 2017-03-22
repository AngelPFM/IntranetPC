<div class="cabecera-panel">
	<div id="cabecera-<?php echo $nombre; ?>" class="cabecera plegado" onclick="javascript:cambiaEstado($(this));">
		<span><?php echo ($nombre != '' ? $nombre : '-- Sin categoría --'); ?></span>
		<span class="menu-row"></span>
	</div>
	<div id="panel-<?php echo $nombre; ?>" class="panel plegado">
		<?php 
			$cont = 1;
			
			$width = 'style="width:'.((80  / (count($idiomas))) - 2).'%"';
			$width2 = 'width:'.((80  / (count($idiomas))) - 2).'%;';
			$style = 'style="width:20%;margin-top:5px;margin-bottom:5px;color:#9A978E;font-weight:bold;font-size:18px;padding-left:10px;display:inline-block;vertical-align:middle;"';
			$style2 = 'style="'.$width2.'margin-top:5px;margin-bottom:5px;color:#9A978E;font-weight:bold;font-size:18px;padding-left:10px;display:inline-block;vertical-align:middle;"';
		?>
			<div class="row even" style="border-bottom:1px #CCC solid;">
				<!-- <h2 <?php echo $style; ?>>Categoría</h2>-->
				<h2 <?php echo $style; ?>>Original</h2>
				<?php foreach($idiomas as $idioma) { ?>
					<h2 <?php echo $style2; ?>><?php echo $idioma->Nombre; ?></h2>
				<?php } ?>
			</div>
		<?php 	
			foreach($mensajes as $mensaje) {
		?>
			<div class="row <?php echo ($cont%2==0 ? 'odd' : 'even'); ?>">
				<!-- <label style="width:20%;word-wrap: break-word;"><?php echo $mensaje['Categoria']; ?></label>-->
				<label style="width:20%;word-wrap: break-word;"><?php echo $mensaje['Original']; ?></label>
				<?php foreach($idiomas as $idioma) { ?>
					<input id="<?php echo $mensaje['id'].'_'.$idioma->getPkValue(); ?>" type="text" <?php echo $width; ?> value="<?php echo htmlspecialchars($mensaje[$idioma->getPkValue()]); ?>" idorigen="<?php echo $mensaje['id']; ?>" lang="<?php echo $idioma->getPkValue(); ?>"></input>
				<?php } ?>
			</div>
		<?php $cont++; } ?>
	</div>
</div>