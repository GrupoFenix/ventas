<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Editorial extends Modelo {
    private $_ideditoriales;
    private $_editoriales;
    private $_tabla="editoriales";
    private $_bd;

    public function __construct($ideditoriales=null, $editoriales=null){
        $this->_bd = new BaseDeDatos(new MySQL());
        $this->_ideditoriales = $ideditoriales;
        $this->_editoriales= $editoriales;
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_tabla .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_tabla 
            . " WHERE ideditoriales=".$this->_ideditoriales;
        
        $datos= $this->_bd->ejecutar($sql);  
        //var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_ideditoriales = $datos['data'][0]["ideditoriales"];
            $this->_editoriales = $datos['data'][0]["editoriales"];  
        }
        
        return $datos; 
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE ideditoriales=".$this->_ideditoriales;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla 
            . " SET editoriales='".$this->_editoriales."'"
            ." WHERE ideditoriales=".$this->_ideditoriales;
        return $this->_bd->ejecutar($sql);
    }

    public function nuevo(){
        $sql = "INSERT INTO ". $this->_tabla 
            ." (ideditoriales, editoriales) VALUES (".
                $this->_ideditoriales .",'". $this->_editoriales ."'"
            .");";
        return $this->_bd->ejecutar($sql);
    }
    public function getId(){
        return $this->_ideditoriales;
    }
    public function getEditorial(){
        return $this->_editoriales;
    }
}
