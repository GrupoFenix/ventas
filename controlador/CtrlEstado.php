<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Estado.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';

/*
* Clase CtrlEstado
*/
class CtrlEstado extends Controlador {
    
    public function index($msg=''){
        # Mostramos los datos
        $menu = Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );
        $obj = new Estado();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Estados de Cuenta",
            'contenido'=>Vista::mostrar('estado/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function eliminar(){
        if (isset($_REQUEST['idestado'])) {
            $obj = new Estado($_REQUEST['idestado']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $obj = new Estado (
                $_POST["idestado"],
                $_POST["estado"],
                );
        $respuesta=$obj->nuevo();

        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        $obj = new Estado (
                $_POST["idestado"],    #El id que enviamos
                $_POST["estado"],
                );
        $respuesta=$obj->editar();

        $this->index($respuesta['msg']);
    }
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo Estado de Cuenta');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlEstado'=>'Listado',
            '#'=>'Nuevo'
        );
        $datos1=array(
            'encabezado'=>'Nuevo Estado de Cuenta'
            );

        $datos = array(
                'titulo'=>'Nuevo Estado de Cuenta',
                'contenido'=>Vista::mostrar('estado/frmNuevo.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg
            );
        $this->mostrarVista('template.php',$datos);
    }
    public function editar(){
         #Mostramos el Formulario de Editar
         $datos=null;
         $menu = Libreria::getMenu();
         $msg= array(
             'titulo'=>'Editando...',
             'cuerpo'=>'Iniciando edición de: '.$_REQUEST['idestado']);
         $migas = array(
             '?'=>'Inicio',
             '?ctrl=CtrlEstado'=>'Listado',
             '#'=>'Editar',
         );
         if (isset($_REQUEST['idestado'])) {
             $obj = new Estado($_REQUEST['idestado']);
             $miObj = $obj->leerUno();
             // var_dump($obj->leerUno());exit();
             if (is_null($miObj['data'])) {
                 $this->index(array(
                     'titulo'=>'Error',
                     'cuerpo'=>'ID Requerido: '.$_REQUEST['idestado']. ' No Existe')
                 );
             }else{
                 $datos1 = array(
                     'estado'=>$obj
                 );
             $datos = array(
                 'titulo'=>'Editando Estados de Cuenta: '. $_REQUEST['idestado'],
                 'contenido'=>Vista::mostrar('estado/frmEditar.php',$datos1,true),
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
                 'titulo'=>'Editando Estado de Cuenta... DESCONOCIDO',
                 'contenido'=>'...El Id a Editar es requerido',
                 'menu'=>$menu,
                 'migas'=>$migas,
                 'msg'=>$msg);
         }
         
         $this->mostrarVista('template.php',$datos);
 
    }
}