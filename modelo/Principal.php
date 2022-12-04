<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Principal extends Modelo {
    private $_tabla="contador";
    private $_bd;

    public function __construct(){
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function getVisitantes(){
        $hoy = date('d-m-Y');
        $hoySegundos = strtotime($hoy."+ 1 hour");
        $semana = date('W',$hoySegundos);
        $sql= "CALL getVisitantes(47)";
        return $this->_bd->ejecutar($sql);
    }
    public function nuevo($ip){
        $sql= "INSERT INTO ". $this->_tabla
        ." (fecha, ip) VALUES (now(),'". $ip ."');";
        return $this->_bd->ejecutar($sql);
    }
    public function cantvisitas(){
        $sql = "SELECT * FROM `visitas`";
        return $this->_bd->ejecutar($sql);
    }
    public function cantboletas(){
        $sql = "SELECT * FROM `v_cantboletas`";
        return $this->_bd->ejecutar($sql);
    }
    public function cantclientes(){
        $sql = "SELECT * FROM `v_cantclientes`";
        return $this->_bd->ejecutar($sql);
    }
    public function cantclientesnull(){
        $sql = "SELECT * FROM `v_cantclientes1`";
        return $this->_bd->ejecutar($sql);
    }
    public function totalrecaudado(){
        $sql = "SELECT * FROM `totalrecaudado`";
        return $this->_bd->ejecutar($sql);
    }
       #suma del stock de todos los libros para saber la cantidad de productos totales de la tienda
    public function getstocktotal(){
        $sql = "SELECT SUM(libros.stock) as totalproductos FROM libros";
        return $this->_bd->ejecutar($sql);
    }
    public function getcantLibros(){
        $sql = "SELECT COUNT(idlibros) AS librosregister FROM libros";
        return $this->_bd->ejecutar($sql);
    }
    
}