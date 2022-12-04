<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Editorial.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlPais
*/
class CtrlEditorial extends Controlador {
    
    public function index($msg=''){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Editorial();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Editoriales",
            'contenido'=>Vista::mostrar('editorial/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nueva Editorial');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlEditorial'=>'Listado',
            '#'=>'Nuevo'
        );
        $datos1=array(
            'encabezado'=>'Nueva Editorial'
            );

        $datos = array(
                'titulo'=>'Nueva Editorial',
                'contenido'=>Vista::mostrar('editorial/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }

    public function guardarNuevo(){
        $obj = new Editorial (
                $_POST["ideditoriales"],
                $_POST["editoriales"],
                );
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function eliminar(){
        if (isset($_REQUEST['ideditoriales'])) {
            $obj = new Editorial($_REQUEST['ideditoriales']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function editar(){
        #Mostramos el Formulario de Editar
        $datos=null;
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Editando...',
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['ideditoriales']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlEditorial'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['ideditoriales'])) {
            $obj = new Editorial($_REQUEST['ideditoriales']);
            $miObj = $obj->leerUno();
            // var_dump($obj->leerUno());exit();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['ideditoriales']. ' No Existe')
                );
            }else{
                $datos1 = array(
                    'editoriales'=>$obj
                );
            $datos = array(
                'titulo'=>'Editando Editorial: '. $_REQUEST['ideditoriales'],
                'contenido'=>Vista::mostrar('editorial/frmEditar.php',$datos1,true),
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
                'titulo'=>'Editando Editorial... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        
        $this->mostrarVista('template.php',$datos);

        
    }
    public function guardarEditar(){
        $obj = new Editorial (
                $_POST["ideditoriales"],    #El id que enviamos
                $_POST["editoriales"]
                );
        $respuesta=$obj->editar();
        
        $this->index($respuesta['msg']);
    }
}