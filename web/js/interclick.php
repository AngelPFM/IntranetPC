	$(document).on("ready", inicializa_ready);
	
	function inicializa_window(){
		//$("html").css({"opacity":1}); 
		
		var h  = $(this).height();
		var hI = $("#parte_izquierda").height();
		var hD = $("#parte_derecha").height();
		
		if( hI >= hD && hI < h){
			$("#parte_izquierda").height( hI + (h-hI) );
		}
		else if( hI < hD && hD < h){
			$("#parte_derecha").height( hD + (h-hD) );
		}
		
		quitaAutoFind();
	}
	
	function inicializa_ready(){
		var opacidad = {"opacity":1};
		$("html").css(opacidad); 

		//manejaPaginasMias();
		
		manejaChecksBonitos();
		
		$("a.fancy").fancybox({"cyclic":false});
		
		$(window).on("load resize", inicializa_window);	
	}

	function cuenta_visitas(ev){
		var id = $(this).attr("id");
		id = id.replace("mod_","");
		
		var parametrosAjax = {
			'url': ruta + '/index.php/Modulo/VisitasAjax',
			'data':'mod='+id,
			'async':false,

			'success':function(data){
				if( data != '1' )
				{
					alert('ERROR');
				}
			}
		};
		
		$.ajax(parametrosAjax);
	}
	
	function despliegaMenus(id){
		if($("#menu_nav_" + id).css("display") != "block")
		{
			$(".menu_nav").hide("500");
			$("#menu_nav_" + id).show("1000");
		}
		else
		{
			$(".menu_nav").hide("500");
		}
	}
	
	function manejaChecksBonitosPermisos(){
		$("input[type=checkbox]").each(
				function(index){
					if(!$(this).next().hasClass('imgcheck')){ //previene ejecución duplicada
						var img = ruta + "/themes/interclick/images/check_on.png";
						if( !$(this).attr("checked") )
						{
							img = ruta + "/themes/interclick/images/check_off.png";
						}	
						var id = $(this).prop("id");
						
						$(this).after("<img style=\"cursor:pointer;\" class=\"imgcheck\" src=\""+img+"\" id=\"" + id + "_img\"/>").css({"position":"absolute","left":"-999999px"});
					}
		});
		 	
		$(".imgcheck").each(
				function(index){
					$(this).on(
						"click", 
						function(event){
							var check = "#" + $(this).prop("id");
							check = check.replace("_img","");
							
							var checked = $(check).attr("checked");
							
							if( checked == "checked" )
								$(this).attr("src", ruta + "/themes/interclick/images/check_off.png");	
							else
								$(this).attr("src", ruta + "/themes/interclick/images/check_on.png");
							
							$(check).trigger("click");
						}
					);
				}
		);
			
	}
	function manejaChecksBonitos(){
		 $("input[type=checkbox]").each(function(index){
			if(!$(this).next().hasClass('imgcheck')){ //previene ejecución duplicada
				var img = ruta + "/themes/interclick/images/check_on.png";
				if( !$(this).attr("checked") )
				{
					img = ruta + "/themes/interclick/images/check_off.png";
				}
				else{
					$(this).parent().addClass("check_on");
					$(this).parent().parent().addClass("quitado");
				}
					
				var id = $(this).prop("id");
				
				var status = "";
				if($(this).attr("readonly")=="readonly"){
					status = " readonly";
				}
				
				$(this).after("<img class=\"imgcheck"+status+"\" src=\""+img+"\" id=\"" + id + "_img\"/>").css({"position":"absolute","left":"-999999px"});
				
				
			}
		});
						
		$(".imgcheck").on("click", function(e){
			if(!$(this).hasClass("readonly")){
				var check = "#" + $(this).prop("id");
				check = check.replace("_img","");
				
				if( $(check).is(":checked") )
				{
					$(this).attr("src", ruta + "/themes/interclick/images/check_off.png");	
					$(check).attr("checked", false);
				}
				else
				{
					$(this).attr("src", ruta + "/themes/interclick/images/check_on.png");
					$(check).attr("checked", true);
				}
			}
		});
		
		$("td[esfichero] img").click(function(){
			quitarFichero($(this).parent());
		})
	}
	
	function quitarFichero(check){
		check = $(check);
		idFichero = check.find("input[type=checkbox]").val();
		
		if(check.hasClass("check_on")){
			check.removeClass("check_on");
			quitar = 0;
			check.parent().removeClass("quitado")
		}else{
			check.addClass("check_on");
			quitar = 1;
			check.parent().addClass("quitado")
		}
		var parametrosAjax = {
			'url': ruta+'/fichero/quitar',
			'data':'id='+idFichero+"&quitar="+quitar,
			'async':false,
			'success':function(data){
				if( data != '1' )
				{
					alert('ERROR');
				}
			},
			'error':function(){
				alert('ERROR');
			}
		};
		
		$.ajax(parametrosAjax);
		
	}
	
	function quitaAutoFind(){
		var inputSelector = '#buscador_listado input, ' + '#buscador_listado select';
		$(inputSelector).on('change keydown', 
			function(e){
				e.stopPropagation();
				//e.preventDefault(); 
			});	
		
		var cad = ""+$("tr.filters").html();
//		console.log( cad );
		
		if( cad.indexOf('mibotonbuscador') < 0 ){
			$("<input/>")
					.addClass("lupaBuscador")
					.attr("id", "mibotonbuscador")
					.attr("type", "button")
					.attr("onclick", "buscarEnFiltros();")
					.appendTo("tr.filters")
					.wrap('<td></td>');
		}
	}
	
        function buscarEnFiltros(){
		var inputSelector = '#buscador_listado input, ' + '#buscador_listado select';
		var serializado = $(inputSelector).serialize();
		
		jQuery.fn.yiiGridView.update(
				'buscador_listado',
				{
					data: serializado
				}
			);
			
			setTimeout(function(){introBuscar()}, 2000);
			return false;
	}
	 
	 function marcarPermisos(escenario){
	 	escenario = escenario || "";
	 	if(escenario == ""){
	 		$("#contiene_permisos_modulo input[type=checkbox]:not(:checked)").parent().find("img").click()
	 	}
	 	else{
	 		$("#contiene_permisos_modulo input[type=checkbox].escenario_"+escenario+":not(:checked)").parent().find("img").click();
	 	}
	 }
	 
	 function desmarcarPermisos(escenario){
	 	escenario = escenario || "";
	 	if(escenario == ""){
	 		$("#contiene_permisos_modulo input[type=checkbox]:checked").parent().find("img").click();
	 	}
	 	else{
	 		$("#contiene_permisos_modulo input[type=checkbox].escenario_"+escenario+":checked").parent().find("img").click();
	 	}
	 }
         
         function activalote(lote){
            $.post( "../ajax/activalote", { lote: lote})
            .done(function( data ) {
              $('#al'+lote).css('display','none');
            });
         }