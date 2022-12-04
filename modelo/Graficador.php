<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Modelo.php';
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";

class Graficador extends Modelo {
    private $_bd;
    public function __construct() {
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    public function getLibrosxGeneros(){
        $sql = "SELECT * FROM `graf_librosxgeneros`"; 
        $datos = $this->_bd->ejecutar($sql);
        return $this->getArray($datos['data']);
    }
    
    public function getventasxgeneros(){
        $sql= "call ventasXGeneroFecha(2022,11,18);";
        $datos = $this->_bd->ejecutar($sql);
        return $this->getArray($datos['data']);
    }

    public function getLibrosxStock(){
        $sql = "SELECT * FROM `stocklibros`"; 
        $datos = $this->_bd->ejecutar($sql);
        return $this->getArray($datos['data']);
    }
    
    private function getArray($datos){
        $labels=null;
        $data=null;
        foreach ($datos as $d) {
            $labels[]=$d['fila'];
            $data[]=$d['columna'];
        }
        return array('labels'=>$labels,'data'=>$data);
    }
    public function visitas(){
        $ip= $_SERVER['REMOTE_ADDR'];
        echo $ip;
        $sql= $con->query("SELECT * FROM contador WHERE ip = '$ip' ORDER BY id desc");
        return $this->_bd->ejecutar($sql); 
        $contarsql= $sql->num_rows;

        if ($contarsql == 0) {
            $sqlinsert= $con->query("INSERT INTO contador (ip, fecha) VALUES ('$ip',now())");
            return $this->_bd->ejecutar($sqlinsert); 
        } else {
            $row = $sql->fetch_array();
            $fechaRegistro = $row['fecha'];
            $fechaActual = date("Y-m-d H:i:s");
            $nuevaFecha = strtotime($fechaRegistro."+ 1 hour");
            $nuevaFecha = date("Y-m-d H:i:s",$nuevaFecha);
            if ($fechaActual >= $nuevaFecha) {
                $sqlinsert= $con->query("INSERT INTO contador (ip, fecha) VALUES ('$ip',now())");
                return $this->_bd->ejecutar($sqlinsert); 
            }
        }
        $visitas = $con->query("SELECT * FROM contador");
        return $this->_bd->ejecutar($visitas); 
        $contar = $visitas->num_rows;

        echo $contar;
    }

}


/*PROBANDO CODIGO. SOLO INSTRUCTIVO
$a!=$B
!isset($a)*/