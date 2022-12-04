<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "Cliente.php";
require_once "EstadoPedido.php";

class Pedido extends Modelo { 
    private $_idpedidos; #Clave Primaria}
    private $_nombres; #objeto de tipo tipocliente
    private $_estadoped; #objeto de tipo estado
    private $_fechapedido;
    private $_fechaenvio;
    private $_tabla="pedidos";
    private $_vista="v_pedidos";
    private $_bd;
    #Contructor
    public function __construct($idpedidos=null, $nombres=null, $estadoped=null, $fechapedido="", $fechaenvio=""){
        $this->_idpedidos = $idpedidos;
        $this->_nombres = new Cliente($nombres);
        $this->_estadoped = new EstadoPedido($estadoped);
        $this->_fechapedido = $fechapedido;
        $this->_fechaenvio = $fechaenvio;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    #implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql ="INSERT INTO ". $this->_tabla
        ."(idpedidos, idclientes, idestadopedido, fechapedido, fechaenvio) VALUES (".
            $this->_idpedidos . ",". $this->_nombres->getId().",'"
            .$this->_estadoped->getId() ."','"
            .$this->_fechapedido ."','". $this->_fechaenvio 
        ."');"; 
        return $this->_bd->ejecutar($sql);
        //var_dump($sql); exit();
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idpedidos=".$this->_idpedidos;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET fechapedido='".$this->_fechapedido."',"
            ."idclientes=". $this->_nombres->getId().","
            ."idestadopedido=". $this->_estadoped->getId().","
            ."fechaenvio='". $this->_fechaenvio."'"
            ." WHERE idpedidos=".$this->_idpedidos.";";
           
        return $this->_bd->ejecutar($sql); 
        //var_dump($sql); exit();
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista
            . " WHERE idpedidos=".$this->_idpedidos;
        
        $datos= $this->_bd->ejecutar($sql);  
        // var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idpedidos = $datos['data'][0]["idpedidos"];
            $this->_nombres = new Cliente ($datos['data'][0]["idclientes"]);
            $this->_estadoped = new EstadoPedido ($datos['data'][0]["idestadopedido"]);
            $this->_fechapedido = $datos['data'][0]["fechapedido"];
            $this->_fechaenvio = $datos['data'][0]["fechaenvio"];
        }
    
        return $datos; 
    }

    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_idpedidos; 
    } 
    public function getFechaPedido(){
        return $this->_fechapedido;
    }
    public function getFechaEnvio(){
        return $this->_fechaenvio;
    }
    public function getCliente(){ #de la relacion con cliente 
        return $this->_nombres; 
    } 
    public function setCliente(Cliente $c){
        $this->_nombres= $c;
    }
    public function getEstadoPedido(){ #de la relacion con estado de cuenta
        return $this->_estadoped; 
    } 
    public function setEstadoPedido(EstadoPedido $ep){
        $this->_estadoped= $ep;
    }

}
?>
