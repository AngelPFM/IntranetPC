<?php

class CategoriaController extends GenericController {

    /**
     * @param string $id Identificador del controlador
     */
    public function __construct($id, $module = null) {
        parent::__construct($id, $module, 'Categoria');
    }

    public function actionIndex() {
//$campos = $model->visibilidad('index');
        $this->render(
                '/intranet/categorias', array(
            'dataTree' => Categoria::model()->arbolCategorias(),
            'model' => $model,
            'campos' => $campos,
            'camposBusqueda' => $camposBusqueda,
            'modelName' => $this->modelName,
                )
        );
    }

    public function actionMove2() {
        if (Yii::app()->request->isAjaxRequest && isset($_POST['moved']) && isset($_POST['to']) && isset($_POST['pos']) && isset($_POST['parent'])) {
            $moved = $_POST['moved']; //Id del elemento que movemos
            $to = $_POST['to']; //Id del elemento sobre el que posicionamos
            $pos = $_POST['pos']; //before / after / inside del que posicionamos
            $parent = $_POST['parent']; //padre que se le asignará
//Obtenemos la categoría que movemos y a la que movemos
            $categoriaMoved = Categoria::model()->findByPk($moved);
            $categoriaTo = Categoria::model()->findByPk($to);

            if ($categoriaMoved != null && $categoriaTo != null) {
// //Obtenemos el padre donde posicionamos
                $categoriaPadre = Categoria::model()->findByPk($parent);
                if ($categoriaPadre != null) {
// //Recorremos los hijos asignando ordenes
                    $ok = true;
                    $transaction = Yii::app()->db->beginTransaction();
                    try {
                        $orden = 1;
                        $hijos = $categoriaPadre->subCategorias2;

                        foreach ($hijos as $key => $categoriaEstoy) {
                            if ($categoriaEstoy->getPkValue() == $categoriaMoved->getPkValue()) {
                                unset($hijos[$key]);
                            }
                        }

                        foreach ($hijos as $key => $categoriaEstoy) {
                            if ($categoriaEstoy->getPkValue() != $categoriaTgetPkValue()) {
                                $categoriaEstoy->Orden = $orden;
                                $ok = $ok && $categoriaEstoy->save();
                            } else {
                                switch ($pos) {
                                    case "after":
                                        $categoriaTOrden = $orden;
                                        $ok = $ok && $categoriaTsave();
                                        $orden++;

                                        $categoriaMoved->Orden = $orden;
                                        $ok = $ok && $categoriaMoved->save();
                                        break;
                                    case "before":
                                        $categoriaMoved->Orden = $orden;
                                        $ok = $ok && $categoriaMoved->save();
                                        $orden++;

                                        $categoriaTOrden = $orden;
                                        $ok = $ok && $categoriaTsave();
                                        break;
                                    case "inside":
                                        $categoriaMoved->Orden = 0;
                                        $categoriaMoved->fkUNI_padre = $categoriaTgetpkValue();
                                        $ok = $ok && $categoriaMoved->save();
                                        break;
                                }
                            }

                            $orden++;
                        }

                        if ($ok == true) {
                            $transaction->commit();
                        } else {
                            $transaction->rollback();
                        }
                    } catch (Exception $ex) {
                        $transaction->rollback();
                    }
                }
            }

            echo ($ok ? '1' : '0');
        }
    }

    public function actionMove() {
        if (Yii::app()->request->isAjaxRequest && isset($_POST['moved']) && isset($_POST['to']) && isset($_POST['pos']) && isset($_POST['parent'])) {
            $to = $_POST['to'];
            $pos = $_POST['pos'];
            $siblings = Categoria::model()->findAllByAttributes(array('fkNTC_padre'=>$_POST['parent']),array('order'=>'Orden ASC'));
            $menu = Categoria::model()->findByPk($_POST['moved']);
            $position = 10;

            if ($to == $_POST['parent']) {
                $pos = 'before';
                $to = $siblings[0]->idNTC_Categoria;
            }
            foreach ($siblings as $opcion) {
                if ($opcion->idNTC_Categoria!= $menu->idNTC_Categoria) {
                    if ($opcion->idNTC_Categoria == $to) {
                        switch ($pos) {
                            case 'before': $menu->Orden = $position;                                
                                $menu->save(false, array('Orden'));
                                $position+=10;
                                $opcion->Orden = $position;
                                break;
                            case 'after':
                            case 'inside': $opcion->Orden = $position;
                               
                                $position+=10;
                                $menu->Orden = $position;
                                $menu->save(false, array('Orden'));
                        }						Yii::log($menu->Titulo.' -> '.$menu->Orden);
                    } else {
                        $opcion->Orden = $position;
                    }
                    $opcion->save(false, array('Orden'));
                    $position+=10;
                }
            }
            echo true;
        }
    }

    public function actionChange() {
        if (Yii::app()->request->isAjaxRequest && isset($_GET['id']) && isset($_GET['model'])) {
            $id = $_GET['id'];
            $modelName = $_GET['model'];
            $categoria = Categoria::model()->findByPk($id);

            if (isset($categoria)) {
                $relaciones = $categoria->relations();
                foreach ($relaciones as $relacion => $attrib) {
// 					Yii::log('relacion: '.print_r($attrib,1));
                    if ($attrib[1] == $modelName) {
                        $listaRelacionados = $categoria->$relacion();
                        $model = new $modelName();
                        $data = CHtml::listData($listaRelacionados, $model->getPkName(), $model->viewName());
                        echo CHtml::activeDropDownList($model, $model->getPkName(), $data, array('empty' => 'seleccione...'));
                        break;
                    }
                }
            }
        }
        Yii::app()->end();
    }

}
