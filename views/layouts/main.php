<?php
$cs = Yii::app()->getClientScript();

//$cs->registerScriptFile(Yii::app()->theme->baseUrl.'/js/prefixfree.min.js');
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/jquery.fancybox.pack.js', CClientScript::POS_END);
$cs->registerScriptFile(Yii::app()->theme->baseUrl . '/js/interclick.php', CClientScript::POS_END);
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/main.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/detailview.css');
$cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/jquery.fancybox.css');
//$cs->registerCssFile('http://blueimp.github.com/cdn/css/bootstrap.min.css');
$cs->registerCoreScript('jquery');
?>
<!doctype html>  
<html>  
    <head>
        <meta charset="utf-8" />
        <meta name="language" content="en" />
        <link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Maven+Pro:400,700,500'/>	
        <meta name="robots" content="noindex, nofollow">
        <!-- blueprint CSS framework -->

        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/gridview/styles.css" />		
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <script type="text/javascript">
            var ruta = "<?php echo Yii::app()->request->baseUrl; ?>";
        </script>
        <?php //echo Yii::log("PARAMS: ".print_r(Yii::app()->params,1));?>
        <title><?php echo Yii::app()->name ?></title>
    </head>
    <body>
        <section id="contenedor_principal" style="display:table; width:100%;">
            <section id="parte_izquierda" class="<?php echo isset(Yii::app()->session['menu']) && Yii::app()->session['menu'] == 'flotante' ? 'menu-flotante' : 'menu-fijo'; ?>" style="width:270px;">
                <script type="text/javascript">
                    function cambiaTipoMenu() {
                        if ($('#parte_izquierda').hasClass('menu-fijo')) {
                            $('#parte_izquierda').removeClass('menu-fijo');
                            $('#parte_izquierda').addClass('menu-flotante');
                        } else {
                            $('body').scrollTop(0);
                            $('#parte_izquierda').removeClass('menu-flotante');
                            $('#parte_izquierda').addClass('menu-fijo');
                        }

                        $.post('<?php echo Yii::app()->createAbsoluteUrl('site/cambiaMenu'); ?>',
                                {},
                                function (data) {
                                },
                                'json'
                                );
                    }
                </script>
                <div class="pestana-izq">
                    <span class="menu-row"></span>
                </div>
                <header>
                    <span class="icono-estilo-menu" onclick="javascript:cambiaTipoMenu();"></span>
                    <figure><a href="<?= Yii::app()->createUrl("/site/index") ?>"><img src="<?php echo Yii::app()->theme->baseUrl ?>/images/logo.png" width="100%" border="0"/></a></figure>
                    <section id="datos_usuario">
                        <article><span class="header_nombre"><?= Yii::app()->user->getUsuario()->Nombre . " (" . Yii::app()->user->getUsuario()->Email . ")" ?></span></article>
                        <section id="datos_usuario_ocultos">
                            <select id="selectIdioma">
                                <?php
                                $idiomas = Idioma::model()->findAllByAttributes(array("Quitar" => 0));
                                foreach ($idiomas as $idioma) {
                                    $selected = "";
                                    if ($idioma->getPkValue() == Yii::app()->getLanguage())
                                        $selected = "selected";
                                    ?>
                                    <option <?= $selected ?> value="<?= $idioma->getPkValue() ?>"><?= $idioma->Nombre ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <article id="logout">
                                <?php
                                if (!Yii::app()->user->isGuest) {
                                    echo
                                    CHtml::link(
                                            "Logout", $this->createUrl('site/logout')
                                    );
                                }
                                ?>
                            </article>
                        </section>
                    </section>
                </header>
                <section>

                    <section id="accesos_directos"></section>
                    <section id="accesos_modulos">
                        <ul>					
                            <?php
                            if ($this->beginCache("menu_" . Yii::app()->user->usuario->getPkValue())) {
                                $usuario = new Usuario();
                                $modulos = $usuario->menuPrincipal();

                                foreach ($modulos as $modulo) {
                                    $menuPrincipal = Yii::app()->user->obtieneBotonesMenuPrincipal($this->modelName, $modulo->idNTC_Modulo);
                                    if (sizeof($menuPrincipal["items"]) > 0) {
                                        ?>
                                        <li class="principal_nav">
                                            <h5><span class="ico-menu menu-<?= $modulo->idNTC_Modulo ?>"></span>
                                                <?php
                                                echo CHtml::link(
                                                        $modulo->Nombre, 'javascript:despliegaMenus("' . $modulo->idNTC_Modulo . '");void(0);'
                                                );
                                                ?>
                                                <span class="menu-row"></span>
                                            </h5>
                                            <div class="menu_nav" style="display:none;" id="menu_nav_<?= $modulo->idNTC_Modulo ?>">
                                                <?php $this->widget('zii.widgets.CMenu', $menuPrincipal); ?>
                                            </div>
                                        </li>
                                        <?php
                                    }
                                }
                                $this->endCache();
                            }
                            ?>
                        </ul>
                    </section>
                </section>
            </section>
            <section id="parte_derecha" style="width:auto;">			
                <div class="sep_derecha">
                        <!-- <header><?php echo $this->pageTitle; ?></header>-->
                    <?php echo $content; ?>
                </div>
            </section>	
        </section>
    </body>
</html>
