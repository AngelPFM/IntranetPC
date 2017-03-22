<?php

class DiarioProductoController extends GenericController
{
	/**
	 * @param string $id Identificador del controlador
	 */
	public function __construct($id,$module=null) {
		parent::__construct($id, $module, 'DiarioProducto');
	}

	public function actionIndex()
	{
		$model=new $this->modelName();
		$numRegistros = -1;
		$errorList = array();
		$sinGuardar = array();

		if(isset($_POST)){
			// 			Yii::log('POST: '.print_r($_POST,1));
			$i = 1;
			foreach ($_POST as $indice=>$linea) {
				if(strpos($indice,'fila')===0){
					$lineModel = new $this->modelName();
					if(isset($linea['idNTC_DiarioProducto']) && ($linea['idNTC_DiarioProducto']!='')){
						$lineModel = $lineModel->findByPk($linea['idNTC_DiarioProducto']);
					}
					
					$lineModel->attributes = $linea;
					//Yii::log('LINEA: '.print_r($linea,1));
					$lineModel->Aplicada = 0;
					//Yii::log('GUARDAR: '.print_r($lineModel,1));
					if($lineModel->save()){
						if(!$lineModel->aplicar()){
							Yii::log('ERROR APLICAR: '.print_r($lineModel->getErrors(),1));
							$errorList[$i] = $lineModel->getErrors();
							$atributos = $lineModel->attributes;
							$atributos['Num']=$i;
							$sinGuardar[] = $atributos;
						}
					}
					else{
						// 					Yii::log('NO GUARDADA: '.print_r($lineModel->getErrors(),1));
						$errorList[$i] = $lineModel->getErrors();
						$atributos = $lineModel->attributes;
						$atributos['Num']=$i;
						$sinGuardar[] = $atributos;
					}
					$i++;
				}
			}
		}

		// 		Yii::log('Sin Guardar: '.print_r($sinGuardar,1));
		$campos = $model->visibilidad('index');
		//Yii::log('CAMPOS: '.print_r($campos,1));

		$headers = array_keys($campos);

		$columns = array();
		$columns[] =  array(
				'value'=>'$data["Num"]',
				'type'=>'raw',
				'htmlOptions'=>array('style'=>'width: 10px;'),
		);
		//echo "<pre>".print_r($campos,1)."</pre>";
		foreach ($campos as $campo=>$valor) {

			if($campo == 'fkNTC_UsuarioIntranet' || $campo == 'idNTC_DiarioProducto' ){
				$columns[] =  array(
						'header'=>'',
						'value'=>'CHtml::hiddenField("fila0['.$campo.']",$data["'.$campo.'"])',
						'type'=>'raw',
				);
			}
			else{
				if($valor !== 0){
					//relacion
					$tabla = new $valor();
					$valores = array();
					if(false && $valor == 'Variante'){			
						//echo "<pre>".print_r($model,1)."</pre>";
						if(isset($model->fkNTC_Articulo)){
							// Yii::log('variantes del articulo '.$model->fkNTC_Articulo);
							$tmpArticulo=$model->articulo();
							$valores = $tmpArticulo->variantes();
							
							//echo "<pre>".print_r($valores,1)."</pre>";
						}
					}else{
						//echo $valor;
						$valores = CHtml::listData($tabla->findAll(), $tabla->getPkName(), $tabla->viewName());
					}
					
					
					
					$listaValores = 'array(';
					$i = 1;
					foreach($valores as $index=>$value){
						$listaValores .= '"'.$index.'"=>"'.$value.'"';
						if($i<sizeof($valores)){
							$listaValores.=', ';
						}
						$i++;
					}
					$listaValores .= ')';
					
					$columns[] =  array(
							'header'=>$model->getAttributeLabel($campo),
							'value'=>'CHtml::dropDownList("fila0['.$campo.']",$data["'.$campo.'"],'.$listaValores.',array("style"=>"width: 180px;", "empty"=>"seleccione..."))',
							'type'=>'raw',
					);
				}
				else{
					$columns[] =  array(
							'header'=>$model->getAttributeLabel($campo),
							'value'=>'CHtml::textField("fila0['.$campo.']",$data["'.$campo.'"],array("style"=>"width: 170px;"))',
							'type'=>'raw',
					);
				}
			}
		}
		
		$headerColumns = $columns;
		$columns[] =  array(
				'value'=>'CHtml::link("Quitar", "#", array("id"=>"remove-line-link", "onclick"=>"borrarDiarioTemporal(this)"))',
				'type'=>'raw',
				'htmlOptions'=>array('style'=>'width: 20px;'),
		);
		$headerColumns[] =  array(
				'value'=>'CHtml::link("Añadir", "#", array("id"=>"add-line-link"))',
				'type'=>'raw',
				'htmlOptions'=>array('style'=>'width: 20px;'),
		);
		Yii::app()->clientScript->registerScript('diarioProductos','
			function borrarDiarioTemporal(boton){
				id = $(boton).parents("tr").find("input[name*=idNTC_DiarioProducto]").val();
				$.post("'.$this->createUrl('/diarioProducto/quitarDiarioTemp').'/",
				{id: id},
				function(postData){
					$(boton).parents("tr").remove();
				}
				);
				return false;
			}
			',CClientScript::POS_END);
		
		Yii::app()->clientScript->registerScript('diarioProductos',
				'var numLine = 0;
				
				$("#DiarioProducto-edit-form table td.empty").remove();
				$("#add-line-link").on("click", function(event){
					event.preventDefault();
						
					var code = $(this).parents("tr").clone();
					$(code).children("td").first().html(numLine+1);
					$(code).find("input[type=\"text\"]").each(function(key, value){
						var oldId = $(this).attr("id");
						$(this).attr("id",oldId.replace("fila0","fila"+(numLine+1)));
						var name = $(this).attr("name");
						name = name.replace("fila0","fila"+(numLine+1))
						$(this).attr("name",name);
						$("#"+oldId).val("");
					});
					$(code).find("input[type=\"hidden\"]").each(function(key, value){
						var oldId = $(this).attr("id");
						$(this).attr("id",oldId.replace("fila0","fila"+(numLine+1)));
						var name = $(this).attr("name");
						name = name.replace("fila0","fila"+(numLine+1))
						$(this).attr("name",name);
						$(this).val($("#"+oldId).val());
						$("#"+oldId).val("");
					});
					$(code).find("select").each(function(item){
						var oldId = $(this).attr("id");
						$(this).attr("id",oldId.replace("fila0","fila"+(numLine+1)));
						var name = $(this).attr("name");
						name = name.replace("fila0","fila"+(numLine+1))
						$(this).attr("name", name);
						var selOptVal =  $("#"+oldId+" option:selected").val();
						$(this).find("option[value=\'"+selOptVal+"\']").attr("selected","selected");
						$("#"+oldId+" option:selected").attr("selected", false);
					});
					$(code).find("a#add-line-link").each(function(item){
						$(this).replaceWith("<a href=\'#\' class=\'remove-link\' onclick=\'js: $(this).parents(\"tr\").remove(); return false;\'>Quitar</a>");
					});
					$("#DiarioProducto-edit-form table").append(code);
					numLine++;
				});
				$("select[name*=\'fkNTC_Articulo\']").each(function(){
					$(this).on("change", function(event){
						var campo = $(this).attr("id").replace("fkNTC_Articulo","fkNTC_Variante");
						var campo = $(this).parent().parent().find("#"+campo);
						$.ajax({
							type: "GET",
							dataType: "html",
							url: "'.Yii::app()->createAbsoluteUrl('/'.Articulo.'/change').'/?id="+$(this).val()+"&model=Variante",
							success: function(data){
								campo.html($(data).children("option"));
							}
						});
					})
				});',
				CClientScript::POS_READY);

		// 		Yii::log('Columnas: '.print_r($columns,1));

		$filtro = array('Aplicada'=>0);
		$search = $model->search($filtro);

		if(sizeof($sinGuardar)>0){
			$search = array_merge($search, $sinGuardar);
		}

		$model->initValues();
		$headerData = array();
		array_push($headerData, $model->attributes);

		$dataProviderParams = array();
		if( isset($search["numRegistros"]) ){
			$numRegistros = $search["numRegistros"];
			$search = $search["retorno"];
			$dataProviderParams['totalItemCount'] = $numRegistros;
		}

		$dataProviderParams = array_merge(
				$dataProviderParams,
				array(
						'keyField'=>$model->getPkname(),
						'id'=>$model->getPkname(),
				));

		$headerDataProvider = new CArrayDataProvider(
				$headerData,
				$dataProviderParams
		);
		$dataProvider = new CArrayDataProvider(
				$search,
				$dataProviderParams
		);
		// 		Yii::log('dataProvider: '. print_r($dataProvider,1));

		/**
		 * Buscamos si alguno de los campos son fk y en tal caso lo montamos para que
		 * muestre el nombre
		 */
		$this->formateaHeaders($model, $headers, $campos, true);

		$this->render(
				'/intranet/shop/diarioProductos/index',
				array(
						'headerDataProvider'=>$headerDataProvider,
						'dataProvider'=>$dataProvider,
						'headerColumns'=>$headerColumns,
						'headers'=>$columns,
						'model'=>$model,
						'campos'=>$campos,
						'modelName'=>$this->modelName,
						'numRegistros'=>$numRegistros,
						'errorList'=>$errorList,
				)
		);

	}

	public function actionQuitarDiarioTemp(){
		if(Yii::app()->request->isAjaxRequest && isset($_POST['id'])){
			$sqlBorrar = "DELETE FROM NTC_DiarioProducto WHERE idNTC_DiarioProducto = ".$_POST['id'];
			
			$command = Yii::app()->db->createCommand($sqlBorrar);
			$enVenta = $command->execute();
		}
	}
}