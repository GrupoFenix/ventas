<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once MOD . DIRECTORY_SEPARATOR . "Cliente.php";
require_once MOD . DIRECTORY_SEPARATOR . "DetalleBoleta.php";

class Boleta extends Modelo {
    private $_idboletas;   # Nuestro (PK)
    private $_nombre; #Objeto de Cliente
    private $_numero;
    private $_fecha;
    private $_total;
    private $_detalles;
    private $_tabla="boletas";
    private $_vista="v_boletas";
    private $_bd;
    #Constructor
    public function __construct($idboletas=null, $nombre="", $numero="", $fecha="", $total=0){
        $this->_idboletas = $idboletas;
        $this->_nombre = $nombre;
        $this->_numero = $numero;
        $this->_fecha = $fecha;
        $this->_total = $total;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    #implementamos lo que dice la INTERFACE
    public function nuevo($total=0,$idCliente=1,$detalles=null){
        $sql ="INSERT INTO ". $this->_tabla
        ."( total, idclientes) VALUES (".
            $total*1.18 .",". $idCliente
            .");";
             
        $this->_bd->ejecutar($sql);

        foreach ($detalles as $d) {
            $sql = "INSERT INTO detalles_boletas" 
            ." (cantidad, precio_unitario, subtotal, idlibros) VALUES (".
                $d['cantidad'] .",". $d['precio_unitario'].",". $d['subtotal'].",". $d['idlibros']
            .");";
            //var_dump($sql);exit();
        $this->_bd->ejecutar($sql);
        }
       
    }
    public function eliminar(){
        $sql ="DELETE FROM ". $this->_tabla
             ." WHERE idboletas=".$this->_idboletas;
        return $this->_bd->ejecutar($sql);
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET numero='".$this->_numero."',"
            ."idclientes=". $this->_nombre->getId().","#posible falla, se podrìa colocar getNombre
            ."fecha='". $this->_fecha."',"
            ."total='". $this->_total."'"
            ." WHERE idboletas=".$this->_idboletas;
            //var_dump($sql); exit();
        return $this->_bd->ejecutar($sql);
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
    }
    ////PARA SABER CUANTAS BOLETAS TIENE X CLIENTE//////
    public function Boletacli(){
        $sql ="SELECT * FROM ". $this->_vista
             ." WHERE email='". $_SESSION['email']."'" ."GROUP BY v_boletas.numero ORDER BY idboletas ASC";
        return $this->_bd->ejecutar($sql);
    }
    public function getBoleta(){
        $sql ="SELECT * FROM ". $this->_vista
             ." WHERE idboletas=".$this->_idboletas;
        return $this->_bd->ejecutar($sql);
    }
  
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista
            . " WHERE idboletas=".$this->_idboletas;
        
        $datos= $this->_bd->ejecutar($sql);  
        // var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idboletas = $datos['data'][0]["idboletas"];
            $this->_nombre = new Cliente ($datos['data'][0]["idclientes"]);
            $this->_numero = $datos['data'][0]["numero"];
            $this->_fecha = $datos['data'][0]["fecha"];
            $this->_total = $datos['data'][0]["total"];
            $this->_igv = $datos['data'][0]["igv"];
        }
    
        return $datos; 
    }

    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_idboletas; 
    } 
    public function getNumero(){
        return $this->_numero;
    }
    public function getFecha(){
        return $this->_fecha;
    }
    public function getTotal(){
        return $this->_total;
    }
    public function getIGV(){
        return $this->_igv;
    }
    public function getCliente(){ #de la relacion con cliente 
        return $this->_nombre; 
    } 
    public function setCliente(Cliente $c){
        $this->_nombre= $c;
    }
    public function addDetalle(Detalle $d){
        $this->_detalles[]=$d;
    }
    public function getNombre(){
        return $this->_nombre;
    }
    public function getUltimaBoletaDetalleCliente($id)  {
        $sql = "SELECT * FROM `v_boletas` WHERE idboletas=idBoletaCliente(".$id.")";
        return $this->_bd->ejecutar($sql);
    }
    public function getUltimaBoletaCliente($id)  {
        $sql = "SELECT * FROM ". $this->_tabla." WHERE idboletas=idBoletaCliente(".$id.")";
        return $this->_bd->ejecutar($sql);
    }
    
}
?>