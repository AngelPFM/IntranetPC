<?php

class TextosController extends Controller {

    public function actionHola(){
        echo "HOLA";
    }

    public function actionImportar() {
        $Usu = Yii::$app->user->usuario;
        if ($Usu->fkNTC_Rol > 0) {
            $log = array();

            $model = new TextosForm();
            if (isset($_POST['TextosForm'])) {
//      $urlFile = Yii::$app->basePath.'/../uploads/textos.csv';
                $model->attributes = $_POST['TextosForm'];
                $model->file = CUploadedFile::getInstance($model, 'file');

                $lineas = array();
                $cabeceras = array();
                $first_time = true;
                $second_time = true;

                if ($model->modelo != 'Traducciones') {
                    //Abrimos el fichero
                    $fp = fopen($model->file->tempName, 'r');
                    if ($fp) {
                        do {
                            //La primera linea la ignoramos
                            if ($first_time) {
                                $first_time = false;
                            } else if ($second_time) { // La segunda linea son las cabeceras
                                $second_time = false;
                                foreach ($line as $attr) {
                                    $cabeceras[] = $attr;
                                }

                                $cabeceras[0] = 'idModelo'; //La primera columna es el identificador, lo machacamos
                            } else { //El resto de lineas son los datos a importar
                                $cont = 0;
                                $linea = array();
                                foreach ($line as $attr) {
                                    $linea[$cabeceras[$cont]] = $attr;
                                    $cont++;
                                }
                                $lineas[] = $linea;
                            }
                        } while (($line = fgetcsv($fp, 1000, ";")) != FALSE);


                        //Recorremos los datos montados
                        $modelo = $model->modelo;
                        $idioma = $model->idioma;

                        $textos_importados = 0;
                        $textos_noactualizados = 0;
                        foreach ($lineas as $l) {
                            $identificador = $l['idModelo'];
                            unset($l['idModelo']);
                            foreach ($l as $campo => $valor) {
                                $transaction = Yii::$app->db->beginTransaction();
                                try {
                                    $sql = "UPDATE TraduccionModelo SET Traduccion=:traduccion WHERE fkNTC_Idioma=:idioma AND Modelo=:modelo 
                AND idModelo=:idmodelo AND Campo=:campo;";

                                    $command = Yii::$app->db->createCommand($sql);

                                    $command->bindParam(':traduccion', $valor);
                                    $command->bindParam(':idioma', $idioma);
                                    $command->bindParam(':modelo', $modelo);
                                    $command->bindParam(':idmodelo', $identificador);
                                    $command->bindParam(':campo', $campo);

                                    $command->execute();

                                    $transaction->commit();
                                    $textos_importados++;
                                } catch (Exception $ex) {
                                    $transaction->rollback();
                                    $log[] = "No se ha podido guardar el campo $campo del $modelo $identificador: " . $ex->getMessage();
                                    $textos_noactualizados++;
                                }
                            }
                        }

                        $log[] = "Se ha importado $textos_importados textos";
                        $log[] = "No se han actualizado $textos_noactualizados textos";
                    } else {
                        $log[] = "Error al abrir el fichero";
                    }
                } else {
                    $fp = fopen($model->file->tempName, 'r');
                    if ($fp) {
                        do {
                            //La primera linea la ignoramos
                            if ($first_time) {
                                $first_time = false;
                            } else if ($second_time) { // La segunda linea son las cabeceras
                                $second_time = false;
                                foreach ($line as $attr) {
                                    $cabeceras[] = $attr;
                                }
                            } else { //El resto de lineas son los datos a importar
                                $cont = 0;
                                $linea = array();
                                foreach ($line as $attr) {
                                    $linea[$cabeceras[$cont]] = $attr;
                                    $cont++;
                                }
                                $lineas[] = $linea;
                            }
                        } while (($line = fgetcsv($fp, 1000, ";")) != FALSE);

                        $idioma = $model->idioma;

                        $textos_importados = 0;
                        $textos_noactualizados = 0;
                        foreach ($lineas as $l) {
                            $categoria = $l['Category'];
                            $mensaje = $l['Message'];
                            $traduccion = $l['Translation'];

                            $transaction = Yii::$app->db->beginTransaction();
                            try {
                                $sql = "UPDATE NTC_Mensaje m
                JOIN NTC_OrigenMensaje om ON m.fkNTC_OrigenMensaje=om.idNTC_OrigenMensaje 
                AND om.Category=:categoria AND om.Message=:mensaje
                SET m.Translation=:traduccion
                WHERE m.Language=:idioma;";

                                $command = Yii::$app->db->createCommand($sql);

                                $command->bindParam(':categoria', $categoria);
                                $command->bindParam(':mensaje', $mensaje);
                                $command->bindParam(':traduccion', $traduccion);
                                $command->bindParam(':idioma', $idioma);

                                $command->execute();

                                $transaction->commit();
                                $textos_importados++;
                            } catch (Exception $ex) {
                                $transaction->rollback();
                                $log[] = "No se ha podido guardar la traduccion de $categoria - $mensaje: " . $ex->getMessage();
                                $textos_noactualizados++;
                            }
                        }

                        $log[] = "Se ha importado $textos_importados textos";
                        $log[] = "No se han actualizado $textos_noactualizados textos";
                    } else {
                        $log[] = "Error al abrir el fichero";
                    }
                }
            }

            $this->render('importar', array('model' => $model, 'log' => $log));
        }else{
            $this->redirect('login');
        }
    }

    public function actionExportar() {
        $Usu = Yii::$app->user->usuario;
        if ($Usu->fkNTC_Rol > 0) {
            $sql = "";
            $csv = "";

            //llename la array a mano

 $modelos = array(
                "Categoria" => array("campos" => array(
                        "Nombre",
                        "Titulo"
                    )
                ),
                "Menu" => array(
                    "campos" => array(
                        "Nombre",
                        "Titulo",
                        "Descripcion",
                        "MetaTitle",
                        "MetaDescription",
                        "MetaRobots"
                    )
                ),
            );

           /* $modelos = array(
                "Articulo" => array("campos" => array(
                    "Nombre",
                    "DescripcionCorta",
                  "Descripcion",
                  "MetaTitle",
                  "MetaDescription",
                ), "where"=>"WHERE Quitar = 0"),
                "Banner2x" => array("campos" => array(
                    "Descripcion",
                    "TextoBoton",
                    "Url",
                ), "where"=>"WHERE Quitar = 0"),
              "Banner15x" => array("campos" => array(
                "TextoBoton",
                "Url",
              ), "where"=>"WHERE Quitar = 0"),
              "BloqueCMS" => array("campos" => array(
                "Nombre",
                "Titulo",
                "Descripcion",
                "MetaTitle",
              ), "where"=>"WHERE Quitar = 0"),
              "Categoria" => array("campos" => array(
                "Titulo",
                "Nombre",
                "MetaTitle",
                "MetaDescription",
              ), "where"=>"WHERE Quitar = 0 AND fkNTC_padre IS NOT NULL"),
              "Coleccion" => array("campos" => array(
                "Nombre",
                "MetaTitle",
                "MetaDescription",
              ), "where"=>"WHERE Quitar = 0"),
              "Escaparate" => array("campos" => array(
                "Titulo",
                "TextoBoton",
                "Url",
              ), "where"=>"WHERE Quitar = 0"),
              "EstaticosCMS" => array("campos" => array(
                "Nombre",
                "Titulo",
                "Descripcion",
              ), "where"=>"WHERE Quitar = 0"),
              "Firma" => array("campos" => array(
                "Titulo",
                "Descripcion",
              ), "where"=>"WHERE Quitar = 0"),
              "FormaPago" => array("campos" => array(
                "Descripcion",
                "InfoAdicional",
              ), "where"=>"WHERE Quitar = 0"),
              "Menu" => array("campos" => array(
                "Nombre",
                "Titulo",
                "Descripcion",
                "MetaTitle",
                "MetaDescription"
              ), "where"=>"WHERE Quitar = 0 AND fkNTC_padre IS NOT NULL"),
              "Pagina" => array("campos" => array(
                "Titulo",
                "URLEntrada",
                "MetaTitle",
                "MetaDescription"
              ), "where"=>"WHERE Quitar = 0"),
            );*/
            $pref = Yii::$app->params['prefijoTablasBd'];
            $schema = Yii::$app->db->getSchema();
            $models = array_keys($modelos);
            foreach ($modelos as $key => $modelo) {
                $firstrow = "";
                $nombretabla = $pref . $key;
                $sql = 'SELECT Id' . $nombretabla . ",";
                foreach ($modelo["campos"] as $campo) {
                    $sql.= $campo . ',';
                    $firstrow.="'" . $campo . "';";
                }
                $firstrow = substr($firstrow, 0, -1);
                $sql = substr($sql, 0, -1);
                $sql.=' FROM ' . $nombretabla;
                
                if(isset($modelo["where"]))
                  $sql .= " ".$modelo["where"]." ";
                
                $result = Yii::$app->db->createCommand($sql)->queryAll();
                foreach ($result as $row) {
                    foreach ($row as $campo) {
                        $csv.=Yii::$app->db->quoteValue($campo) . ';';
                    }
                    $csv = substr($csv, 0, -1);
                    $csv.="\n\r";
                }
                $csv = html_entity_decode($csv, ENT_NOQUOTES);
                
                $fp = fopen(Yii::getPathOfAlias("raiz") . $key . '.csv', 'w');
                fwrite($fp, "'Id" . $nombretabla . "';" . $firstrow . "\n\r");
                fwrite($fp, $csv);
                fclose($fp);
            }
            $sql = 'select ' . $pref . 'OrigenMensaje.category,' . $pref . 'OrigenMensaje.message,' . $pref . 'Mensaje.translation from ' . $pref . 'OrigenMensaje 
join ' . $pref . 'Mensaje on (' . $pref . 'Mensaje.fk' . $pref . 'OrigenMensaje=' . $pref . 'OrigenMensaje.id' . $pref . 'OrigenMensaje)';
            $result = Yii::$app->db->createCommand($sql)->queryAll();
            foreach ($result as $row) {
                foreach ($row as $campo) {
                    $csv.=Yii::$app->db->quoteValue($campo) . ';';
                }
                $csv = substr($csv, 0, -1);
                $csv.="\n\r";
            }
            $csv = html_entity_decode($csv, ENT_NOQUOTES);
            $fp = fopen(Yii::getPathOfAlias("raiz") . 'Mensajes.csv', 'w');
            fwrite($fp, "'Category';'Message';'Translation'" . "\n\r");
            fwrite($fp, $csv);
            fclose($fp);
            $files = $models;
            $files[] = 'Mensajes';
            $zipname = Yii::getPathOfAlias("raiz") . 'Trad.zip';
            $zip = new ZipArchive;
            $zip->open(Yii::getPathOfAlias("raiz") . $zipname, ZipArchive::CREATE);
            foreach ($files as $file) {
                $zip->addFile(Yii::getPathOfAlias("raiz") . $file . '.csv');
            }
            $zip->close();
            header('Content-Type: application/zip');
            header('Content-disposition: attachment; filename=Trad.zip');
            readfile(Yii::getPathOfAlias("raiz") . $zipname);
        }else{
            $this->redirect('login');
        }
    }

}
