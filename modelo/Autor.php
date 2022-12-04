<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Autor extends Modelo { 
    private $_idautores; #Clave Primaria}
    private $_fullnombres;
    private $_fechanac;
    private $_fechadef;
    private $_tabla="autores";
    private $_bd;
    #Contructor
    public function __construct($idautores=null,$fullnombres="",$fechanac="",$fechadef=""){
        $this->_idautores = $idautores;
        $this->_fullnombres = $fullnombres;
        $this->_fechanac = $fechanac;
        $this->_fechadef = $fechadef;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla
        ."(idautores, fullnombres, fechanac, fechadef) VALUES (".
            $this->_idautores . ",'". $this->_fullnombres ."','".
            $this->_fechanac ."','". $this->_fechadef ."'"
        .");";
        //var_dump($sql);exit();
        return $this->_bd->ejecutar($sql);
        
    }
    public function eliminar(){
        $sql ="DELETE FROM ". $this->_tabla
             ." WHERE idautores=".$this->_idautores;
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET fullnombres='".$this->_fullnombres."',"
            ."fechanac='". $this->_fechanac."',"
            ."fechadef='". $this->_fechadef."'"
            ." WHERE idautores=".$this->_idautores;
            //var_dump($sql);exit();
        return $this->_bd->ejecutar($sql);
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla
            . " WHERE idautores=".$this->_idautores;
        
        $datos= $this->_bd->ejecutar($sql);  
        if (is_array($datos['data'])){
            $this->_idautores = $datos['data'][0]["idautores"];
            $this->_fullnombres = $datos['data'][0]["fullnombres"];  
            $this->_fechanac = $datos['data'][0]["fechanac"];
            $this->_fechadef = $datos['data'][0]["fechadef"]; 
        }
        
        return $datos; 
    }
    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_idautores; 
    } 
    public function getFullNombres(){ 
        return $this->_fullnombres; 
    } 
    public function getFechaNac(){ 
        return $this->_fechanac; 
    } 
    public function getFechaDef(){ 
        return $this->_fechadef; 
    } 
}