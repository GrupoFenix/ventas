<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Libro.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Boleta.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';

/*
* Clase CtrlBoleta
*/
class CtrlBoleta extends Controlador {
    
    public function index($msg=array('titulo'=>'','cuerpo'=>'')){
        # Mostramos los datos
        if(!isset($_SESSION['nombre'])){
            header("Location: ?");
            exit();
        }
        $menu = Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Listado'
        );

        $obj = new Boleta();
        $resultado = $obj->leer();
        $miboleta= $obj->Boletacli();

        $datos = array(
            'titulo'=>"Boletas",
            'contenido'=>Vista::mostrar('boleta/mostrar.php',$resultado,true),
            'cliente'=>Vista::mostrar('boleta/mostrarcliente.php',$miboleta,true),
            'visitante'=>Vista::mostrar('boleta/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    
    public function eliminar(){
        if (isset($_REQUEST['idboletas'])) {
            $obj = new Boleta($_REQUEST['idboletas']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else 
            echo "...El Id a ELIMINAR es requerido";
    }
    public function guardarNuevo() {
        $obj = new Libro();
            
        $data=$obj->getLibrosCarrito();
        $total=0;
        $datosDetalle=null;
        //var_dump($data);exit(); 
        foreach ($data['data'] as $p) {
            $cant = $_SESSION['carrito']->getCantidad($p['idlibros']);
            $precio_unitario = $p['precio_unitario'];
            $subTotal = $cant * $precio_unitario;
            $datosDetalle[]=array(
                'cantidad'=>$cant,
                'precio_unitario'=>$precio_unitario,
                'subtotal'=>$subTotal,
                'idlibros'=>$p['idlibros']
                );
            $total += $cant * $precio_unitario;
        }
        $obj = new Boleta();
        $obj->nuevo($total, $_SESSION['idclientes'],$datosDetalle);

        $this->registrarCompra();
    }

    public function registrarCompra(){
        $obj = new Boleta();
        $data=$obj->getUltimaBoletaCliente($_SESSION['idclientes']);

        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        // $datosGraf= $this->getGraficoModelosXMarcas();
        unset($_SESSION['carrito']);
        
        $datos = array(
            'titulo'=>"Registro de Compra realizada",
            'contenido'=>Vista::mostrar('boleta/registroCompra.php',$data,true),
            'cliente'=>Vista::mostrar('boleta/registroCompra.php',$data,true),
            'visitante'=>Vista::mostrar('boleta/registroCompra.php',$data,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                    'titulo'=>'',
                    'cuerpo'=>''
            ),
            'data'=>null,
            'grafico'=>null
        );
        
        $this->mostrarVista('template.php',$datos);

    }
    public function guardarEditar(){
        $obj = new Boleta (
                $_POST["idboletas"], 
                $_POST["nombres"],
                $_POST["numero"],
                $_POST["fecha"],
                $_POST["total"],
                );
        $respuesta=$obj->editar();

        $this->index($respuesta['msg']);
    }
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nueva Boleta');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlBoleta'=>'Listado',
            '#'=>'Nuevo',
        );
        $obj = new Boleta();
        $datos1=array(
            'encabezado'=>'Nueva Boleta',
            'boleta'=>$obj
            );
        
        $datos = array(
                'titulo'=>'Nueva Boleta',
                'contenido'=>Vista::mostrar('boleta/frmNuevo.php',$datos1,true),
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
           'cuerpo'=>'Iniciando edición para: '.$_REQUEST['idboletas']);
       $migas = array(
           '?'=>'Inicio',
           '?ctrl=CtrlBoleta'=>'Listado',
           '#'=>'Editar',
       );
       if (isset($_REQUEST['idboletas'])) {
           $obj = new Boleta($_REQUEST['idboletas']);
           $miObj = $obj->leerUno();
           if (is_null($miObj['data'])) {
               $this->index(array(
                   'titulo'=>'Error',
                   'cuerpo'=>'ID Requerido: '.$_REQUEST['idboletas']. ' No Existe')
               );
           }else{

               $datos1 = array(
                       'boleta'=>$obj
                   );

               $datos = array(
                   'titulo'=>'Editando Boletas: '. $_REQUEST['idboletas'],
                   'contenido'=>Vista::mostrar('boleta/frmEditar.php',$datos1,true),
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
               'titulo'=>'Editando Boleta... DESCONOCIDO',
               'contenido'=>'...El Id a Editar es requerido',
               'menu'=>$menu,
               'migas'=>$migas,
               'msg'=>$msg);
       }
       
       $this->mostrarVista('template.php',$datos);
    }
    public function imprimir(){
        $obj = new Boleta();
        $data=$obj->getUltimaBoletaDetalleCliente($_SESSION['idclientes']);
        Vista::mostrar('boleta/boleta.php',$data);
    }
    public function imprimirBoleta(){
        $id= $_GET['id'];
        $obj = new Boleta($id);
        $data=$obj->getBoleta();
        Vista::mostrar('boleta/boleta.php',$data);
    }

    
}