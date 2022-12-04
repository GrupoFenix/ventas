<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Autor.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlAutor
*/
class CtrlAutor extends Controlador {

    public function index($msg=array('titulo'=>'','cuerpo'=>'')){
        # Mostramos los datos
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );

        $obj = new Autor();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Autores",
            'contenido'=>Vista::mostrar('autor/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        $this->mostrarVista('template.php',$datos);
    }

    public function eliminar(){
        if (isset($_REQUEST['idautores'])) {
            $obj = new Autor($_REQUEST['idautores']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $obj = new Autor (
                $_POST["idautores"],
                $_POST["fullnombres"],
                $_POST["fechanac"],
                $_POST["fechadef"],
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        //var_dump($_REQUEST);
        $obj = new Autor (
                $_POST["idautores"],
                $_POST["fullnombres"],
                $_POST["fechanac"],
                $_POST["fechadef"],
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
        //var_dump($sql);
    }   
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo Autor(es)');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlAutor'=>'Listado',
            '#'=>'Nuevo'
        );
        $datos1=array(
            'encabezado'=>'Nuevo Autor'
            );

        $datos = array(
                'titulo'=>'Nuevo Autor',
                'contenido'=>Vista::mostrar('autor/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        //var_dump($sql);exit();
        $this->mostrarVista('template.php',$datos);
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        $datos=null;
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Editando...',
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['idautores']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlAutor'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idautores'])) {
            $obj = new Autor($_REQUEST['idautores']);
            $miObj = $obj->leerUno();
            // var_dump($obj->leerUno());exit();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idautores']. ' No Existe')
                );
            }else{
                $datos1 = array(
                    'autores'=>$obj
                );
            $datos = array(
                'titulo'=>'Editando Autor: '. $_REQUEST['idautores'],
                'contenido'=>Vista::mostrar('autor/frmEditar.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
            }
            
        }else {
            $msg= array(
            'titulo'=>'Error',
            'cuerpo'=>'No se encontró al ID requerido');

            $datos = array(
                'titulo'=>'Editando Autor... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        $this->mostrarVista('template.php',$datos);
    }
}