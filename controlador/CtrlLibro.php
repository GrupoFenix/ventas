<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Libro.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase Ctrl Libro(Producto)
*/
class CtrlLibro extends Controlador {
    public function index($msg=array('titulo'=>'','cuerpo'=>'')){
        # Mostramos los datos
        $menu = Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );

        $obj = new Libro();
        $resultado = $obj->leer();

        $datos = array(
            'titulo'=>"Libros",
            'contenido'=>Vista::mostrar('libro/mostrar.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }

    public function eliminar(){
        if (isset($_REQUEST['idlibros'])) {
            $obj = new Libro($_REQUEST['idlibros']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){

        $obj = new Libro (
                $_POST["idlibros"],
                $_POST["generos"],
                $_POST["titulo"],
                $_POST["descripcion"],
                $_POST["precio_unitario"],
                $_POST["añopublicacion"],
                $_POST["stock"], 
                $_POST['url'],        
                );
        $respuesta=$obj->nuevo();
        $this->index($respuesta['msg']);
    }
    public function guardarEditar(){
        $obj = new Libro (
                $_POST["idlibros"],
                $_POST["generos"],
                $_POST["titulo"],
                $_POST["descripcion"],
                $_POST["precio_unitario"],
                $_POST["añopublicacion"],
                $_POST["stock"], 
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
    }   
    public function nuevo(){
        $menu = Libreria::getMenu();
        $msg= array(
            'titulo'=>'Nuevo...',
            'cuerpo'=>'Ingrese información para nuevo Libro');
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlLibro'=>'Listado',
            '#'=>'Nuevo',
        );
        $obj = new Libro();
        $datos1=array(
            'encabezado'=>'Nuevo Libro',
            'libros'=>$obj
            );
        
        $datos = array(
                'titulo'=>'Nuevo Libro',
                'contenido'=>Vista::mostrar('libro/frmNuevo.php',$datos1,true),
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
           'cuerpo'=>'Iniciando edición para: '.$_REQUEST['idlibros']);
       $migas = array(
           '?'=>'Inicio',
           '?ctrl=CtrlLibro'=>'Listado',
           '#'=>'Editar',
       );
       if (isset($_REQUEST['idlibros'])) {
           $obj = new Libro($_REQUEST['idlibros']);
           $miObj = $obj->leerUno();
           if (is_null($miObj['data'])) {
               $this->index(array(
                   'titulo'=>'Error',
                   'cuerpo'=>'ID Requerido: '.$_REQUEST['idlibros']. ' No Existe')
               );
           }else{

               $datos1 = array(
                       'libros'=>$obj
                   );

               $datos = array(
                   'titulo'=>'Editando Libro: '. $_REQUEST['idlibros'],
                   'contenido'=>Vista::mostrar('libro/frmEditar.php',$datos1,true),
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
               'titulo'=>'Editando Libro... DESCONOCIDO',
               'contenido'=>'...El Id a Editar es requerido',
               'menu'=>$menu,
               'migas'=>$migas,
               'msg'=>$msg);
       }
       
       $this->mostrarVista('template.php',$datos);
    }
    public function getibrosSelect(){
        $idlibros = $_GET['idlibros'];
        $obj = new Producto();
        $datos = $obj->leerXGenero($idgeneros)['data'];
        $html = '<option value="0">Seleccionar...</option>';
        foreach ($datos as $l) {
            $html .= '<option value="'.$l['idlibros'].'">'.$l['titulo'].'</option>';
        }
        echo $html;

    }
    public function getCatalogo(){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Catálogo',
        );

        $obj = new Libro();
        $resultado = $obj->leer();
        
        $msg=(!isset($_GET['idlibros']))?array('titulo'=>'','cuerpo'=>''):array('titulo'=>'Nuevo elemento','cuerpo'=>'Se agregó un elemento al Carrito');
        $datos = array(
            'titulo'=>"Catálogo",
            'contenido'=>Vista::mostrar('libro/catalogo.php',$resultado,true),
            'cliente'=>Vista::mostrar('libro/catalogo.php',$resultado,true),
            'visitante'=>Vista::mostrar('libro/catalogo.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function verDetalles(){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '?ctrl=CtrlLibro&accion=getCatalogo'=>'Catálogo',
            '#'=>'Detalles',
        );
        $idlibros = $_GET['idlibros'];
        $jsVista = array(
                array(
                'url'=>'recursos/js/jsImagenes.js'
                )
            );

        $obj = new Libro($idlibros);
        $resultado = $obj->getDetalles();

        $msg=array('titulo'=>'','cuerpo'=>'');
        $datos = array(
            'titulo'=>"Detalles",
            'contenido'=>Vista::mostrar('libro/detalles.php',$resultado,true),
            'cliente'=>Vista::mostrar('libro/detalles.php',$resultado,true),
            'visitante'=>Vista::mostrar('libro/detalles.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg,
            'js'=>$jsVista
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function verDescripcion(){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio', 
            '?ctrl=CtrlLibro&accion=getInfo'=>'Catálogo',
            '#'=>'Detalles',
        );
        $idlibros = $_GET['idlibros'];
        $jsVista = array(
                array(
                'url'=>'recursos/js/jsImagenes.js'
                )
            );

        $obj = new Libro($idlibros);
        $resultado = $obj->getInfo();
        var_dump($resultado);exit();
       /* $msg=array('titulo'=>'','cuerpo'=>'');
        $datos = array(
            'titulo'=>"Detalles",
            'contenido'=>Vista::mostrar('libro/descripcion.php',$resultado,true),
            'cliente'=>Vista::mostrar('libro/descripcion.php',$resultado,true),
            'visitante'=>Vista::mostrar('libro/descripcion.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg,
            'js'=>$jsVista
        );
        
        $this->mostrarVista('template.php',$datos);
        */
    }
    public function leerlibro(){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
            '#'=>'Catálogo',
        );

        $obj = new Libro();

        $resultado = $obj->leerXGenero($_GET['g']);
        
        $msg=(!isset($_GET['idlibros']))?array('titulo'=>'','cuerpo'=>''):array('titulo'=>'Nuevo elemento','cuerpo'=>'Se agregó un elemento al Carrito');
        $datos = array(
            'titulo'=>"Catálogo",
            'contenido'=>Vista::mostrar('libro/catalogo.php',$resultado,true),
            'cliente'=>Vista::mostrar('libro/catalogo.php',$resultado,true),
            'visitante'=>Vista::mostrar('libro/catalogo.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function hola(){
        echo 'hola';
    }
}