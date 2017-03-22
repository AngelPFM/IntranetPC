<?php

/**
 * Controlador genérico en cliente.
 *
 * Al extender esta clase se crear un constructor de este tipo:
 *
 * public function __construct($id,$module=null) {
 * 		parent::__construct($id,$module,$stringConNombreDeModelo);
 * }
 *
 * Este constructor debemos llamar al constructor de la clase padre indicandole nombre
 * del modelo
 *
 * @author MMestres
 */
class GenericController extends Controller {

    /**
     * @var string $layout Layout por defecto para la vista. Por defecto es '//layouts/column2', que
     * indica un layaout de dos columnas. Ver 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @var string $modelName Nombre del modelo que controla
     */
    public $modelName;

    /**
     * @var string $_pkname Clave primaria del modelo
     */
    private $_pkname;

    /**
     * @var integer $_maxPorPagina El numero máximo de elementos por página que se
     * veran en el CGridView
     */
    public $_maxPorPagina = 10;
    public $sublistados;

    /**
     * Constructor sobrecargado
     * @param string $id Identificador del controlador
     * @param CWebModule $module Módulo al que pertenece el controlador
     * @param string $model Nombre del modelo
     */
    public function __construct($id, $module = null, $model) {
        parent::__construct($id, $module);

        $this->setModelName($model);

        $objModel = new $model();
        $this->_pkname = $objModel->primaryKey();
    }

    /**
     * Obtiene el modelo
     * @return string Nombre del modelo
     */
    public function getModelName() {
        return $this->modelName;
    }

    /**
     * Establece el modelo
     * @param string $modelName Nombre del modelo
     */
    public function setModelName($modelName) {
        $this->modelName = $modelName;
    }

    /**
     * Establece el nombre de la clave primaria
     * @param string $pkname
     */
    public function setPkname($pkname) {
        $this->_pkname = $pkname;
    }

    /**
     * Obtiene el nombre de la clave primaria
     * @return string
     */
    public function getPkname() {
        return $this->_pkname;
    }

    /**
     * Obtiene los filtros de acciones
     * @return array Filtros de acciones
     */
    public function filters() {
        return array(
            'controlAcceso - login',
            'ajax + indexAjax',
        );
    }

    //CONTROLA QUE LAS ACCIONES AJAX SE HAGAN POR AJAX
    public function filterAjax($filterChain) {
        $filterChain->run();
    }

    public function filterControlAcceso($filterChain) {
        $accion = $filterChain->action->getId();
        $url = $this->createUrl("site/login");

        //Si no estoy logeado te llevo a la pantalla de login
        if (!Yii::app()->user->isGuest) {
            $accion = $filterChain->action->getId();

            // El permiso de sublistado se llama sub, sin embargo intenta buscarlo por indexAjax,
            // asi que le damos el cambiazo.
            if ($accion == 'indexAjax' || strtolower($accion) == 'gridview') {
                $accion = 'sub';
            } else if ($accion == 'upload') {
                $accion = 'create';
            } else if ($accion == 'quitar') {
                $accion = 'delete';
            } else if ($accion == 'clonar') {
                $accion = 'create';
            } else if ($accion == 'change' || strtolower($accion) == 'numelemlistado') {
                $accion = 'index';
            } else if ($accion == 'updateAjax') {
                $accion = 'update';
            } else if ($accion == 'move') {
                $accion = 'update';
            } else if ($accion == 'loginas' || $accion == 'LoginAs') {
                $accion = 'update';
            }else if ($accion == 'activalote' || $accion == 'ActivaLote') {
                $accion = 'update';
            }else if ($accion == 'exportar' || $accion == 'Exportar') {
                $accion = 'update';
            }

            $nombreModelo = $filterChain->controller->getModelName();

            $tmpModelo = new $nombreModelo();

            $misMetaDatos = $tmpModelo->retornaMetaData();

            $modelo = $nombreModelo;


            $filtros = array('Modelo' => $modelo);
            $modulos = Modulo::model()->findAllByAttributes($filtros);

            $idModulo = 0;
            $this->_maxPorPagina = 10;
            foreach ($modulos as $mod) {
                $idModulo = $mod->idNTC_Modulo;
                $this->_maxPorPagina = $mod->MaxPorPagina;
            }

            if (Yii::app()->user->compruebaAccesoAccion($idModulo, $accion)) {
                $filterChain->run();
            } else {
                if (Yii::app()->request->isAjaxRequest) {
                    Yii::app()->end();
                } else {
                    Yii::app()->request->redirect($url);
                }
            }
        } else {
            if (Yii::app()->request->isAjaxRequest) {
                Yii::app()->end();
            } else {
                Yii::app()->request->redirect($url);
            }
        }
    }

    /**
     * Especifica las reglas de control de acceso.
     * Este método se usa por el filtro 'accessControl'
     * @return array Reglas de control de acceso
     */
    public function accessRules() {
        return array(
            array('allow', // Permite a los usuarios registrados ejecutar las acciones 'create' y 'update'
                'actions' => array('create', 'update', 'index', 'view'),
                'users' => array('@'),
            ),
            array('allow', // Permite a los administradores ejecutar las acciones 'admin' y 'delete'
                'actions' => array('admin', 'delete'),
                'users' => array('admin'),
            ),
            array('deny', // Deniega a todos los usuarios
                'users' => array('*'),
            ),
        );
    }

    /**
     * Muestra la instancia de un modelo.
     * @param integer $id Identificador del modelo a mostrar
     */
    public function actionView($id) {
        $model = $this->loadModel($id);
        $metadatos = $model->retornaMetaData(1);
        $metadatosArr = $model->retornaMetaData();

        $campos = $model->visibilidad('view', true, Yii::app()->sourceLanguage);

        //IDIOMA

        if (Yii::app()->sourceLanguage != Yii::app()->getLanguage()) {
            $traduccionMultiple = Modulo::model()->findByAttributes(array('Modelo' => $model->modelName))->TraduccionMultiple;
            $arrIdiomas = array();
            if ($traduccionMultiple == 1) {
                $idiomas = Idioma::model()->findAllByAttributes(array("Quitar" => 0));
                foreach ($idiomas as $idioma) {
                    if ($idioma->getPkValue() != Yii::app()->sourceLanguage)
                        $arrIdiomas[] = $idioma->getPkValue();
                }
            }
            else {
                $arrIdiomas[] = Yii::app()->getLanguage();
            }
        }

        $arrTraduccion = array();

        if ($arrIdiomas)
            foreach ($arrIdiomas as $idioma) {
                if ($model->esTraducible && $idioma != Yii::app()->sourceLanguage) {

                    Yii::app()->clientScript->registerCssFile(
                            Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('zii.widgets.assets')) . '/detailview/styles.css');
                    $atributosIdioma = array();
                    $camposIdioma = $model->visibilidad('view', true, $idioma);
                    foreach ($camposIdioma as $campo => $valor) {
                        $mismetadatos = $metadatos;

                        if (!isset($metadatos->tableSchema->columns[$campo])) {
                            $mismetadatos = $metadatosExtra;
                        }

                        $dbType = $mismetadatos->tableSchema->columns[$campo]->dbType;
                        $dbType = $this->_obtieneTipoCampo($dbType);

                        if (strpos($dbType, "char") === false &&
                                strpos($dbType, "text") === false) {
                            $camposIdioma[$campo] = Yii::t("tablaVista", "No traducible");
                        }
                    }
                    $arrTraduccion[$idioma] = array("camposIdioma" => $camposIdioma);
                }
            }

        if ($arrTraduccion)
            $arrTraduccion["idiomas"] = $arrIdiomas;

        $this->obtieneSublistados($model);

        $this->menu = $model->accionesIntranetModelo($this->getModuleName($model->getModelName()), array('create', 'update', 'delete'));

        if ($_GET["return"] != "" &&
                $_GET["modRet"] != "" &&
                $_GET["keyRet"] != "") {
            $_SESSION["return"] = $_GET["return"];
            $_SESSION["modRet"] = $_GET["modRet"];
            $_SESSION["keyRet"] = $_GET["keyRet"];
        }

        if ($_SESSION["return"] != "") {
            //Tratamiento de la url. REVISAR EN PRODUCCION
            $urlVolver = str_replace("\\", "/", $_SESSION["return"] . "?mod=" . $_SESSION["modRet"] . "&key=" . $_SESSION["keyRet"] . "#contiene_sublistado");
            $urlVolver = str_replace("http://", "", $urlVolver);
            $arrayUrl = explode("/", $urlVolver);
            $arrayUrl[0] = "";
            $urlVolver = implode("/", $arrayUrl);
            $urlVolver = str_replace(Yii::app()->getBaseUrl(), "", $urlVolver);

            array_push($this->menu, array(
                "linkOptions" => array('class' => 'btnAccionesSobrelistado'),
                "label" => "Volver",
                "url" => array($urlVolver),
            ));

            unset($_SESSION["return"]);
            unset($_SESSION["modRet"]);
            unset($_SESSION["keyRet"]);
        }

        $this->pageTitle = 'Ver ' . $this->getModuleName($model->getModelName()) . ' #' . $model->getPkValue() . '#';

        $parametrosVista = array('model' => $this->loadModel($id));

        $this->obtieneFotoPerfil($parametrosVista, $model);

        //Scripts para el uso de codemirror
        $this->registrarScriptsCodeMirror();

        $this->registrarScriptQuitarChecksBonitos();

        $etiquetas = $model->attributeLabels();
        $atributos = array();



        foreach ($campos as $campo => $valor) {

            if ($campo == "id" . Yii::app()->params["prefijoTablasBd"] . "Video")
                $hayVideo = true;

            $etiqueta = isset($etiquetas[$campo]) ? $etiquetas[$campo] : (isset($etiquetasExtra[$campo]) ? $etiquetasExtra[$campo] : $campo);
            $mismetadatos = $metadatos;

            if (!isset($metadatos->tableSchema->columns[$campo])) {
                $mismetadatos = $metadatosExtra;
            }

            // 			Yii::log("Metadatos campo $campo: ".print_r($mismetadatos->tableSchema->columns[$campo],1));

            $dbType = $mismetadatos->tableSchema->columns[$campo]->dbType;
            $dbType = $this->_obtieneTipoCampo($dbType);

            switch ($dbType) {
                case "integer":
                case "numeric":
                case "bigint":
                    if (strtolower($campo) == 'quitar') {
                        array_push($atributos, array('label' => $etiqueta,
                            'type' => 'raw',
                            'value' => CHtml::checkBox($campo, (($valor == 1) ? true : false)),
                        ));
                    } else if ($model->getModelName() == "Form" && strtolower($campo) == "state") {
                        $texto = '';
                        if ($model->$campo == 0) {
                            $texto = 'Pendiente';
                        } else if ($model->$campo == 1) {
                            $texto = 'Publicado';
                        } else if ($model->$campo == 2) {
                            $texto = 'Terminado';
                        }
                        array_push($atributos, array('label' => $etiqueta, 'type' => 'raw', 'value' => ($texto == "") ? null : $texto));
                    } else {
                        //TODO Ojo con las claves primarias a la hora de ver un modelo
                       
                        if (empty($mismetadatos->tableSchema->columns[$campo]->isPrimaryKey)) {
                            if ($mismetadatos->tableSchema->columns[$campo]->isForeignKey == 1) {
                                //Yii::log("Campo: ".print_r($mismetadatos->tableSchema->columns[$campo],1));
                            }

                            array_push($atributos, array('label' => $etiqueta, 'type' => 'raw', 'value' => $valor, 'urlClaveAjena' => $urlClaveAjena));
                        }
                    }
                    break;
                case 'boolean':
                    if ($valor == '') {
                        $valor = 0;
                    }
                    switch (strtolower($campo)) {
                        case "sexo":
                            $arrValores = array(1 => "Hombre", 0 => "Mujer");

                            array_push($atributos, array('label' => $etiqueta,
                                'type' => 'raw',
                                'value' => $arrValores[$valor]
                            ));

                            break;
                        default:
                            array_push($atributos, array('label' => $etiqueta,
                                'type' => 'raw',
                                'value' => CHtml::checkBox($campo, (($valor == 1) ? true : false), array('readonly' => true)),
                            ));
                    }
                    break;

                case 'date':
                case 'datetime':
                case 'timestamp':
                    if (preg_match('/^\d{4}-\d{1,2}-\d{1,2} \d{1,2}:\d{1,2}:\d{1,2}$/', $valor)) {
                        list($fecha, $hora) = explode(' ', $valor);
                        list($anyo, $mes, $dia) = explode("-", $fecha);

                        $valor = $dia . "/" . $mes . "/" . $anyo . " " . $hora;
                    }
                    array_push($atributos, array('label' => $etiqueta, 'type' => 'raw', 'value' => ($valor == "") ? null : $valor));
                    break;
                default:
                    array_push($atributos, array('label' => $etiqueta, 'type' => 'raw', 'value' => ($valor == "") ? null : $valor));
            }
        }

        $parametrosVista["atributos"] = $atributos;
        $parametrosVista["campos"] = $campos;
        $parametrosVista["arrTraduccion"] = $arrTraduccion;

        $ficheroObj = new Fichero();

        foreach ($ficheroObj->tableSchema->foreignKeys as $nombreClave => $valorClave) {
            // 			Yii::log('clave relacion ficheros: '.$nombreClave.' => '.print_r($valorClave,1));
            $tabla = $valorClave[0];
            $pk = $valorClave[1];
            //			if($nombreClave == $model->tableSchema->primaryKey){
            if ($pk == $model->tableSchema->primaryKey) {
                $parametrosVista["ficheros"] = $ficheroObj->findAllByAttributes(array($nombreClave => $model->primaryKey, "Quitar" => 0));

                $tipoFicheroObj = new TipoFichero();
                $parametrosVista["tipoFicheros"] = $tipoFicheroObj->findAllByAttributes(array("Tabla" => $model->tableSchema->name));
            }
        }

        if ($hayVideo)
            $parametrosVista["idVideo"] = $model->idNTC_Video;

        //TODO: ver si cambiar esto llamando a una acción similar a indexAjax del modelo
        if (Yii::app()->request->isAjaxRequest) {
            $this->renderPartial(
                    '/intranet/view', $parametrosVista, false, true
            );
            $this->renderPartial(
                    '/intranet/_sublistados', $parametrosVista, false, true
            );
        } else {
            /*
              Yii::app()->clientScript->registerScript(
              'checks','
              var ajaxGenerar;
              function generarVariantes(boton){
              var idArticulo = $(boton).attr("idarticulo");
              if(idArticulo != ""){
              if(ajaxGenerar)
              ajaxGenerar.abort();

              $(".mensaje-generar").removeClass("error").removeClass("success").text("'.Yii::t("intranet", "Generando variantes ...").'");
              ajaxGenerar = $.ajax({
              type: "POST",
              url: "'.$this->createUrl('/Articulo/GenerarVariantes').'",
              data: {idArticulo: idArticulo},
              success: function(data){
              respuesta = data.split("###");
              respuesta[0].replace(/\s+ /g, " ");
              if(respuesta[0] == "OK"){
              $(".mensaje-generar").addClass("success").text("'.Yii::t("intranet", "Variantes generadas correctamente").'");
              }
              else{
              $(".mensaje-generar").addClass("error").text("'.Yii::t("intranet", "Ha habido un error al generar las variantes").'");
              }
              },
              error: function(){
              $(".mensaje-generar").addClass("error").text("'.Yii::t("intranet", "Ha habido un error al generar las variantes").'");
              }
              })
              }
              }
              ',CClientScript::POS_END); */

            $this->render(
                    '/intranet/view', $parametrosVista
            );
        }
    }

    /**
     * Crea un nuevo modelo.
     * Si se ha creado con éxito, redirige a la página 'view'.
     */
    public function actionCreate() {
        $model = new $this->modelName();

        // Descomentar la siguiente linea si se desea validacion por AJAX
        // $this->performAjaxValidation($model);
        if (isset($_POST[$this->modelName])) {
            // LLAMADA A setAttributes con 3er parametro para que no compruebe si
            // el las propiedades estan en base de datos
            $model->setAttributes($_POST[$this->modelName], false, false);

            $continuar = true;
            $pq = 0;
            // SI HAY ERROR EN LA VALIDACION DEL MODELO NO CONTINUAMOS
            if (!$model->save()) {
                $continuar = false;
                $pq = 1;
            }

            if ($continuar) {
                if (Yii::app()->params["redireccionarAlPadre"] &&
                        $_GET["return"] != "" &&
                        $_GET["modRet"] != "" &&
                        $_GET["keyRet"] != "")
                    $this->redirect(str_replace("\\", "/", $_GET["return"] . "?mod=" . $_GET["modRet"] . "&key=" . $_GET["keyRet"] . "#contiene_sublistado"));
                else {
                    if ($_GET["return"] != "" &&
                            $_GET["modRet"] != "" &&
                            $_GET["keyRet"] != "") {
                        $_SESSION["return"] = $_GET["return"];
                        $_SESSION["modRet"] = $_GET["modRet"];
                        $_SESSION["keyRet"] = $_GET["keyRet"];
                    }
                    $this->redirect(array('view', 'id' => $model->getPkValue()));
                }
            }
        }

        $campos = $model->visibilidad('create');

        //Scripts para el uso de codemirror
        $this->registrarScriptsCodeMirror();


        $metadatos = $model->retornaMetaData(1);

        if ($model->modelName == "ArticuloColor") {
            Yii::app()->clientScript->registerScript(
                    'diarioProductos', '$("select[name*=\'fkNTC_Articulo\']").each(function(){
					$(this).on("change", function(event){
						var campo = $("select[name*=\'fkNTC_OpcionAtributo\']")
						$.ajax({
							type: "GET",
							dataType: "html",
							url: "' . Yii::app()->createAbsoluteUrl('/Articulo/getColores') . '/?id="+$(this).val(),
							success: function(data){
								campo.html($(data).children("option"));
							}
						});
					})
				});
				
				$("select[name*=\'fkNTC_OpcionAtributo\'] option[value!=\"\"]").remove();
			', CClientScript::POS_READY);
        }

        $this->render('/intranet/update', array(
            'model' => $model,
            'campos' => $campos,
            'metadatos' => $metadatos,
        ));
    }

    /**
     * Actualiza un modelo
     * Si se ha actualizado con éxito, redirige a la página 'view'
     * @param integer $id Identificador del modelo a actualizar
     */
    public function actionUpdate($id) {
        //Yii::log("GET: ".print_r($_GET,1));
        $modelName = $this->modelName;
        $model = $modelName::model()->findByPk($id);

        $metadatos = $model->retornaMetaData(1);

        // Descomentar la siguiente linea si se desea validacion por AJAX
        // $this->performAjaxValidation($model);
        if (isset($_POST[$this->modelName])) {
            if (isset($_POST[$this->modelName]["traduccion"])) {
                foreach ($_POST[$this->modelName]["traduccion"] as $idTraduccion => $textoTraduccion) {
                    $_POST["traduccion"][$idTraduccion] = $textoTraduccion;
                }
                unset($_POST[$this->modelName]["traduccion"]);
            }
            $atributesPOST = $_POST[$this->modelName];

            if ($model->hasAttribute("Habilitado") &&
                    $model->hasAttribute("FechaBaja") &&
                    $model->Habilitado == 1)
                $habilitado = 1;


            $model->setAttributes($atributesPOST, false, false);
            $atributesModel = $model->getAttributes(true, Yii::app()->sourceLanguage);

            if ($habilitado == 1 &&
                    $model->getAttribute("Habilitado") == 0)
                $model->FechaBaja = date("d/m/Y H:i:s");

            //echo "VALIDO " . $model->validate();

            if ($_POST["traduccion"])
                foreach ($_POST["traduccion"] as $claveTraduccion => $traduccion) {

                    $traduccionModelo = TraduccionModelo::model()->findByPk($claveTraduccion);
                    $traduccionModelo->Traduccion = $traduccion;
                    $traduccionModelo->save();
                }

            // SI NO PASO EL ARRAY SE LLAMA AL GET ATTRIBUTES DEL GENERIC MODEL Y ESTE TE DEVUELVE LOS VALORES
            // DE LA TRADUCCION EN LUGAR DE LOS VALORES DEL MODELO
            //echo "<pre>".print_r($model,1)."</pre>";
            //echo "<pre>".print_r($_POST[$this->modelName],1)."</pre>";

            if ($model->save()) {
                if (Yii::app()->params["redireccionarAlPadre"] &&
                        $_GET["return"] != "" &&
                        $_GET["modRet"] != "" &&
                        $_GET["keyRet"] != "")
                    $this->redirect(str_replace("\\", "/", $_GET["return"] . "?mod=" . $_GET["modRet"] . "&key=" . $_GET["keyRet"] . "#contiene_sublistado"));
                else {
                    if ($_GET["return"] != "" &&
                            $_GET["modRet"] != "" &&
                            $_GET["keyRet"] != "") {
                        $_SESSION["return"] = $_GET["return"];
                        $_SESSION["modRet"] = $_GET["modRet"];
                        $_SESSION["keyRet"] = $_GET["keyRet"];
                    }
                    $this->redirect(array('view', 'id' => $model->getPkValue()));
                }
            } else {
                Yii::log("ERROR DE VALIDACIÓN:  " . print_r($model->getErrors(), 1));
                //Yii::app()->end();
            }
        }

        $this->pageTitle = 'Modificando ' . $model->getModelName() . '  #' . $model->getPkValue() . '#';
        $campos = $model->visibilidad('update');

        $camposView = $model->visibilidad('view');

        //IDIOMA
        if (Yii::app()->sourceLanguage != Yii::app()->getLanguage()) {
            $traduccionMultiple = Modulo::model()->findByAttributes(array('Modelo' => $model->modelName))->TraduccionMultiple;
            $arrIdiomas = array();
            if ($traduccionMultiple == 1) {
                $idiomas = Idioma::model()->findAllByAttributes(array("Quitar" => 0));
                foreach ($idiomas as $idioma) {
                    if ($idioma->getPkValue() != Yii::app()->sourceLanguage)
                        $arrIdiomas[] = $idioma->getPkValue();
                }
            }
            else {
                $arrIdiomas[] = Yii::app()->getLanguage();
            }
        }

        $arrTraduccion = array();

        if ($arrIdiomas)
            foreach ($arrIdiomas as $idioma) {
                if ($model->esTraducible && $idioma != Yii::app()->sourceLanguage) {
                    $camposIdioma = $model->visibilidad('view', true, $idioma);
                    $idsTraducciones = array();
                    foreach ($camposIdioma as $campo => $valor) {
                        $mismetadatos = $metadatos;

                        if (!isset($metadatos->tableSchema->columns[$campo])) {
                            $mismetadatos = $metadatosExtra;
                        }

                        $dbType = $mismetadatos->tableSchema->columns[$campo]->dbType;
                        $dbType = $this->_obtieneTipoCampo($dbType);

                        if (strpos($dbType, "char") !== false ||
                                strpos($dbType, "text") !== false) {

                            $traduccionModelo = TraduccionModelo::model()->findByAttributes(array("fkNTC_Idioma" => $idioma,
                                "Modelo" => $model->modelName,
                                "idModelo" => $model->getPkValue(),
                                "Campo" => $campo));
                            if ($traduccionModelo)
                                $idsTraducciones[$campo] = $traduccionModelo->getPkValue();
                            else {
                                $model->getAttribute($campo, $idioma);
                                $idsTraducciones[$campo] = TraduccionModelo::model()->findByAttributes(array("fkNTC_Idioma" => $idioma,
                                            "Modelo" => $model->modelName,
                                            "idModelo" => $model->getPkValue(),
                                            "Campo" => $campo))->getPkValue();
                            }
                        }
                    }
                    $arrTraduccion[$idioma] = array("camposIdioma" => $camposIdioma, "idsTraducciones" => $idsTraducciones);
                }
            }

        if ($arrTraduccion)
            $arrTraduccion["idiomas"] = $arrIdiomas;

        if (sizeof($arrTraduccion["idiomas"]) > 1) {
            Yii::app()->clientScript->registerScript(
                    'multiIdioma', '						
					var anchoFila = 280+(355*' . (sizeof($arrTraduccion["idiomas"]) + 1) . ');
					
					$(".filaTraduccion.row").width(anchoFila);
				', CClientScript::POS_READY);
        }

        //Scripts para el uso de codemirror
        $this->registrarScriptsCodeMirror();

        if ($model->modelName == "ArticuloColor") {
            Yii::app()->clientScript->registerScript(
                    'diarioProductos', '$("select[name*=\'fkNTC_Articulo\']").each(function(){
					$(this).on("change", function(event){
						var campo = $("select[name*=\'fkNTC_OpcionAtributo\']")
						$.ajax({
							type: "GET",
							dataType: "html",
							url: "' . Yii::app()->createAbsoluteUrl('/Articulo/getColores') . '/?id="+$(this).val(),
							success: function(data){
								campo.html($(data).children("option"));
							}
						});
					})
				});

				var campo = $("select[name*=\'fkNTC_OpcionAtributo\']")
				$.ajax({
					type: "GET",
					dataType: "html",
					url: "' . Yii::app()->createAbsoluteUrl('/Articulo/getColores') . '/?id="+$("select[name*=\'fkNTC_Articulo\'] option[selected]").val(),
					success: function(data){
						campo.html($(data).children("option"));
					}
				});
				
		
				$("select[name*=\'fkNTC_OpcionAtributo\'] option[value!=\"\"]").remove();
			', CClientScript::POS_READY);
        }

        //*************************************************************

        $metadatos = $model->retornaMetaData(1);
        $this->render('/intranet/update', array(
            'model' => $model,
            'campos' => $campos,
            'camposView' => $camposView,
            'metadatos' => $metadatos,
            'arrTraduccion' => $arrTraduccion,
        ));
    }

    /**
     * Elimina un modelo.
     * Si se ha eliminado con éxito, redirige a la página 'admin'
     * @param integer $id Identificador del modelo a eliminar
     */
    public function actionDelete($id) {
        $modeln = new $this->modelName();
        // devuelve en $model pais buscado ( asi podemos usar los metodos update, delete, etc..
        $model = $modeln::model()->findByPk($id);
        $model->delete();

        // Si es una petición AJAX (lanzada por el boton de borrado de grid view del panel de
        // administración), no redirige
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('index'));
    }

    /**
     * Lista todos los modelos
     */
    public function actionIndex() {

        $mod = $this->mod;

        $model = new $this->modelName();

        if ($model->unaLinea) {
            if ($model->hasAttribute("Quitar")) {
                $id = $model->findByAttributes(array("Quitar" => 0))->getPkValue();
            } else {
                $id = $model->findByAttributes(array())->getPkValue();
            }

            $this->redirect(Yii::app()->createAbsoluteUrl($model->getModelName() . '/view') . '/' . $id);
        }

        $orden = '';

        if ($mod != "") {
            $modulo = Modulo::model()->findByAttributes(array("id" . F::miApp() . "Modulo" => $mod, "Quitar" => 0));
            if ($modulo)
                $orden = $modulo->Ordenacion;

            if ($orden == "" && $model->hasAttribute('Orden')) {
                $orden = "Orden ASC";
            }
        }

        $numRegistros = -1;

        $camposBusqueda = $model->visibilidad('search', false, "", $mod);

        $campos = $model->visibilidad('index', false, "", $mod);


        if ($modulo->Sql != "") {
            $sql = $modulo->Sql;
            $whereSql = "";

            if ($_GET["ajax"] == "buscador_listado") {
                if ($_GET[$model->getModelName()]) {
                    foreach ($_GET[$model->getModelName()] as $nombreCampo => $valorCampo) {
                        if ($valorCampo != "") {
                            if (strpos($nombreCampo, "fk" . F::miApp()) !== false)
                                $whereSql .= " AND " . F::miApp() . $model->getModelName() . "." . $nombreCampo . " = '" . $valorCampo . "' ";
                            else
                                $whereSql .= " AND " . F::miApp() . $model->getModelName() . "." . $nombreCampo . " LIKE '%" . $valorCampo . "%' ";
                        }
                    }
                }
            }
            $sql = str_replace("{where}", $whereSql, $sql);

            $resSQL = Yii::app()->db->createCommand($sql)->queryAll();

            if ($resSQL) {
                $camposTemp = array();
                foreach ($resSQL[0] as $campo => $valor) {
                    if (!array_key_exists($campo, $campos)) {
                        $campos[$campo] = 0;
                        $camposTemp[$campo] = 0;
                    } else {
                        $camposTemp[$campo] = $campos[$campo];
                    }
                }
                $campos = $camposTemp;
            }

            $search["numRegistros"] = sizeof($resSQL);
            $search["retorno"] = $resSQL;
        } else {
            
            $filtro = array();
            if ($model->hasAttribute('Quitar')) {
                $filtro['Quitar'] = 0;
            }            
            
            $search = $model->search($filtro, "", false, $orden);
           
        }
        
        $campos = array_merge(array("[html]Link" => 0), $campos);

        $urlDetalle = Yii::app()->createAbsoluteUrl("/" . $this->modelName);
        if ($this->mod != "")
            $urlDetalle .= "/mod_" . $this->mod;

        $parametrosGet = "";
        if ($_GET[$model->modelName]) {
            foreach ($_GET[$model->modelName] as $paramGet => $valorGet) {
                if ($valorGet != "") {
                    if ($parametrosGet == "")
                        $parametrosGet = "?";
                    else
                        $parametrosGet .= "&";

                    $parametrosGet .= $model->modelName . "[" . $paramGet . "]=" . $valorGet;
                }
            }
        }
        
        if ($search["retorno"]) {
            foreach ($search["retorno"] as &$fila) {

                if (is_object($fila)) {
                    $idValue = $fila->primaryKey;
                    $fila = $fila->attributes;
                } else {
                    $idValue = $fila[$model->getPkName()];
                }

                $fila = array_merge(array("[html]Link" => "<a class=\"boton fondo-azul\" href=\"" . $urlDetalle . "/" . $idValue . $parametrosGet . "\">Ver</a>"), $fila);
            }
        }

        $headers = array_keys($campos);

//
        $dataProviderParams = array();

        if (isset($search["numRegistros"])) {
            $numRegistros = $search["numRegistros"];
            $search = $search["retorno"];
            $dataProviderParams['totalItemCount'] = $numRegistros;
        }
        $csort = new CSort();
        $order = array();
        foreach ($headers as $atributo) {
            $order[$atributo] = array("ASC" => $atributo . " ASC", "DESC" => $atributo . " DESC");
        }
        $csort->attributes = $order;


        $dataProviderParams = array_merge($dataProviderParams, array(
            'keyField' => $model->getPkname(),
            'id' => $model->getPkname(),
            'sort' => $csort,
            'pagination' => array(
                'pageSize' => $this->_maxPorPagina,
            ),
        ));


        $dataProvider = new CArrayDataProvider(
                $search, $dataProviderParams
        );

        $this->registrarScriptSearch();

        $this->registrarScriptQuitarChecksBonitos();

        Yii::app()->clientScript->registerScript(
                'introCabeceraBuscador', '
			function introBuscar(){
				$("#buscador_listado input[type=text]").each(function(){
					$(this).keypress(function(event) {
						if(event.keyCode == 13)
							$("#mibotonbuscador").click();
					})
				})
			}
		', CClientScript::POS_END);
        Yii::app()->clientScript->registerScript(
                'introCabeceraBuscadorReady', '
			introBuscar();
		', CClientScript::POS_END);

        /**
         * Buscamos si alguno de los campos son fk y en tal caso lo montamos para que
         * muestre el nombre
         */
        $this->formateaHeaders($model, $headers, $campos, true);

        if ($mod != "") {
            Yii::app()->clientScript->registerScript(
                    'elementosPaginacion', '
				$(".elemPorPagina span").click(function(){
					var numElem = $(this).attr("val");
					var parametrosAjax = {
							"url": "' . Yii::app()->getBaseUrl(true) . "/" . $model->getModelName() . '/numElemListado",
							"data":"mod=' . $mod . '&val="+numElem,
							"success":function(data){
								if(data == "OK")
									window.location = "";
								else
									alert("No se ha podido cambiar la paginación");
							}
					};
					$.ajax(parametrosAjax);
				})
			', CClientScript::POS_READY);
        }
        $accion = Modulo::model()->findByAttributes(array(idNTC_Modulo => $mod));
        
        if ($accion->Csv == 1) {
            $urlExportar = Yii::app()->createUrl("/" . $model->getModelName());

            if ($mod != "")
                $urlExportar .= "/mod_" . $mod;

            $urlExportar .= "/exportar";
        }
        
        
        $this->render(
                '/intranet/listado', array(
            'urlExportar' => $urlExportar,
            'dataProvider' => $dataProvider,
            'headers' => $headers,
            'model' => $model,
            'campos' => $campos,
            'camposBusqueda' => $camposBusqueda,
            'modelName' => $this->modelName,
            'numRegistros' => $numRegistros,
            'maxPorPagina' => $this->_maxPorPagina,
                )
        );
    }

    public function actionNumElemListado() {
        $modulo = $_GET["mod"];
        $numPagina = $_GET["val"];
        $modSave = false;
        if ($modulo != "" &&
                $numPagina != "" &&
                $numPagina > 0) {
            $mod = Modulo::model()->findByPk($modulo);
            if ($mod) {
                $mod->MaxPorPagina = $numPagina;
                if ($mod->save())
                    $modSave = true;
            }
        }
        if ($modSave)
            echo "OK";
        else
            echo "KO";
    }

    /**
     * Lista todos los modelos pero para usarlo con ajax, podemos solicitar el listado de un modelo pero aplicando un filtro por columna y valor
     * @param $col Columna para filtrar
     * @param $val Valor por el que filtrar
     * @param $filtroCond FiltroCondicion vale para añadir filtros del tipo A=B
     */
    public function actionIndexAjax($col = "", $val = "", $filtroCond = "", $model = "") {
        $mod = $this->mod;
        // 		Yii::log('indexAjax');
        if ($model == "")
            $model = new $this->modelName();
        else
            $model = new $model();

        $modelExtra = null;
        $numRegistros = -1;

        $camposBusqueda = $model->visibilidad('search');

        $campos = $model->visibilidad('index');
        // 				Yii::log("CAMPOS: ".print_r($campos,1));
        // 				Yii::log("CAMPOS: ".print_r(in_array("idNTC_Video", $campos),1));
        if (array_key_exists("idNTC_Video", $campos)) {
            array_unshift($campos, "LinkDetalle");
        }

        $headers = array_keys($campos);

// 		$filtro = array();
        $criteria = new CDbCriteria();
        if ($col != "" && $val != "") {
            $columnas = explode(',', $col);
            $conditions = array();

            foreach ($columnas as $columna) {
                if (strpos($val, 'IN') !== false) {
                    $valores = explode(',', str_replace(')', '', str_replace('IN(', '', $val)));
                    $criteria->addInCondition($columna, $valores);
                } else {
                    $criteria->compare(trim($columna), $val, false, 'OR');
                }
            }
// 			$filtro = array($col=>$val);
        }

        /**
         * FiltroCond, es el filtro que está en las relaciones
         * solo lo pasamos como parámetro cuando se hace esta llamada
         * por AJAX desde los sublistados.
         *
         */
        if ($filtroCond != '') {
            $criteria->addCondition($filtroCond);
        }

        if ($model->hasAttribute("Orden"))
            $criteria->order = "Orden ASC";

// 		$search = $model->search($filtro, $filtroCond);

        $search = $model->findAll($criteria);

        $campos = array_merge(array("[html]Link" => 0), $campos);

        $urlDetalle = Yii::app()->createAbsoluteUrl("/" . $this->modelName);
        if ($this->mod != "")
            $urlDetalle .= "/mod_" . $this->mod;

        $arrReferrer = explode("?", $_SERVER["HTTP_REFERER"]);
        $parametrosGet = "?return=" . $arrReferrer[0] . "&modRet=" . $model->modelName . "&keyRet=" . $col;

        $model->modelName;

        if ($search)
            foreach ($search as &$fila) {

                if (is_object($fila))
                    $fila = $fila->getAttributes();
                $fila = array_merge(array("[html]Link" => "<a class=\"boton fondo-azul\" href=\"" . $urlDetalle . "/" . $fila[$model->getPkName()] . $parametrosGet . "\">Ver</a>"), $fila);
            }

        $headers = array_keys($campos);

        Yii::log("SEARCH: " . print_r($search, 1));
        // 		Yii::app()->end();
        $dataProviderParams = array();


        $numRegistros = count($search);
        $dataProviderParams['totalItemCount'] = $numRegistros;

        $csort = new CSort();
        $order = array();
        foreach ($headers as $atributo) {
            $order[$atributo] = array("ASC" => $atributo . " ASC", "DESC" => $atributo . " DESC");
        }
        $csort->attributes = $order;

        $dataProviderParams = array_merge(
                $dataProviderParams, array(
            'keyField' => $model->getPkname(),
            'id' => $model->getPkname(),
            'sort' => $csort,
            'pagination' => array(
                'pageSize' => $this->_maxPorPagina,
            ),
        ));

        $dataProvider = new CArrayDataProvider(
                $search, $dataProviderParams
        );

        /**
         * Buscamos si alguno de los campos son fk y en tal caso lo montamos para que
         * muestre el nombre
         */
        $this->formateaHeaders($model, $headers, $campos, false);

        $misMetadatos = $model->retornaMetaData(1);

        $nombreModelo = $misMetadatos->tableSchema->rawName;
        $nombreModelo = str_replace("\"", "", $nombreModelo);

        $this->registrarScriptSearch();
        $this->registrarScriptFancyVideo();

        $this->registrarScriptQuitarChecksBonitos();


        $this->renderPartial(
                '/intranet/listado', array(
            'campoProcedencia' => $col,
            'valorProcedencia' => $val,
            'dataProvider' => $dataProvider,
            'headers' => $headers,
            'model' => $model,
            'modelExtra' => $modelExtra,
            'campos' => $campos,
            'camposBusqueda' => $camposBusqueda,
            'modelName' => $this->modelName,
            'numRegistros' => $numRegistros,
            'maxPorPagina' => $this->_maxPorPagina,
            'esAjax' => true,
            'esSubListado' => true,
            'objetos' => $objetos,
                ), false, true
        );
    }

    /**
     * Gestiona todos los modelos.
     */
    public function actionAdmin() {
        $model = new $this->modelName('search');
        $model->unsetAttributes();  // Elimina cualquier valor por defecto
        if (isset($_GET[$this->modelName]))
            $model->attributes = $_GET[$this->modelName];

        $this->render('admin', array(
            'model' => $model,
        ));
    }

    /**
     * Devuelve los datos del modelo con la clave primera dada por la variable GET.
     * Si los datos del modelo no se encuentran lanza una excepción HTML.
     * @param integer Identificador del modelo a cargar.
     */
    public function loadModel($id) {
        $modelo = new $this->modelName();
        $modeloRetorno = $modelo->findByPk($id);
        if ($modeloRetorno === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $modeloRetorno;
    }

    /**
     * Ejecuta la validación AJAX
     * Performs the AJAX validation.
     * @param CModel Modelo a validar
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'pais-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

    public function obtieneFotoPerfil(&$parametrosVista, $model) {
        
    }

    public function obtieneSublistados($model) {
        Yii::log('MODEL: ' . print_r($model->attributes, 1));
        $this->registrarScriptSublistado($model);
        $this->registrarScriptFotosPerfil($model);


        if ($this->sublistados == null) {
            $this->sublistados = array();
        }

        $modelName = $model->getModelName();

        $relaciones = $model->relations();


        $subModulos = array();

        //TODO: OJO! Al borrar (Quitar) un módulo no se están borrando (quitando) sus acciones.
        //Por lo que las acciones de un modulo borrado pueden afecta a uno nuevo sobre el mismo modelo
        $modulosDeSub = Accion::model()->findAllByAttributes(array('Nombre' => 'sub', 'Quitar' => 0));

        foreach ($modulosDeSub as $modulo) {
            array_push($subModulos, $modulo->fkNTC_Modulo);
        }
        //Yii::log('MODULOS DE SUB: '.print_r($subModulos,1));
        $relationLabels = $model->relationLabels();

// 		Yii::log('RELACIONES: '.print_r($relationLabels,1));
        foreach ($relaciones as $key => $relacion) {
// 			Yii::log('key '.$key);
            if (array_search($key, array_keys($relationLabels), true) !== false) {
                $miOn = "";

                if (isset($relacion["on"])) {
                    $miOn = str_replace("\"", "\\\"", $relacion["on"]);
                }
// 				Yii::log("Relacion: ".print_r($relacion,1));
                switch ($relacion[0]) {
                    case "CHasManyRelation":
                        //Yii::log("HAS-MANY");
                        $modelTmp = new $relacion[1]();
                        $metadata = $modelTmp->retornaMetaData();
                        $modelo = $metadata['name'];
                        $modelo = str_replace(Yii::app()->params['prefijoTablasBd'], '', $modelo);
                        $modelo = str_replace("_", '', $modelo);
                        $modulo = Modulo::model()->findAllByAttributes(array('Modelo' => $modelo));

                        if (count($modulo) > 0) {
                            //Yii::log('modulo: '.print_r($modulo[0],1));
                            if (in_array($modulo[0]->idNTC_Modulo, $subModulos)) {

                                // Comprobar permisos VIEW del modulo
                                $acciones = $modulo[0]->accions(array('condition' => 'Quitar=false AND Nombre="view" AND fkNTC_Rol=' . Yii::app()->user->usuario->fkNTC_Rol));
                                // 							Yii::log('1:M acciones: '.print_r($acciones,1));
                                if (sizeof($acciones) > 0) {
                                    if (!isset($relacion['through'])) {
                                        //Yii::log("RELACION SIN THROUGH: ".print_r($relacion,1));
                                        array_push(
                                                $this->sublistados, array(
                                            'linkOptions' => array('class' => 'btnAccionesSobrelistado'),
                                            'label' => ucfirst($model->getRelationLabel($key)),
                                            'url' => 'javascript: mostrarSubListado("' . $this->createUrl("/" . $relacion[1]) . '", "' . $relacion[2] . '", ' . $model->getPkValue() . ', "' . $miOn . '");',
                                                )
                                        );
                                    } else {
                                        //RELACIONES con 'through'
                                        //Yii::log("RELACION CON THROUGH: ".print_r($relacion,1));
                                        $multi = $relacion[2];
                                        $campoMulti = key($multi); // p.ej.fkNTC_Articulo
                                        $campo = $multi[$campoMulti]; //  p.ej.idNTC_Articulo
                                        $relacionMulti = $relacion['through']; // p.ej.ArticuloCategoria
                                        $registrosMulti = $model->$relacionMulti();

                                        $valores = MetodosComunes::activeRecordsToList($registrosMulti, null, $campoMulti);
                                        if (sizeof($registrosMulti) > 0) {
                                            $valores = "' IN(" . implode(",", $valores) . ")'";
                                        } else {
                                            $valores = "' IN(0)'";
                                        }

                                        array_push(
                                                $this->sublistados, array(
                                            'linkOptions' => array('class' => 'btnAccionesSobrelistado'),
                                            'label' => ucfirst($model->getRelationLabel($key)),
                                            'url' => 'javascript: mostrarSubListado("' . $this->createUrl("/" . $relacion[1]) . '", "' . $campo . '", ' . $valores . ', "' . $miOn . '");',
                                                )
                                        );
                                    }
                                    //ESTO ME PERMITE DESPLEGAR UN SUBLISTADO
                                    //PASANDO EL MODULO Y LA CLAVE AJENA
                                    // 								Yii::log("modelo: ".print_r($modelTmp->attributes,1));
                                    // 								Yii::log("mod: ". $_GET['mod']);
                                    // 								Yii::log("key: ". $_GET['key']);
                                    if (isset($_GET['mod'], $_GET['key'])) {
                                        if ($relacion[1] == $_GET['mod'] && $relacion[2] == $_GET['key']) {
                                            Yii::app()->clientScript->registerScript(
                                                    'abrir_sublistado', 'mostrarSubListado("' . $this->createUrl("/" . $relacion[1]) . '", "' . $relacion[2] . '", ' . $model->getPkValue() . ', "' . $miOn . '");', CClientScript::POS_READY
                                            );
                                        }
                                    }
                                }
                            }
                        } else {
                            Yii::log("No hay modulo para el modelo relacionado ($modelo)", 'warning');
                        }


                        break;
                    case "CManyManyRelation":
                        Yii::log("MANY-MANY");
                        $modelTmp = new $relacion[1]();
                        $metadata = $modelTmp->retornaMetaData();
                        $modelo = $metadata['name'];
                        $modelo = str_replace(Yii::app()->params['prefijoTablasBd'], '', $modelo);
                        $modelo = str_replace("_", '', $modelo);
                        //Yii::log("MODELO: ".$modelo);
                        $modulo = Modulo::model()->findAllByAttributes(array('Modelo' => $modelo));
                        if (count($modulo) > 0) {
                            if (in_array($modulo[0]->idNTC_Modulo, $subModulos)) {
                                $acciones = $modulo[0]->accions(array('condition' => 'Quitar=false AND Nombre="view" AND fkNTC_Rol=' . Yii::app()->user->usuario->fkNTC_Rol));
                                // 	Yii::log('M:M acciones: '.print_r($acciones,1));
                                if (sizeof($acciones) > 0) {
                                    array_push(
                                            $this->sublistados, array(
                                        'linkOptions' => array('class' => 'btnAccionesSobrelistado'),
                                        'label' => ucfirst($model->getRelationLabel($key)),
                                        'url' => 'javascript: mostrarSubListado("' . $this->createUrl("/" . $relacion[1]) . '", "' . $relacion[2] . '", ' . $model->getPkValue() . ');',
                                            )
                                    );
                                }
                            }
                        } else {
                            Yii::log("No hay modulo para el modelo relacionado ($modelo)", 'warning');
                        }
                }

                usort($this->sublistados, array('GenericController', 'compararSubListado'));

                // 			function compararSubListado($x, $y){
                // 				return strcmp($x["label"],$y["label"]);
                // 			}
            }
        }
    }

    private function compararSubListado($x, $y) {
        return strcmp($x["label"], $y["label"]);
    }

    /**
     * Registrar los scripts necesarios para usar CodeMirror
     */
    public function registrarScriptsCodeMirror() {
        $cs = Yii::app()->getClientScript();
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/codemirror/lib/codemirror.js');
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/codemirror/mode/javascript/javascript.js');
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/codemirror/mode/css/css.js');
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/codemirror/addon/edit/matchbrackets.js');
        $cs->registerScriptFile(Yii::app()->theme->baseUrl . '/codemirror/addon/edit/closebrackets.js');
        $cs->registerCssFile(Yii::app()->theme->baseUrl . '/codemirror/lib/codemirror.css');
    }

    /**
     * Registra los scripts necesarios para quitar los checks bonitos
     */
    public function registrarScriptQuitarChecksBonitos() {
        $cs = Yii::app()->getClientScript();
        $cs->registerScript(
                "quitar_checks_bonitos", "$(window).on('quitarChecksBonitos', function(){ quitaChecksBonitos(); } );", CClientScript::POS_READY);
    }

    /**
     * Registra los scripts necesarios para la subida de fotos de perfil
     */
    public function registrarScriptFotosPerfil($model) {
        Yii::app()->clientScript->registerScript(
                'fotos_perfil', "
				$('#XUploadForm-form').on('fileuploaddone', function( e, data ){
				//console.log(data);
				//console.log(data.form.serializeArray()[0].value);

				$.post(
				'" . $this->createUrl('/fichero/upload') . "',
				{tipo: data.form.serializeArray()[0].value,
				fichero: data.files[0].name,
				modelId: data.form.serializeArray()[1].value,
				tabla: data.form.serializeArray()[2].value},
				function(postData){
				respuesta = postData.split('#');
				if(respuesta[0] == 'OK')
				{
				$('#buscador_ficheros').html('<img src=\"" . $this->createUrl('/images/ccs_bck_loading.gif') . "\" style=\"display: block;margin: 0 auto;\">');
				$.post(
				'" . $this->createUrl('/fichero/GridView') . "/',
				{nombreCampoTabla: respuesta[1],
				modelId: respuesta[2]},
				function(postData){
				$('#buscador_ficheros').html(postData);
				manejaChecksBonitos();
				window.location = '#XUploadForm-form';
	}
		);
	}
				else
				alert(respuesta[0]);
	}
		);

				/*
				var url = '" . $this->createUrl('/usuarioCommon/cropAjax') . "';
				var params = data.result[0];
					

				var urlCrop = 'urlCrop=" . $this->createUrl('usuarioCommon/CropImagen') . "';
				urlCrop += '&id=" . $model->getPkValue() . "';

				$.get(
				url + '?' + urlCrop,
				params,
				function(data){
				$('#fotos_perfil').html( data );
	});
	});*/
	});
				", CClientScript::POS_READY
        );
    }

    /**
     * Registra los script necesarios para el search
     */
    public function registrarScriptFancyVideo() {
        Yii::app()->clientScript->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.fancybox.pack.js', CClientScript::POS_HEAD);

        $js = <<<EOD
		$(".fancy_video").fancybox({autoDimensions:true });
EOD;

        Yii::app()->clientScript->registerScript('fancy_video', $js, CClientScript::POS_READY);
    }

    /**
     * Registra los script necesarios para el search
     */
    public function registrarScriptSearch() {
        $js = <<<EOD
		jQuery('.search-button').click(function(){
				jQuery('#buscador').toggle();
				return false;
		});
		jQuery('.buscador_listado form').submit(function(){
			var serializado = jQuery(this).serialize();
			jQuery.fn.yiiGridView.update(
				'buscador_listado',
				{
					data: serializado
				}
			);
			return false;
		});
EOD;

        Yii::app()->clientScript->registerScript('search', $js);
    }

    /**
     * Registra los scripts necesarios para que funcionen los sublistados
     */
    public function registrarScriptSublistado($model) {
        Yii::app()->clientScript->registerScript(
                'sublistados', "
				function mostrarSubListado(modelo, campo, valor, filtro){
				$(document).off('click.yiiGridView', '#buscador_listado .items > tbody > tr');
				var cadena  = '<div style=\"text-align:center;\">';
				cadena += '<img src=\"" . Yii::app()->request->baseUrl . "/images/ccs_bck_loading.gif\" border=\"0\" />';
				cadena += '</div>';

				var params = 'col='+campo+'&val='+valor;
				if( typeof(filtro) != 'undefined' && filtro != '')
				{
				params += '&filtroCond='+filtro;
	}
				var url = modelo + '/indexAjax';
					
				$('#contiene_sublistado').html(cadena);
				$.get(
				url,
				params,
				function(data)
				{
				if(data != '')
				{
				$('#contiene_sublistado').html(data);
				manejaChecksBonitos();
	}
				// 				else
				// 				{
				// 				window.location = '" . $this->createurl("site/login") . "';
				// 	}
	}
		);
	}", CClientScript::POS_HEAD);
    }

    /**
     * Modifica el array headers que se le pasará al CDataGridView para que haga uso de las claves ajenas
     *
     * @param Modelo $model
     * @param Array $headers
     * @param Array $campos Array que me indica si los campos del modelo son clave ajena o no
     *
     * @return Modifica sobre el propio headers y lo formatea para que el CDataGridView te muestre las claves ajenas
     */
    public function formateaHeaders($model, &$headers, $campos, $conFiltros = false, $parametrosGet = null) {
        //Yii::beginProfile("metas-datos formateaHeaders");
        $metadatosTmp = Yii::app()->cache->get("metadatosTmp" . $model->getModelName());
        if ($metadatosTmp === false) {
            $metadatosTmp = $model->retornaMetaData(1);
            Yii::app()->cache->set("metadatosTmp" . $model->getModelName(), $metadatosTmp);
        }
        $labelsTmp = Yii::app()->cache->get("labelsTmp" . $model->getModelName());
        if ($labelsTmp === false) {
            $labelsTmp = $model->attributeLabels();
            Yii::app()->cache->set("labelsTmp" . $model->getModelName(), $labelsTmp);
        }
        //Yii::endProfile("metas-datos formateaHeaders");

        foreach ($headers as &$campo) {
            $labels = $labelsTmp;
            $metadatos = $metadatosTmp;

            $label = (isset($labels[$campo]) ? $labels[$campo] : $campo);


            if ($campos[$campo] !== 0) {
                /* Yii::beginProfile("if formateaHeaders");
                  $nombreProfile = "if formateaHeaders ".$campo;
                  Yii::beginProfile($nombreProfile);
                  Yii::beginProfile("if 1 formateaHeaders");
                  Yii::beginProfile("if 1.1 formateaHeaders"); */
                $mmodel = new $campos[$campo];

                $arrFilter = array();
                $filtroModelo = array();
                if ($mmodel->hasAttribute('Quitar')) {
                    $filtroModelo['Quitar'] = 0;
                }

                $noFiltramos = array(
                    'fk' . Yii::app()->params["prefijoTablasBd"] . 'Localidad',
                    'fk' . Yii::app()->params["prefijoTablasBd"] . 'Pais',
                    'fk' . Yii::app()->params["prefijoTablasBd"] . 'TarifaVenta',
                );
                //Yii::endProfile("if 1.1 formateaHeaders");
                //Yii::beginProfile("if 1.2 formateaHeaders");
                if ($conFiltros && !in_array($campo, $noFiltramos)) {
                    //Yii::beginProfile("if 1.2.1 formateaHeaders");
                    //Yii::beginProfile("search formateaHeaders");
                    $filters = Yii::app()->cache->get("searchFormateaHeaders" . $mmodel->getModelName());
                    if ($filters === false) {
                        $filters = $mmodel->search($filtroModelo, '', true, '"' . $mmodel->viewName() . '" ASC'); //BUSQUEDA SIN PAGINADO
                        Yii::app()->cache->set("searchFormateaHeaders" . $mmodel->getModelName(), $filters);
                    }
                    //Yii::endProfile("search formateaHeaders");
                    $filters = $filters['retorno'];
                    //Yii::endProfile("if 1.2.1 formateaHeaders");
                    //Yii::beginProfile("if 1.2.2 formateaHeaders");
                    $modelPkName = $mmodel->getPkname();
                    $modelViewName = $mmodel->viewName();
                    foreach ($filters as $filter) {
                        //Yii::beginProfile("if 1.2.2.1 formateaHeaders");
                        if (isset($filter[$modelPkName], $filter[$modelViewName])) {
                            $ccampo = $filter[$modelPkName];
                            $cvalor = $filter[$modelViewName];

                            $arrFilter[$ccampo] = $cvalor;
                        }
                        //Yii::endProfile("if 1.2.2.1 formateaHeaders");
                    }
                    //Yii::endProfile("if 1.2.2 formateaHeaders");
                } else {
                    $arrFilter = null;
                }
                /* Yii::endProfile("if 1.2 formateaHeaders");
                  Yii::endProfile("if 1 formateaHeaders");
                  Yii::beginProfile("if 2 formateaHeaders"); */
                $nombre = '($data["' . $campo . '"] != "" && ' . $campos[$campo] . '::model()->cache(120)->findByPk($data["' . $campo . '"]))?' . $campos[$campo] . '::model()->cache(120)->findByPk($data["' . $campo . '"])->viewValue():"-";';

                if ($campo == "id" . Yii::app()->params["prefijoTablasBd"] . "Video") {
                    $nombre = '"<div style=\"display:none;\">
					<div style=\"width:640px; height:365px;\" id=\"video_".$data["' . $model->getPkname() . '"]."\">".' . $campos[$campo] . '::model()->findByPk($data["' . $campo . '"])->mostrarReproductor()."</div>
					</div>';
                    $nombre.= '<a href=\"#video_".$data["' . $model->getPkname() . '"]."\" class=\"fancy_video\">".' . $campos[$campo] . '::model()->findByPk($data["' . $campo . '"])->mostrarThumbnail()."</a>"';

                    $campo = array('type' => 'raw', 'name' => $campo, 'value' => $nombre, 'header' => $label, 'filter' => $arrFilter);
                    // 					array_unshift($headers, array('type'=>'raw','name'=>'Ver', 'value'=>'"Quitar"', 'header'=>'Ver', 'filter'=>$arrFilter ));
                } else {
                    $campo = array('name' => $campo, 'value' => $nombre, 'header' => $label, 'filter' => $arrFilter);
                }
                /* Yii::endProfile("if 2 formateaHeaders");
                  Yii::endProfile($nombreProfile);
                  Yii::endProfile("if formateaHeaders"); */
            } else {
                //Yii::beginProfile("else formateaHeaders");
                //Yii::beginProfile("else parte1 formateaHeaders");
                $campoTmp = $campo;
                //$campo = array('name'=>$campo, 'value'=>'(!empty($data["'.$campo.'"]))?$data["' . $campo . '"]:"-";', 'header'=>$label,);

                if ($model->hasAttribute($campo)) {
                    $nombreCampo = "name";
                } else {
                    $nombreCampo = "value";
                }


                $campo = array($nombreCampo => $campo, 'value' => '($data["' . $campo . '"]!="")?$data["' . $campo . '"]:"-";', 'header' => $label,);


                preg_match("#\[(\w+)\]#", $campoTmp, $tipoCampo);
                if ($tipoCampo[1] != "") {
                    $metadatos->tableSchema->columns[$campoTmp] = "";
                    //$metadatos->tableSchema->columns[$campoTmp]->dbType = $tipoCampo[1];
                }
                //Yii::endProfile("else parte1 formateaHeaders");
                //Yii::beginProfile("else parte2 formateaHeaders");
                if (isset($metadatos->tableSchema->columns[$campoTmp])) {
                    $campo["type"] = "html";
                    if ($metadatos->tableSchema->columns[$campoTmp]->dbType)
                        $tipoCampoTemp = $metadatos->tableSchema->columns[$campoTmp]->dbType;
                    else if ($tipoCampo[1] != "")
                        $tipoCampoTemp = $tipoCampo[1];

                    if (strpos($tipoCampoTemp, "tinyint") !== false)
                        $tipoCampoTemp = "boolean";

                    switch ($tipoCampoTemp) {
                        case "integer":
                            if ($model->getModelName() == 'Form' && strtolower($campoTmp) == 'state') {
                                $campo["value"] = '(($data["' . $campoTmp . '"] == 0) ? "Pendiente" : (($data["' . $campoTmp . '"] == 1) ? "Publicado" : "Terminado"))';
                                $campo["filter"] = array("0" => "Pendiente", "1" => "Publicado", "2" => "Terminado");
                            }
                            break;
                        // 					case "numeric":
                        // 						break;
                        case "boolean":
                            switch (strtolower($campoTmp)) {
                                case "sexo":
                                    $campo["value"] = '($data["' . $campoTmp . '"]=="1")?"H":"M";';
                                    $campo["filter"] = array("'0'" => "M", "'1'" => "H");
                                    break;
                                default:
                                    $campo["value"] = '($data["' . $campoTmp . '"]=="1")?"<span class=\"verde-bool\">SI</span>":"<span class=\"rojo-bool\">NO</span>";';
                                    $campo["filter"] = array(0 => "NO", 1 => "SI");
                                    $campo["type"] = "html";
                                    break;
                            }

                            break;
                        case "html":
                            $campo["type"] = "html";
                            break;
                    }
                }
                //Yii::endProfile("else parte2 formateaHeaders");
                //Yii::beginProfile("else parte3 formateaHeaders");
                if ($campoTmp == "[html]Link") {
                    $urlDetalle = Yii::app()->createAbsoluteUrl("/" . lcfirst($this->modelName));
                    if ($this->mod != "")
                        $urlDetalle .= "/mod_" . $this->mod;
                    $campo["value"] = '"<a class=\"boton fondo-azul\" href=\"' . $urlDetalle . '/".$data["' . $model->getPkName() . '"]."' . $parametrosGet . '"."\">Ver</a>"';               
                    if ($this->mod ==258){
                        $campo["type"] = "raw";
                        $campo["value"] = '"<a id=\"al".$data["' . $model->getPkName() . '"]."\" class=\"boton fondo-verde\" href=\"javascript:activalote(\'".$data["' . $model->getPkName() . '"]."\');void(0);\">Activar</a>"';               
                    }
                   }

                if ($campoTmp == $model->getPkName()) {
                    $campo["visible"] = false;
                }

                if ($campoTmp == "Quitar") {
                    $campo = array(
                        'htmlOptions' => array('style' => 'text-align:center;', "modelo" => "1"),
                        'header' => $labels[$campoTmp],
                        'class' => 'CCheckBoxColumn',
                        'checked' => '$data["' . $campoTmp . '"]==1',
                        'selectableRows' => 0,
                    );
                }

                if (strpos(strtolower($campoTmp), "imagen") !== false ||
                        strpos(strtolower($campoTmp), "img") !== false) {
                    $rutaWebFicheros = Yii::app()->request->baseUrl . Yii::app()->params["rutaWebFicheros"];
                    $campo[$nombreCampo] = $campoTmp;
                    $campo["value"] = '"<img src=\"".(($data["' . $campoTmp . '"]!="")?("' . $rutaWebFicheros . '".$data["' . $campoTmp . '"]):Yii::app()->getTheme()->getBaseUrl()."/images/listado-vacio.jpg")."\" class=\"imagen-listado\">"';
                    $campo["type"] = "html";
                }

                if ($model->getModelName() == "HelpLabel" && $campoTmp == "Campo") {
                    $campo["value"] = '((F::getElement($data["Modelo"]::model()->attributeLabels(), $data["Campo"]) != "")? F::getElement($data["Modelo"]::model()->attributeLabels(), $data["Campo"]) : $data["Campo"])';
                }

                if ($tipoCampo[0] != "") {
                    $campo["header"] = str_replace($tipoCampo[0], "", $campo["header"]);
                }
                //Yii::endProfile("else parte3 formateaHeaders");
                //Yii::endProfile("else formateaHeaders");
            }


            if (!$conFiltros) {
                unset($campo["filter"]);
            }
        }
    }

    protected function _obtieneTipoCampo($dbType) {
        $nuevoTipo = $dbType;
        if (strpos($dbType, 'tinyint(') !== false) {
            $nuevoTipo = 'boolean';
        } else if (strpos($dbType, 'int(') !== false) {
            $nuevoTipo = 'integer';
        }

        return $nuevoTipo;
    }

    public function actionGridView($ficheros = NULL) {
        if (!isset($ficheros)) {

            if ($_POST["nombreCampoTabla"] != "" &&
                    $_POST["modelId"] != "") {
                $criterioOrden = new CDbCriteria();
                $criterioOrden->order = "Orden ASC";

                $ficheroObj = new Fichero();
                $ficheros = $ficheroObj->findAllByAttributes(array($_POST["nombreCampoTabla"] => $_POST["modelId"], "Quitar" => 0));
            }
        }
        if (isset($ficheros)) {
            $dataProviderParams = array(
                'keyField' => 'id' . Yii::app()->params["prefijoTablasBd"] . 'Fichero',
                'id' => 'id' . Yii::app()->params["prefijoTablasBd"] . 'Fichero'
            );
            $dataProvider = new CArrayDataProvider(
                    $ficheros, $dataProviderParams
            );
            $dataProvider->setPagination(false);
            $columns = array(
                array(
                    "name" => "Fichero",
                    "type" => "raw",
                    "value" => 'CHtml::link(CHtml::image("' . Yii::app()->request->baseUrl . Yii::app()->params["rutaWebFicheros"] . '".$data["Fichero"],"", array("width"=>150) ), "' . Yii::app()->request->baseUrl . Yii::app()->params["rutaWebFicheros"] . '".$data["Fichero"], array("target"=>"_blank"))'
                ),
                array(
                    "name" => 'Width',
                    "type" => 'raw',
                    "value" => '$data["Width"]',
                    "htmlOptions" => array("style" => "vertical-align:middle;")
                ),
                array(
                    "name" => 'Height',
                    "type" => 'raw',
                    "value" => '$data["Height"]',
                    "htmlOptions" => array("style" => "vertical-align:middle;")
                ),
                array(
                    "name" => 'TipoFichero',
                    "type" => "raw",
                    "value" => 'TipoFichero::model()->findByPk($data["fk' . Yii::app()->params["prefijoTablasBd"] . 'TipoFichero"])->viewValue()',
                    "htmlOptions" => array("style" => "vertical-align:middle;")
                ),
                array(
                    "name" => 'Fecha Ins.',
                    "type" => 'raw',
                    "value" => '$data["FechaIns"]',
                    "htmlOptions" => array("style" => "vertical-align:middle;")
                ),
                array(
                    "name" => 'Orden',
                    "type" => 'ntext',
                    "value" => '$data["Orden"]',
                    "htmlOptions" => array('style' => 'vertical-align:middle;'),
                ),
                array(
                    "header" => 'Quitar',
                    "htmlOptions" => array('style' => 'vertical-align:middle;', 'esFichero' => 'true'),
                    'class' => 'CCheckBoxColumn',
                    'checked' => '$data["Quitar"] == 1',
                ),
                array(
                    "name" => '',
                    "type" => 'raw',
                    "value" => 'CHtml::link("Ver", "' . Yii::app()->urlManager->createUrl("/Fichero") . '/".$data["id' . F::miapp() . 'Fichero"], array("class"=>"boton fondo-azul ".$data["Quitar"]))',
                    "htmlOptions" => array('style' => 'vertical-align:middle;'),
                )
            );
            /*
              $fnClick = "window.location='" . Yii::app()->urlManager->createUrl("/Fichero") . "/' + $.fn.yiiGridView.getSelection(id)";
              $arrReferrer = explode("?", $_SERVER["HTTP_REFERER"]);
              $fnClick .= "+'?return=".$arrReferrer[0]."&modRet=".$model->modelName."&keyRet=".$campoProcedencia."'";

              $fnClick .= ";"; */

            Yii::app()->clientScript->registerScript(
                    'saveTitle', '
				function saveTitle(idImagen){
					if(idImagen && idImagen != ""){
						var title = $("input[name=titulo"+idImagen+"]").val()
			
						$.post("' . Yii::app()->createAbsoluteUrl("/fichero/updateTitle") . '",
						{id: idImagen, title: title},
						function(postData){
							obj = JSON.parse(postData);
							if(obj.estado == "OK"){
								$("input[name=titulo"+idImagen+"]").css("border-color", "#5bb75b");
							}else
								$("input[name=titulo"+idImagen+"]").css("border-color", "#ED5466");
						})
					}
				}
			', CClientScript::POS_END);

            $this->widget('zii.widgets.grid.CGridView', array(
                'baseScriptUrl' => Yii::app()->theme->baseUrl . '/gridview',
                'id' => 'buscador_ficheros',
                'dataProvider' => $dataProvider,
                'columns' => $columns,
                'enablePagination' => false,
                'enableSorting' => true,
                    )
            );
        }
    }

    public function actionExportar($mod = "") {
        foreach (Yii::app()->log->routes as $route) {
            if ($route instanceof CWebLogRoute) {
                $route->enabled = false;
            }
        }
        $model = new $this->modelName();

        $orden = '';

        if ($mod != "") {
            $modulo = Modulo::model()->findByAttributes(array("id" . F::miApp() . "Modulo" => $mod, "Quitar" => 0));
            if ($modulo)
                $orden = $modulo->Ordenacion;

            if ($orden == "" && $model->hasAttribute('Orden')) {
                $orden = "Orden ASC";
            }
        }

        $campos = $model->visibilidad('index', false, "", $mod);

        if ($modulo->Sql != "") {
            $whereSql = "";
            $sql = $modulo->Sql;

            $sql = str_replace("{where}", $whereSql, $sql);

            $resSQL = Yii::app()->db->createCommand($sql)->queryAll();

            if ($resSQL) {
                foreach ($resSQL[0] as $campo => $valor) {
                    if (!array_key_exists($campo, $campos)) {
                        $campos[$campo] = 0;
                    }
                }
            }

            $search["numRegistros"] = sizeof($resSQL);
            $search["retorno"] = $resSQL;
        } else {
            $filtro = array();
            if ($model->hasAttribute('Quitar')) {
                $filtro['Quitar'] = 0;
            }


            $search = $model->search($filtro, "", false, $orden);
        }

        ob_start();
        $headers = array_keys($campos);

        if ($modulo)
            $nombreFichero = $modulo->Nombre;
        else
            $nombreFichero = $model->getModelName();

        header('Content-Disposition: attachement; filename="' . $nombreFichero . '.csv"');
        header("Content-Type: text/csv");
        header('Content-Type: application/octet-stream');

        $this->formateaHeaders($model, $headers, $campos, true);

        //F::pre($headers);

        ob_end_clean();

        $out = fopen('php://output', 'w');
        $datosTemp = array();
        $labels = $model->attributeLabels();
        foreach ($headers as $header) {
            $nombreColumna = $header["name"];
            if ($nombreColumna == "")
                $nombreColumna = $header["header"];

            if ($labels[$nombreColumna] != "")
                $datosTemp[$nombreColumna] = $labels[$nombreColumna];
            else
                $datosTemp[$nombreColumna] = $nombreColumna;
        }
        fputcsv($out, $datosTemp);

        foreach ($search["retorno"] as $data) {
            //F::pre($data);
            $datosTemp = array();
            $atributes = $data; //->getAttributes();
            $component = new CComponent();
            foreach ($headers as $header) {

                $nombreColumna = $header["name"];
                if ($nombreColumna == "")
                    $nombreColumna = $header["header"];

                $datosTemp[$nombreColumna] = strip_tags($component->evaluateExpression($header["value"], array("data" => $atributes)));
            }
            fputcsv($out, $datosTemp);
            $arrayCsv[] = $datosTemp;
        }

        fclose($out);
    }

    public function getModuleName($modelName) {
        $modulo = Modulo::model()->findByAttributes(array('Modelo' => $modelName));

        return (isset($modulo) ? $modulo->Nombre : '');
    }

}
