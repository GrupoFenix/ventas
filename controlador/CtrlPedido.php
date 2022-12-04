<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Pedido.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlPedido
*/
class CtrlPedido extends Controlador {
    public function index($msg=''){
        # Mostramos los datos
        $menu = Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );

        $obj = new Pedido();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Pedidos",
            'contenido'=>Vista::mostrar('pedido/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }

    public function eliminar(){
        if (isset($_REQUEST['idpedidos'])) {
            $obj = new Pedido($_REQUEST['idpedidos']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $obj = new Pedido (
                $_POST["idpedidos"],
                $_POST["nombres"],
                $_POST["estadoped"],
                $_POST["fechapedido"],
                $_POST["fechaenvio"],           
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        $obj = new Pedido (
                $_POST["idpedidos"],
                $_POST["nombres"],
                $_POST["estadoped"],
                $_POST["fechapedido"],
                $_POST["fechaenvio"],
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
    }   
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo Pedido');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlPedido'=>'Listado',
            '#'=>'Nuevo',
        );
        $obj = new Pedido();
        $datos1=array(
            'encabezado'=>'Nuevo Pedido',
            'pedidos'=>$obj
            );
        
        $datos = array(
                'titulo'=>'Nuevo Pedido',
                'contenido'=>Vista::mostrar('pedido/frmNuevo.php',$datos1,true),
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
           'cuerpo'=>'Iniciando edición para: '.$_REQUEST['idpedidos']);
       $migas = array(
           '?'=>'Inicio',
           '?ctrl=CtrlPedido'=>'Listado',
           '#'=>'Editar',
       );
       if (isset($_REQUEST['idpedidos'])) {
           $obj = new Pedido($_REQUEST['idpedidos']);
           $miObj = $obj->leerUno();
           if (is_null($miObj['data'])) {
               $this->index(array(
                   'titulo'=>'Error',
                   'cuerpo'=>'ID Requerido: '.$_REQUEST['idpedidos']. ' No Existe')
               );
           }else{

               $datos1 = array(
                       'pedidos'=>$obj
                   );

               $datos = array(
                   'titulo'=>'Editando Pedido: '. $_REQUEST['idpedidos'],
                   'contenido'=>Vista::mostrar('pedido/frmEditar.php',$datos1,true),
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
               'titulo'=>'Editando Pedido... DESCONOCIDO',
               'contenido'=>'...El Id a Editar es requerido',
               'menu'=>$menu,
               'migas'=>$migas,
               'msg'=>$msg);
       }
       
       $this->mostrarVista('template.php',$datos);
    }
}