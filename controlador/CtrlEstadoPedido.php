<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'EstadoPedido.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlAutor
*/
class CtrlEstadoPedido extends Controlador {

    public function index($msg=''){
        # Mostramos los datos
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new EstadoPedido();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Estado Pedido de Libros",
            'contenido'=>Vista::mostrar('estadopedido/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        $this->mostrarVista('template.php',$datos);
    }

    public function eliminar(){
        if (isset($_REQUEST['idestadopedido'])) {
            $obj = new EstadoPedido($_REQUEST['idestadopedido']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $obj = new EstadoPedido (
                $_POST["idestadopedido"],
                $_POST["estadoped"],
                $_POST["fechaactualizacion"],
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        //var_dump($_REQUEST);
        $obj = new EstadoPedido (
                $_POST["idestadopedido"],
                $_POST["estadoped"],
                $_POST["fechaactualizacion"],
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
        //var_dump($sql);
    }   
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Actualice el Estado Pedido de la Tienda');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlEstadoPedido'=>'Listado',
            '#'=>'Nuevo'
        );
        $datos1=array(
            'encabezado'=>'Nuevo Estado de Pedido'
            );

        $datos = array(
                'titulo'=>'Nuevo Estado de Pedido',
                'contenido'=>Vista::mostrar('estadopedido/frmNuevo.php',$datos1,true),
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
            'cuerpo'=>'Iniciando edición de: '.$_REQUEST['idestadopedido']);
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlEstadoPedido'=>'Listado',
            '#'=>'Editar',
        );
        if (isset($_REQUEST['idestadopedido'])) {
            $obj = new EstadoPedido($_REQUEST['idestadopedido']);
            $miObj = $obj->leerUno();
            // var_dump($obj->leerUno());exit();
            if (is_null($miObj['data'])) {
                $this->index(array(
                    'titulo'=>'Error',
                    'cuerpo'=>'ID Requerido: '.$_REQUEST['idestadopedido']. ' No Existe')
                );
            }else{
                $datos1 = array(
                    'estadopedido'=>$obj
                );
            $datos = array(
                'titulo'=>'Editando Estado de Pedido: '. $_REQUEST['idestadopedido'],
                'contenido'=>Vista::mostrar('estadopedido/frmEditar.php',$datos1,true),
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
                'titulo'=>'Actualizando Estado de Pedido... DESCONOCIDO',
                'contenido'=>'...El Id a Editar es requerido',
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>$msg);
        }
        $this->mostrarVista('template.php',$datos);
    }
}