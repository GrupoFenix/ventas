<?php 
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

    // Validar que venga de petición post 
class Contacto extends Modelo{
    private $_id; #Clave Primaria}
    private $_nombre;
    private $_apellido;
    private $_correo;
    private $_sexo;
    private $_mensaje;   
    private $_fecha;
    private $_tabla="contactanos";
    private $_bd;
    
    #constrcutor
    public function __construct($id=null,$nombre="",$apellido="",$correo="",$sexo="",$mensaje="",$fecha=""){
        $this->_id = $id;
        $this->_nombre = $nombre;
        $this->_apellido = $apellido;
        $this->_correo = $correo;
        $this->_sexo = $sexo;
        $this->_mensaje = $mensaje;
        $this->_fecha = $fecha;
        $this->_bd = new BaseDeDatos(new MySQL());
    }

    public function nuevo(){
        $sql = "INSERT INTO " .$this->_tabla
        ." ( nombre, apellido, correo, sexo, mensaje, fecha) VALUES ('". $this->_nombre ."','".
        $this->_apellido ."','". $this->_correo ."','".
        $this->_sexo ."','". $this->_mensaje ."','". $this->_fecha ."'"
        .");";

        return $this->_bd->ejecutar($sql);
    }

    public function eliminar(){
        $sql ="DELETE FROM ". $this->_tabla
             . " WHERE id=".$this->_id;
        return $this->_bd->ejecutar($sql);
    }

    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
    public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE id=".$this->_id;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_id = $datos['data'][0]["id"];
            $this->_nombre = $datos['data'][0]["nombre"];  
            $this->_apellido = $datos['data'][0]["apellido"]; 
            $this->_correo = $datos['data'][0]["correo"]; 
            $this->_sexo = $datos['data'][0]["sexo"]; 
            $this->_mensaje = $datos['data'][0]["mensaje"]; 
            $this->_fecha = $datos['data'][0]["fecha"];
        }
        
        return $datos; 
    }
  
    public function getId(){ 
        return $this->_id; 
    } 
    public function getNombre(){ 
        return $this->_nombre; 
    } 
    public function getApellido(){ 
        return $this->_apellido; 
    } 
    public function getCorreo(){ 
        return $this->_correo; 
    } 
    public function getSexo(){ 
        return $this->_sexo; 
    } 
    public function getMensaje(){ 
        return $this->_mensaje; 
    } 
    public function getFecha(){
        return $this->_fecha;
    }
}
