<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Genero extends Modelo { 
    private $_id; #Clave Primaria}
    private $_generos;
    private $_tabla="generos";
    private $_bd;

    #Contructor
    public function __construct($id=null,$generos=""){
        $this->_id = $id;
        $this->_generos = $generos;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla
        ." (idgeneros, generos) VALUES (".
            $this->_id . ",'". $this->_generos ."'"
        .");";
        return $this->_bd->ejecutar($sql);
    }
    public function eliminar(){
        $sql ="DELETE FROM ". $this->_tabla
             . " WHERE idgeneros=".$this->_id;
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET generos='".$this->_generos."'"
            ." WHERE idgeneros=".$this->_id;
        return $this->_bd->ejecutar($sql);
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";"; #sqlgeneros
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE idgeneros=".$this->_id;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_id = $datos['data'][0]["idgeneros"];
            $this->_generos = $datos['data'][0]["generos"];  
        }
        
        return $datos; 
    }
    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_id; 
    } 
    public function getGenero(){ 
        return $this->_generos; 
    } 
}