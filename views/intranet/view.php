
<section id="operaciones">
	<section id="dentro_operaciones">
		<?php
		$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
		));
		?>
	</section>
</section>

<section id="detalle_modelo" style="padding-top: 20px;">
	<?php 
	if($arrTraduccion){
		echo "<table class=\"detail-view tabla-traduccion\"><tbody>";
		//foreach ($arrTraduccion as $idiomaTraduccion=>$campos){
			echo "<tr class='cabecera-idioma'><td></td><td>".Idioma::model()->findByPk(Yii::app()->sourceLanguage)->Nombre."</td>";
			
			foreach($arrTraduccion["idiomas"] as $idioma){
				if($idioma != Yii::app()->sourceLanguage){
					echo "<td>".Idioma::model()->findByPk($idioma)->Nombre."</td>";
				}
			}
			
			echo "</tr>";
			
			if($model->GetModelName() == "Categoria"){
				echo "<tr><th>Url</th>";
				$urlAbsoluta = Yii::app()->getBaseUrl(true);
				$arrUrl = explode("intranet", $urlAbsoluta);
				$urlAbsoluta = array_shift($arrUrl);
				
				echo "<td>".$urlAbsoluta.$campos["Nombre"]."</td>";
				foreach($arrTraduccion["idiomas"] as $idioma){
					if($idioma != Yii::app()->sourceLanguage){
						echo "<td>".$urlAbsoluta.$arrTraduccion[$idioma]["camposIdioma"]["Nombre"]."</td>";
					}
				}
				echo "</tr>";
			}
			
			
			$c=0;
			foreach( $campos as $nombreCampo=>$campo ){
				if($nombreCampo != "idNTC_".$model->getModelName()){
					$parimpar = ($c%2==0)?"even":"odd";
					if(true || $c > 0){
						echo "<tr class='$parimpar'><th>".$atributos[$c]["label"]."</th><td>".$campo."</td>";
						
						foreach($arrTraduccion["idiomas"] as $idioma){
							if($idioma != Yii::app()->sourceLanguage){
								echo "<td>".$arrTraduccion[$idioma]["camposIdioma"][$nombreCampo]."</td>";
							}
						}
						echo "</tr>";
					}
					$c++;
				}
			}
		//}
		echo "</tbody></table>";
	}else{
		if($model->GetModelName() == "Categoria"){
			$urlAbsoluta = Yii::app()->getBaseUrl(true);
			$arrUrlAbsoluta = explode("intranet", $urlAbsoluta);
			$urlAbsoluta = array_shift($arrUrlAbsoluta);
		
			
			array_unshift($atributos, array("label"=>"Url", "type"=>"raw", "value"=>$urlAbsoluta.$model->getAttribute("Nombre")));
		}
		
		$this->widget(
				'zii.widgets.CDetailView',
				array(
						'data'			=>	$campos,
						'attributes'	=>	$atributos,
						'nullDisplay'	=>	'<span class="null">vacio</span>'
				)
		);
	}
?>
</section>
<?php 
/**
 * Gestionamos por AJAX la asignacion de permisos sobre
 * modulos, acciones de modulo y campos de modulo.
 * Cargamos la vista de permisos que es la que tiene toda esta movida
 */
if( $model->getModelName() == "Rol" && Yii::app()->user->getUsuario()->fkNTC_Rol == 1 )
{
	?>
<section id="permisos">
	<?php 
	$this->renderPartial(
			'/intranet/permisos',
			array(
					'model'=>$model,
					'campos'=>$campos,
					'rol'=>$model->getPkValue(),
			)
		);

?>
</section>
<?php 
}
// Yii::log('FICHEROS: '.print_r($ficheros,1));
if(isset($ficheros)){
?>
<section id="ficheros">
	<?php 
	$parametros = array('tipoFicheros' => $tipoFicheros,'tabla' => $model->tableName(),'modelId'=>$model->getPkValue());
	Yii::import("xupload.models.XUploadForm");
	$xmodel = new XUploadForm();
	$this->renderPartial(
					'/intranet/upload',
					array(
							'model' => $xmodel,
							'parametros' => $parametros,
							'multiple' => true,
	// 						'ficheros'=> $ficheros,
	// 						'id'=>$model->getPkvalue(),
	// 						'tabla' => $model->tableName()

					)
			);
	//Yii::log("FICHERO: ".print_r($ficheros[0],1));
	
	$this->actionGridView($ficheros);
?>

</section>
	<?php/*
		if($model->getModelName() == "Articulo"){
			?>
				<div class="contenedor-boton-generar">
					<a href="javascript:void(0);" class="btn-generar-variantes" onclick="generarVariantes(this)" idArticulo="<?=$model->getPkValue()?>"><?=Yii::t("intranet", "Generar variantes")?></a>
					<span class="mensaje-generar"></span>
				</div>
			<?
		}*/
	?>
<?php 
 	}
if(is_readable(getcwd()."/protected/views/subviews/".strtolower($model->getModelName()).".php"))
    $this->renderPartial("/subviews/".strtolower($model->getModelName()), array("model"=>$model));
 	?>
