<?php

class TraduccionModeloController extends GenericController {

    /**
     * @param string $id Identificador del controlador
     */
    public function __construct($id, $module = null) {
        parent::__construct($id, $module, 'TraduccionModelo');
    }

    public function actionIndex() {
        /* 
         * $criteria = new CDbCriteria();
          $criteria->addcondition('Modelo IS NOT NULL AND Modelo <> ""');
          $modelos = Modulo::model()->findAll($criteria);
          $modelosbuena=array(); *//*
          $filenames = array();
          $handle = opendir(Yii::getPathOfAlias("webmodels"));
          while (($file = readdir($handle)) !== false) {
          if (pathinfo($file, PATHINFO_EXTENSION) == 'php')
          $filenames[] = $file;
          }

          foreach ($filenames as $modelo) {
          $modelo = trim(str_replace('.php', '', $modelo));
          if ($modelo != 'GenericModel' && $modelo != 'InformeProductos' && $modelo != 'InformeProductos' && $modelo != 'InformeProductos' && $modelo != 'InformeProductos') {
          $modeloaux = new $modelo();
          if (isset($modeloaux->esTraducible)) {
          if ($modeloaux->esTraducible === true) {
          $modelosbuena[] = $modeloaux->Nombre;
          }
          }
          }
          } */
        
        /*foreach($result as $row){
            $csv.='<fkNTC_Idioma>'.$row['fkNTC_Idioma'].'</fkNTC_Idioma>';
            $csv.='<Modelo>'.$row['Modelo'].'</Modelo>';
            $csv.='<idModelo>'.$row['idModelo'].'</idModelo>';
            $csv.='<Campo>'.$row['Campo'].'</Campo>';
            $csv.='<Traduccion>'.$row['Traduccion'].'</Traduccion>';                        
            $csv.="\n\r";            
        }*/
        
        
        $sql="";
        $csv="";
        $modelosbuena = array();
        $modelos = array(
            "Categoria",
            "Menu",
        );
        foreach ($modelos as $modelo) {
            $modeloaux = new $modelo();
            if (isset($modeloaux->esTraducible)) {
                if ($modeloaux->esTraducible === true) {
                    $modelosbuena[] = $modeloaux->modelName;
                }
            }
        }
        $bote=array();
        
        $schema = Yii::app()->db->getSchema();
        foreach ($modelosbuena as $modelo) {
           $nombretabla="NTC_" . $modelo;
           $tabla = $schema->getTable($nombretabla);            
           
           $campos=$tabla->getColumnNames(); 
           foreach($campos as $campo){
               $thiscampo=$tabla->getColumn($campo);               
               if(($thiscampo->dbType==='text' || $thiscampo->dbType==='string')){
                   $sql.='select NTC_TraduccionModelo.fkNTC_Idioma, NTC_TraduccionModelo.Modelo,NTC_TraduccionModelo.idModelo,NTC_TraduccionModelo.Campo,'.$nombretabla.'.'.$campo.' as Traduccion from NTC_TraduccionModelo';                
                   $sql.=' JOIN '.$nombretabla .' ON (NTC_TraduccionModelo.idModelo='.$nombretabla.'.Id'.$nombretabla.' )';
                   $bote[]=$thiscampo->name;
               }
           }
           $sql.=' where '.$nombretabla.'.'.$campo.' IS NOT NULL AND NTC_TraduccionModelo.Modelo= "'.$modelo.'" UNION ';           
        }
        $sql = substr($sql,0,-6);
       
        $result =Yii::app()->db->createCommand($sql)->queryAll();         
        foreach($result as $row){
            foreach($row as $campo){
               $csv.=Yii::app()->db->quoteValue($campo).',';
            }
            $csv=substr($csv,0,-1);
            $csv.="\n\r";            
        }
        $fp = fopen(Yii::getPathOfAlias("webmodels").'/../../export.csv', 'w');  
        fwrite($fp,$csv);
        fclose($fp);
        echo $fp;
        $resultado = $this->render('application.views.intranet.tradexp', array());
    }

}


         /* PLAN DE SACA MODELOS DE MODULO
            * 
            * 
            * 
         * $modelos=array();
        $tablas = Yii::app()->db->getSchema()->getTableNames();
        foreach ($tablas as $tabla) {
            $tabla = str_replace(Yii::app()->params['PrefijoTablas'], '', $tabla);
            F::pre(get_declared_classes());
            echo ($tabla) ;
            echo class_exists($tabla) ;
                die();
            if (class_exists($tabla) && file_exists('application.models'.$tabla.'.php')){
            
            $modeloaux= new $tabla;
                if($modeloaux->isTraducible){
                    $modelos[$modeloaux];
                }
            } 
               
        }
        return $tablas;*/ 
        
        /*     
         * 
         * Yii::app()->basePath . '/../¿INTRANET?'
         * 
         * 
         */
        
        /*
         * 
         * montando dignamente con querybuilder no me deja tirar distinct
         * 
         */
        /*
         * 
         * TENIENDO EN CUENTA QUE LOS MODELOS QUE ME DEVUELVE PUEDEN SER 
         * 
        $modelos = Yii::app()->db->createCommand('select distinct modelo from '.Yii::app()->params['PrefijoTablas'].'Modulo'.' where modelo IS NOT NULL and modelo <> ""')->queryAll();
        */
        
        
        
    