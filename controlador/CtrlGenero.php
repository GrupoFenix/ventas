<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Genero.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlTipoCliente
*/
class CtrlGenero extends Controlador {

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

        $obj = new Genero();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Generos Literarios",
            'contenido'=>Vista::mostrar('genero/mostrar.php',$resultado,true),
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
            $obj = new Genero($_REQUEST['id']);
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
        $obj = new Genero (
                $_POST["id"],
                $_POST["generos"],
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $obj = new Genero (
                $_POST["id"], #El id que enviamos
                $_POST["generos"]
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
        echo Vista::mostrar('genero/frmNuevo.php');
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
            '?ctrl=CtrlGenero'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['id'])) {
            $obj = new Genero($_REQUEST['id']);
            $miObj = $obj->leerUno();
            $datos1 = array(
                    'generos'=>$obj
                );
           echo Vista::mostrar('genero/frmEditar.php',$datos1);
            }
    }
    public function getGenerosSelect(){
        $obj = new Genero();
        $datos = $obj->leer()['data'];
        $html = '<option value="0">Seleccionar...</option>';
        foreach ($datos as $g) {
            $html .= '<option value="'.$g['idgeneros'].'">'.$g['generos'].'</option>';
        }
        echo $html;
    }
    public function reporte(){
        $obj = new Genero();
        $resultado = $obj->leer();

        if(isset($_GET['app'])){
            switch ($_GET['app']) {
                case 'excel':
                    $datos=array(
                        'app'=>'excel',
                        'filename'=>'Generos.xls',
                        'data'=>$resultado['data']
                    );
                    break;
                
                default:
                    $datos=array(
                        'app'=>'word',
                        'filename'=>'Generos.doc',
                        'data'=>$resultado['data']
                    );
                    break;
            }
            
            Vista::mostrar('genero/reporte.php',$datos);
        }
        
    }

}