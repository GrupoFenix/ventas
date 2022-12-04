<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "Autor.php";
require_once "Libro.php";

class AutorLibro extends Modelo { 
    private $_fullnombres; #clave foranea
    private $_titulo; #Clave forànea}
    private $_tabla="autorlibro";
    private $_vista="v_autorlibro";
    private $_bd;
    #Contructor
    public function __construct($fullnombres=null, 
                $titulo=null){
        $this->_fullnombres = new Autor($fullnombres);
        $this->_titulo = new Libro($titulo);
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    #implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql ="INSERT INTO ". $this->_tabla
        ."(idautores, idlibros) VALUES (".
            $this->_fullnombres->getId() . ",'"
            .$this->_titulo->getId().""
        ."');"; 
       
        return $this->_bd->ejecutar($sql);
        //var_dump($sql); exit();
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idautores=".$this->_fullnombres->getId().
            " and idlibros=".$this->_titulo->getId();
        return $this->_bd->ejecutar($sql); 
        //var_dump($sql);exit();   
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET idautores=".$this->_fullnombres->getId().
            " and idlibros=".$this->_titulo->getId();
           
        return $this->_bd->ejecutar($sql); 
        //var_dump($sql); exit();
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista
            . " WHERE 1";
        
        $datos= $this->_bd->ejecutar($sql);  
        // var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_fullnombres = new Autor ($datos['data'][0]["idautores"]);
            $this->_titulo = new Libro ($datos['data'][0]["idlibros"]);
        }
    
        return $datos; 
    }

    #Devolvemos las propiedades 
    public function getAutor(){ #de la relacion con tipo cliente 
        return $this->_fullnombres; 
    } 
    public function setAutor(Autor $a){
        $this->_fullnombres= $a;
    }
    public function getLibro(){ #de la relacion con estado de cuenta
        return $this->_titulo; 
    } 
    public function setLibro(Libro $l){
        $this->_libro= $l;
    }

}
?>