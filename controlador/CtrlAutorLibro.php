<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'AutorLibro.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlAutorLibro
*/
class CtrlAutorLibro extends Controlador {
    public function index($msg=''){
        # Mostramos los datos
        $menu = Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );

        $obj = new AutorLibro();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Autores y sus Libros",
            'contenido'=>Vista::mostrar('autorlibro/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }

    public function eliminar(){
        if (isset($_REQUEST['idautores'],$_REQUEST['idlibros'])) {
            $obj = new AutorLibro($_REQUEST['idautores'],$_REQUEST['idlibros']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...Los Id a ELIMINAR son requerido";
        }
    }
    public function guardarNuevo(){
        $obj = new AutorLibro (
                $_POST["fullnombres"],
                $_POST["titulo"],             
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        $obj = new AutorLibro (
                $_POST["fullnombres"],
                $_POST["titulo"],
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
    }   
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo AutorLibro');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlAutorLibro'=>'Listado',
            '#'=>'Nuevo',
        );
        $obj = new AutorLibro();
        $datos1=array(
            'encabezado'=>'Nuevo AutorLibro',
            'autorlibro'=>$obj
            );
        
        $datos = array(
                'titulo'=>'Nuevo AutorLibro',
                'contenido'=>Vista::mostrar('autorlibro/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }
    public function editar(){
       #Mostramos el Formulario de Editar
       $menu = Libreria::getMenu();
       $msg= array(
           'titulo'=>'Editando...',
           'cuerpo'=>'Iniciando edición para: ' .$_REQUEST['idautores'].$_REQUEST['idlibros']);
       $migas = array(
           '?'=>'Inicio',
           '?ctrl=CtrlAutorLibro'=>'Listado',
           '#'=>'Editar',
       );
       if (isset($_REQUEST['idautores'],$_REQUEST['idlibros'])) {
           $obj = new AutorLibro($_REQUEST['idautores'],$_REQUEST['idlibros']);
           $miObj = $obj->leerUno();
           if (is_null($miObj['data'])) {
               $this->index(array(
                   'titulo'=>'Error',
                   'cuerpo'=>'ID Requerido: '.$_REQUEST['idautores'].$_REQUEST['idlibros']. 'No Existe')
               );
           }else{

               $datos1 = array(
                       'autorlibro'=>$obj
                   );

               $datos = array(
                   'titulo'=>'Editando AutorLibro: '. $_REQUEST['idautores'].$_REQUEST['idlibros'],
                   'contenido'=>Vista::mostrar('autorlibro/frmEditar.php',$datos1,true),
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
               'titulo'=>'Editando AutorLibro... DESCONOCIDO',
               'contenido'=>'...El Id a Editar es requerido',
               'menu'=>$menu,
               'migas'=>$migas,
               'msg'=>$msg);
       }
       
       $this->mostrarVista('template.php',$datos);
    }
}