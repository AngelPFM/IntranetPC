<div class="contiene-titulos" style="padding: 10px 0px 10px 22px;background-color:white;">
	<span class="titulo-listado" style="font-size: 25px;color: #717171;width: 100%;display: inline-block;">Listado de Textos Traducibles</span>
	<span class="botonExpandir" onclick="javascript:expandeTodos();">Expandir todos</span>
	<span class="botonPlegar" onclick="javascript:pliegaTodos();">Plegar todos</span>
</div>
<script type="text/javascript">
	function pliegaTodos() {
		$('.cabecera-panel div').removeClass('desplegado');
		$('.cabecera-panel div').addClass('plegado');
	}

	function expandeTodos() {
		$('.cabecera-panel div').removeClass('plegado');
		$('.cabecera-panel div').addClass('desplegado');
	}

	function cambiaEstado(elemento)
	{
		if ($(elemento).hasClass('plegado'))
		{
			$(elemento).removeClass('plegado');
			$(elemento).addClass('desplegado');
			$(elemento).parent().find('.panel').each(function(index,panel) {
				$(panel).removeClass('plegado');
				$(panel).addClass('desplegado');
			});
		}
		else
		{
			$(elemento).removeClass('desplegado');
			$(elemento).addClass('plegado');
			$(elemento).parent().find('.panel').each(function(index,panel) {
				$(panel).removeClass('desplegado');
				$(panel).addClass('plegado');
			});
		}
	}
</script>
<div class="form">
	<?php 
		$idiomaDefecto = Idioma::model()->findAllByPk(Yii::app()->sourceLanguage);
		$criterioIdioma = new CDbCriteria();
		$criterioIdioma->addCondition("id".Yii::app()->params["prefijoTablasBd"]."Idioma != '".Yii::app()->sourceLanguage."'");
		$idiomas = Idioma::model()->findAllByAttributes(array('Quitar'=>0), $criterioIdioma);
		$idiomas = array_merge($idiomaDefecto, $idiomas);

		foreach ($categorias as $nombre=>$mensajes) {
			$this->renderPartial('/intranet/_partialEtiquetas',array('mensajes'=>$mensajes, 'nombre'=>$nombre, "idiomas"=>$idiomas), false);
		}
	?>
</div>
<script type="text/javascript">
	$("input").on("change",function() {
		$(this).prop('disabled',true);
		$(this).css('border-color','#999');
		var input = $(this);
		var id = $(input).attr('id');
		$(input).css('border-color','#eee');
		$.post(
			'<?php echo Yii::app()->createAbsoluteUrl('mensaje/updateAjax');?>',
			{
				id: $(this).attr('idorigen'),
				lang: $(this).attr('lang'),
				text: $(this).val()
			},
			function(data) {
				if (data == 'OK')
				{
					$(input).prop('disabled',false);
					$(input).css('border-color','green');
					setTimeout("$('#"+id+"').css('border-color','#eee');",3000);
				}
				else
				{
					$(input).prop('disabled',false);
					$(input).css('border-color','red');
				}
			}
		);
	});
</script>