


<?php

use app\assets\AppAsset;
use app\models\Usuario;
use yii\helpers\Html;


AppAsset::register($this);


?>
<?php $this->beginPage() ?>
<!doctype html>  
<html lang="<?= Yii::$app->language ?>">  
    <head>
        <meta charset="utf-8" />
        <?= Html::csrfMetaTags() ?>
        <meta name="language" content="<?= Yii::$app->language ?>" />
        <link rel="stylesheet" type="text/css" href='//fonts.googleapis.com/css?family=Maven+Pro:400,700,500'/>	
        <meta name="robots" content="noindex, nofollow">
        <!-- blueprint CSS framework -->

        <link rel="stylesheet" type="text/css" media="screen" href="<?=  \yii\helpers\Url::base()?>/css/reset.css" />
        <link rel="stylesheet" type="text/css" media="screen" href="<?=  \yii\helpers\Url::base()?>/css/form.css" />
        <link rel="stylesheet" type="text/css" href="<?=  \yii\helpers\Url::base()?>/css/gridview/styles.css" />		
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?=  \yii\helpers\Url::base()?>/css/ie.css" media="screen, projection" />
        <![endif]-->
        <script type="text/javascript">
            var ruta = "<?php echo  \yii\helpers\Url::base()?>";
        </script>
        <?php //echo Yii::log("PARAMS: ".print_r(Yii::$app->params,1));?>
  
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>
        <section id="contenedor_principal" style="display:table; width:100%;">
            <section id="parte_izquierda" class="<?php echo isset(Yii::$app->session['menu']) && Yii::$app->session['menu'] == 'flotante' ? 'menu-flotante' : 'menu-fijo'; ?>" style="width:270px;">
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

                        $.post('<?php echo Yii::$app->urlManager->createAbsoluteUrl('site/cambiaMenu'); ?>',
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
                    <figure><a href="<?= Yii::$app->getUrlManager()->createUrl("/site/index") ?>"><img src="<?php echo \yii\helpers\Url::base() ?>/images/logo.png" width="100%" border="0"/></a></figure>
                    <section id="datos_usuario">
                        <article><span class="header_nombre"><?= $usuario->username . " (" . $usuario->email . ")" ?></span></article>
                        <section id="datos_usuario_ocultos">
                            <select id="selectIdioma">
                                <?php
                                $idiomas = app\models\Idioma::find()->where(array("Quitar" => 0))->all();
                                foreach ($idiomas as $idioma) {
                                    $selected = "";
                                    if ($idioma->idNTC_Idioma == Yii::$app->language)
                                        $selected = "selected";
                                    ?>
                                    <option <?= $selected ?> value="<?= $idioma->idNTC_Idioma ?>"><?= $idioma->Nombre ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                            <article id="logout">
                                <?php
                                if (!Yii::$app->user->isGuest) {
                                    echo
                                    \yii\helpers\Html::a(
                                            "Logout", Yii::$app->getUrlManager()->createUrl('site/logout')
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
                            
                            if ($this->beginCache("menu_" . Yii::$app->user->id)) {
                                $usuario = new Usuario();
                                $modulos = $usuario->menuPrincipal();
                                   $usuario = app\models\User::findOne(["id"=>  Yii::$app->user->id]);
                                foreach ($modulos as $modulo) {
                                    $menuPrincipal = $usuario->obtieneBotonesMenuPrincipal( "Intranet",$modulo->idNTC_Modulo);
                                    if (sizeof($menuPrincipal["items"]) > 0) {
                                        ?>
                                        <li class="principal_nav">
                                            <h5><span class="ico-menu menu-<?= $modulo->idNTC_Modulo ?>"></span>
                                                <?php
                                                echo \yii\helpers\Html::a(
                                                        $modulo->Nombre, 'javascript:despliegaMenus("' . $modulo->idNTC_Modulo . '");void(0);'
                                                );
                                                ?>
                                                <span class="menu-row"></span>
                                            </h5>
                                            <div class="menu_nav" style="display:none;" id="menu_nav_<?= $modulo->idNTC_Modulo ?>">
                                                <?php 
                                                //print_r($menuPrincipal);
                                                echo \yii\widgets\Menu::widget($menuPrincipal);
                                                 ?>
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
                       
                    <?php echo $content; ?>
                </div>
            </section>	
        </section>
        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage();
        ?>
