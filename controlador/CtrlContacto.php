<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Contacto.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlContacto
*/
class CtrlContacto extends Controlador {

    public function index($msg=array('titulo'=>'','cuerpo'=>'')){
        # Mostramos los datos
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Contacto();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Mensajes enviados por nuestros Clientes",
            'contenido'=>Vista::mostrar('contacto/mostrar.php',$resultado,true),
            'visitante'=>Vista::mostrar('contacto/contacto.php','',true),
            'cliente'=>Vista::mostrar('contacto/contactouser.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg,
            'data'=>$resultado['data']
        );
        
        $this->mostrarVista('template.php',$datos);
    }

    public function eliminar(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        if (isset($_REQUEST['id'])) {
            $obj = new Contacto($_REQUEST['id']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function nuevo(){
        #Mostramos el Formulario de Nuevo
        echo Vista::mostrar('contacto/contacto.php');
    }
    public function nuevouser(){
        #Mostramos el Formulario de Nuevo
        echo Vista::mostrar('contacto/contactouser.php');
    }
    public function guardarNuevo(){
        $obj = new Contacto (
                $_POST["id"],
                $_POST["nombre"],
                $_POST['apellido'],
                $_POST['correo'],
                $_POST['sexo'],
                $_POST['mensaje'],
                $_POST['fecha'],
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
}