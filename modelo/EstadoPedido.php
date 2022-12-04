<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class EstadoPedido extends Modelo { 
    private $_idestadopedido; #Clave Primaria}
    private $_estadoped;
    private $_fechaactualizacion;
    private $_tabla="estadopedido";
    private $_bd;
    #Contructor
    public function __construct($idestadopedido=null,$estadoped="",$fechaactualizacion=""){
        $this->_idestadopedido = $idestadopedido;
        $this->_estadoped = $estadoped;
        $this->_fechaactualizacion = $fechaactualizacion;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla
        ."(idestadopedido, estadoped, fechaactualizacion) VALUES (".
            $this->_idestadopedido . ",'". $this->_estadoped ."','".
            $this->_fechaactualizacion ."'"
        .");";
        //var_dump($sql);exit();
        return $this->_bd->ejecutar($sql);
        
    }
    public function eliminar(){
        $sql ="DELETE FROM ". $this->_tabla
             ." WHERE idestadopedido=".$this->_idestadopedido;
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET estadoped='".$this->_estadoped."',"
            ."fechaactualizacion='". $this->_fechaactualizacion."'"
            ." WHERE idestadopedido=".$this->_idestadopedido;
            //var_dump($sql);exit();
        return $this->_bd->ejecutar($sql);
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla
            . " WHERE idestadopedido=".$this->_idestadopedido;
        
        $datos= $this->_bd->ejecutar($sql);  
        if (is_array($datos['data'])){
            $this->_idestadopedido = $datos['data'][0]["idestadopedido"];
            $this->_estadoped = $datos['data'][0]["estadoped"];  
            $this->_fechaactualizacion = $datos['data'][0]["fechaactualizacion"];
        }
        
        return $datos; 
    }
    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_idestadopedido; 
    } 
    public function getEstadoPed(){ 
        return $this->_estadoped; 
    } 
    public function getFechaActualizacion(){ 
        return $this->_fechaactualizacion; 
    } 
}