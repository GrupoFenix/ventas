<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Perfil extends Modelo { 
    private $_id; #Clave Primaria}
    private $_perfil;
    private $_tabla="perfiles";
    private $_bd;

    #Contructor
    public function __construct($id=null,$perfil=""){
        $this->_id = $id;
        $this->_perfil = $perfil;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla
        ." (idperfil, perfil) VALUES (".
            $this->_id . ",'". $this->_perfil ."'"
        .");";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". $this->_tabla
             . " WHERE idperfil=".$this->_id;
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET perfil='".$this->_perfil."'"
            ." WHERE idperfil=".$this->_id;
        return $this->_bd->ejecutar($sql);
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idperfil=".$this->_id;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_id = $datos['data'][0]["idperfil"];
            $this->_perfil = $datos['data'][0]["perfil"];  
        }
        
        return $datos; 
    }
    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_id; 
    } 
    public function getPerfil(){ 
        return $this->_perfil; 
    } 
}