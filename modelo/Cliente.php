<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "Perfil.php";

class Cliente extends Modelo { 
    private $_idclientes; #Clave Primaria}
    private $_nombre;
    private $_apellido;
    private $_direccion;
    private $_dni;
    private $_email;
    private $_telefono;
    private $_login;
    private $_clave;
    private $_fechaalta;
    private $_perfil;
    private $_estado;
    private $_codigo;
    private $_tabla="clientes";
    private $_vista="v_clientes";
    private $_bd;
    #Contructor
    public function __construct($idclientes=null, 
    $perfil="", $nombre="", $apellido="", $direccion="",$dni="",$email="",$telefono="", $login=null, $clave=null,$fechaalta="", $estado="", $codigo=""){
        $this->_idclientes = $idclientes;
        $this->_perfil = new Perfil($perfil);
        $this->_nombre= $nombre;
        $this->_apellido= $apellido;
        $this->_direccion= $direccion;
        $this->_dni= $dni;
        $this->_email= $email;
        $this->_telefono= $telefono;
        $this->_login= $login;
        $this->_clave= $clave;
        $this->_fechaalta= $fechaalta;
        $this->_estado= $estado;
        $this->_codigo= $codigo;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    #implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql ="INSERT INTO ". $this->_tabla
        ."(idperfil, nombre, apellido, direccion, dni, email, telefono, login, pasword, fechaalta, estado, codigo) VALUES (".
        $this->_perfil->getId().",'".$this->_nombre ."','". $this->_apellido ."','".
        $this->_direccion ."','". $this->_dni ."','".
        $this->_email ."','". $this->_telefono ."','".
        $this->_login ."','". $this->_clave ."','".
        $this->_fechaalta ."','". $this->_estado ."','". 
        $this->_codigo ."'"
        .");"; 
        //var_dump($sql);exit();
        return $this->_bd->ejecutar($sql);
        //var_dump($sql); exit();
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idclientes=".$this->_idclientes;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET nombres='".$this->_nombres."',"
            ."idtipos_clientes=". $this->_tipocliente->getId().","
            ."apellidos='". $this->_apellidos."',"
            ."direcciones='". $this->_direcciones."',"
            ."dni='". $this->_dni."',"
            ."ruc='". $this->_ruc."',"
            ."correoelectronico='". $this->_correoelectronico."',"
            ."contraseñas='". $this->_contraseñas."'"
            ." WHERE idclientes=".$this->_idclientes.";";
           
        return $this->_bd->ejecutar($sql); 
        //var_dump($sql); exit();
    }
    public function editarPerfil(){
        $sql ="UPDATE ". $this->_tabla
            . " SET url='".$this->_url."'"
            ." WHERE idclientes=".$this->_idclientes.";";
           
        return $this->_bd->ejecutar($sql); 
        //var_dump($sql); exit();
    }
    public function UltimaCompra(){
        $sql = "SELECT MAX(v_boletas.fecha) as ultimacompra FROM `v_boletas` WHERE nombrecli='". $_SESSION['nombre']."'";
        return $this->_bd->ejecutar($sql);
    }
    public function verificarcodigo(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE email='". $_POST['email'] ."' and codigo='". $_POST['codigo'] . "'";
        return $this->_bd->ejecutar($sql);    
    }
    public function CambiarEstado(){
        $sql= "UPDATE ". $this->_tabla 
            . " SET estado= '1' WHERE email='".$_POST['email']."' and codigo='". $_POST['codigo'] . "'";
        return $this->_bd->ejecutar($sql);    
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista;
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista
            . " WHERE idclientes=".$this->_idclientes;
        
        $datos= $this->_bd->ejecutar($sql);  
        // var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idclientes = $datos['data'][0]["idclientes"];
            $this->_perfil = new Perfil ($datos['data'][0]["idperfil"]);
            $this->_nombre = $datos['data'][0]["nombre"];
            $this->_apellido = $datos['data'][0]["apellido"];
            $this->_direccion = $datos['data'][0]["direccion"];
            $this->_dni = $datos['data'][0]["dni"];
            $this->_email = $datos['data'][0]["email"];
            $this->_telefono = $datos['data'][0]["telefono"];
            $this->_login = $datos['data'][0]["login"];
            $this->_clave = $datos['data'][0]["pasword"];
            $this->_fechaalta = $datos['data'][0]["fechaalta"];
        }
    
        return $datos; 
    }

    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_idclientes; 
    } 
    public function getNombre(){
        return $this->_nombre;
    }
    public function getApellido(){
        return $this->_apellido;
    }
    public function getDireccion(){
        return $this->_direccion;
    }
    public function getDNI(){
        return $this->_dni;
    }
    public function getRUC(){
        return $this->_ruc;
    }
    public function getCorreoElectronico(){
        return $this->_correoelectronico;
    }
    public function getContraseña(){
        return $this->_contraseñas;
    }
    public function validar($login,$clave){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE login='".$login ."' and pasword='".$clave ."'and estado='1'";
        
        return $this->_bd->ejecutar($sql);
    }
    public function setLogin($login){
        $this->_login=$login;
    }
    public function setClave($clave){
        $this->_clave=$clave;
    }
    public function getPerfil(){ #de la relacion con tipo cliente 
        return $this->_perfil; 
    } 
    public function setPerfil(Perfli $pf){
        $this->_perfil= $pf;
    }


}
?>
