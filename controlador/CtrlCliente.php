<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Cliente.php';
require_once MOD . DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
/*
* Clase CtrlCliente
*/
class CtrlCliente extends Controlador {
    public function index($msg=null){
        # Mostramos los datos
        $menu = Libreria::getMenu();

        $obj = new Cliente();
        $resultado = $obj->leer();
        $msg = ($msg==null)?$this->_getMsg():$msg;
        $datos = array(
            'titulo'=>"Clientes",
            'contenido'=>Vista::mostrar('cliente/mostrar.php',$resultado,true),
            'cliente'=>Vista::mostrar('segundario.php',$resultado,true),
            'visitante'=>Vista::mostrar('segundario.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$this->_getMigas(),
            'msg'=>$msg
        );
        //var_dump($resultado);exit();
        
        $this->mostrarVista('template.php',$datos);
    }

    public function eliminar(){
        if (isset($_REQUEST['idclientes'])) {
            $obj = new Cliente($_REQUEST['idclientes']);
            $resultado=$obj->eliminar();
            $this->index($resultado['msg']);
        } else {
            echo "...El Id a ELIMINAR es requerido";
        }
    }
    public function guardarNuevo(){
        $obj = new Cliente (
                $_POST["idclientes"],
                $_POST["perfil"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["direccion"],
                $_POST["dni"],
                $_POST["email"],
                $_POST["telefono"],
                $_POST["login"],
                $_POST["pasword"],
                $_POST["fechaalta"],
                $_POST["estado"],
                $_POST["codigo"],
            ); 
            if (isset($obj)) {
                include 'vista/email.php';
                if ($enviado){
                    $respuesta=$obj->nuevo();
                    // Function call
                    $this->mensaje("Por favor revisa tu email para verificar tu cuenta");
                    $this->index();
                }else {
                    echo "No se pudo enviar el Email";
                 }
            }
    }
    public function guardarEditar(){
        $obj = new Cliente (
                $_POST["idclientes"],
                $_POST["perfil"],
                $_POST["nombre"],
                $_POST["apellido"],
                $_POST["direccion"],
                $_POST["dni"],
                $_POST["email"],
                $_POST["telefono"],
                $_POST["login"],
                $_POST["pasword"],
                $_POST["fechaalta"],
                );
        $respuesta=$obj->editar();
        $this->index($respuesta['msg']);
    }   
    public function nuevo(){
        $menu = Libreria::getMenu();
    
        $obj = new Cliente();
        $datos1=array(
            'encabezado'=>'Nuevo Cliente',
            'clientes'=>$obj
            );

        $datos = array(
                'titulo'=>'Nuevo Cliente',
                'contenido'=>Vista::mostrar('cliente/frmNuevo.php',$datos1,true),
                'visitante'=>Vista::mostrar('plantilla/Confirmar.php',$datos1,true),
                'menu'=>$menu,
                'migas'=>$this->_getMigas('nuevo'),
                'msg'=>$this->_getMsg('Nuevo...','Ingrese información para nueva Cliente'),
                'js'=>$jsVista
            );
        $this->mostrarVista('template.php',$datos);
    }
    public function editar(){
       #Mostramos el Formulario de Editar
       $menu = Libreria::getMenu();
       $jsVista = array(
               array(
               'url'=>'recursos/js/jsPais.js'
               )
           );
       if (isset($_REQUEST['idclientes'])) {
           $obj = new Cliente($_REQUEST['idclientes']);
           $miObj = $obj->leerUno();
           if (is_null($miObj['data'])) {
               $this->index($this->_getMsg('Error',
                       'ID Requerido: '.$_REQUEST['idclientes']. ' No Existe')
                   );
           }else{
               $datos1 = array(
                       'clientes'=>$obj
                   );

               $datos = array(
                   'titulo'=>'Editando Cliente: '. $_REQUEST['idclientes'],
                   'contenido'=>Vista::mostrar('cliente/frmEditar.php',$datos1,true),
                   'menu'=>$menu,
                   'migas'=>$this->_getMigas('editar'),
                   'msg'=>$this->_getMsg('Editando...','Iniciando edición para: '.$_REQUEST['idclientes']),
                   'js'=>$jsVista
               );
           }
       }else {
           $datos = array(
               'titulo'=>'Editando Cliente... DESCONOCIDO',
               'contenido'=>'...El Id a Editar es requerido',
               'menu'=>$menu,
               'migas'=>$this->_getMigas('editar'),
               'msg'=>$this->_getMsg('Error','No se encontró al ID requerido')
           );
       }
       
       $this->mostrarVista('template.php',$datos);
   }
    private function _getMigas($operacion=null)     {
        $retorno=null;
        switch ($operacion) {
            case 'nuevo':
                $retorno = array(
                    '?'=>'Inicio',
                    '?ctrl=CtrlCliente'=>'Listado',
                    '#'=>'Nuevo',
                );
                break;
            case 'editar':
                $retorno = array(
                    '?'=>'Inicio',
                    '?ctrl=CtrlCliente'=>'Listado',
                    '#'=>'Editar',
                );
                break;
            
            default:
                $retorno = array(
                    '?'=>'Inicio',
                );
                break;
        }
        return $retorno;
    }
    private function _getMsg($titulo=null,$msg=null){
        return array(
            'titulo'=>$titulo,
            'cuerpo'=>$msg
        );
    }
    public function validar(){
        if (isset($_POST['usuario']) && isset($_POST['clave'])) {
            $obj = new Cliente();
            $obj->setLogin($_POST['usuario']);
            $obj->setClave($_POST['clave']);
            
            $datos=$obj->validar($_POST['usuario'],$_POST['clave']);
            //var_dump($datos);exit();
            if (isset($datos['data']))
                if($datos['data']!=null){
                    $_SESSION['nombre']=$datos['data'][0]['nombre'] .' '. $datos['data'][0]['apellidos'];
                    $_SESSION['apellido']=$datos['data'][0]['apellido'];
                    $_SESSION['email']=$datos['data'][0]['email'];
                    $_SESSION['perfil']= $datos['data'][0]["idperfil"];
                    $_SESSION['login']= $datos['data'][0]['login'];   
                    $_SESSION['idclientes']=$datos['data'][0]['idclientes'];
                    $_SESSION['dni']=$datos['data'][0]['dni'];
                    $_SESSION['direccion']= $datos['data'][0]['direccion']; 
                    $_SESSION['url']= $datos['data'][0]['url']; 
                    $_SESSION['fecha']= $datos['data'][0]['fechaalta'];
                }else {
                    $this->mensaje("Código incorrecto, Inténtelo nuevamente");
                }
        }
        header("Location: ?");
        exit();
    }
    public function cerrarSesion()     {
        session_destroy();
        header("Location: ?");
        exit();
    }
    public function perfil($msg=null)     {
        $menu= Libreria::getMenu();
        
        $obj = new Cliente();
        $resultado = $obj->leer();
        $msg = ($msg==null)?$this->_getMsg():$msg;
        $datos = array(
            'titulo'=>"Perfil",
            'contenido'=>Vista::mostrar('cliente/perfil.php',$resultado,true),
            'cliente'=>Vista::mostrar('cliente/perfil.php',$resultado,true),
            'menu'=>$menu,
            'migas'=>$this->_getMigas(),
            'msg'=>$msg
        );
        
        $this->mostrarVista('template.php',$datos);
    }
    public function Confirmar(){
        $menu = Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        $obj = new Cliente();

        $datos = array(
                'visitante'=>Vista::mostrar('plantilla/Confirmar.php','',true),
                'menu'=>$menu,
                'migas'=>$migas,
                'msg'=>array(
                        'titulo'=>'',
                        'cuerpo'=>''
                    )
            );
        $this->mostrarVista('template.php',$datos);
    }
    public function GuardarCodigo(){
        $obj = new Cliente (
                $_POST["email"],
                $_POST["codigo"],
            ); 
            if (isset($obj)) {
                $respuesta=$obj->verificarcodigo();
                //var_dump($respuesta);exit();
                if ($respuesta['data']!=null){
                    $respuesta=$obj->CambiarEstado();
                    
                    // Function call
                    $this->mensaje("Bienvenido a la Familia Fénix, ahora puedes iniciar sesión");
                    $this->index($respuesta['msg']);
                }else {
                    
                    // Function call
                    $this->mensaje("Código incorrecto, Inténtelo nuevamente");
                    $this->Confirmar();
                    
                 }
            }  
    }
    
    function mensaje($message) {
        echo "<script>alert('$message');</script>";
    }
}