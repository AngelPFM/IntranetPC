<?php
// echo "MCategoriaController / (views/site/categorias.php)";
// echo '<pre>'.print_r($dataTree,1).'</pre>';
?>

<section id="seccion_treeview">
	<section id="bloque_sidebar_seccion">
		<section id="sidebar_seccion">
		<?php
		$this->widget('application.components.widgets.MenuTreeView',array(
				'data'=>$dataTree,
				'dragAndDrop'=>true,
				'click'=>'function(event){
					var node = event.node;
					var id = node.id;
					$.ajax({
						type: "GET",
						dataType: "html",
						url: "'.Yii::$app->createAbsoluteUrl('/categoria/view').'/?id="+id,
						success: function(data){$("#contenido_seccion").html(data);}
					});
				}',
				// No se pueden mover los menús propiamente dichos, sólo sus descendientes
				//'onCanMove'=>'js:function(node){return (node.ascendant!=0);}',
				// No se pueden mover elementos entre menús
				'onCanMoveTo'=>'js:function(moved_node, target_node, position){
					if((moved_node.ascendant != target_node.ascendant)){
						return false;
					}
					return true;
				}',
				'move'=>'function(event){
					var info = event.move_info;
					var moved_node = info.moved_node;
					var target_node = info.target_node;
					var position = info.position;
					var previous_parent = info.previous_parent;
					event.preventDefault(); // Por defecto evitar el movimiento.
					$.ajax({						
						type: "POST",
						url: "'.Yii::$app->createAbsoluteUrl('/categoria/move').'",
						data: {"moved": moved_node.id, "to": target_node.id, "pos": position, "parent": previous_parent.id},
						dataType: "json",
						success: function(data){
							if(data==1){
								info.do_move();
							}
						}
					});				 	
				}'
		));
		?>
		</section>
	</section>
	<section id="bloque_contenido_seccion">
		<section id="contenido_seccion">			
		</section>
	</section>
</section>

