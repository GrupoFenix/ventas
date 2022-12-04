<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Perfil.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlTipoCliente
*/
class CtrlPerfil extends Controlador {

    public function index($msg=array('titulo'=>'','cuerpo'=>'')){
        # Mostramos los datos
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Perfil();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Tipos de Perfiles",
            'contenido'=>Vista::mostrar('Perfil/mostrar.php',$resultado,true),
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
            $obj = new Perfil($_REQUEST['id']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $obj = new Perfil (
                $_POST["id"],
                $_POST["perfil"],
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $obj = new Perfil (
                $_POST["id"], #El id que enviamos
                $_POST["perfil"]
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
        //var_dump($sql);
    }   
    public function nuevo(){
        #Mostramos el Formulario de Nuevo
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        echo Vista::mostrar('perfil/frmNuevo.php');
    }
    public function editar(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        #Mostramos el Formulario de Editar
        $datos=null;
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Editando...',
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['id']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlPerfil'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['id'])) {
            $obj = new Perfil($_REQUEST['id']);
            $miObj = $obj->leerUno();
            $datos1 = array(
                    'perfil'=>$obj
                );
           echo Vista::mostrar('perfil/frmEditar.php',$datos1);
            }
    }
    public function getPerfilSelect(){
        $obj = new Perfil();
        $datos = $obj->leer()['data'];
        $html = '<option value="0">Seleccionar...</option>';
        foreach ($datos as $pf) {
            $html .= '<option value="'.$pf['idperfil'].'">'.$pf['perfil'].'</option>';
        }
        echo $html;
    }
}