<?php
require_once SYS . DIRECTORY_SEPARATOR . "Modelo.php";
require_once PER . DIRECTORY_SEPARATOR . "BaseDeDatos.php";
require_once "Genero.php";

class Libro extends Modelo { 
    private $_idlibros; #Clave Primaria}
    private $_generos; #objeto de tipo genero
    private $_titulo;
    private $_descripcion;
    private $_precio_unitario;
    private $_añopublicacion;
    private $_stock;
    private $_url;
    private $_tabla="libros";
    private $_vista="v_libros01";
    private $_bd;
    #Contructor
    public function __construct($idlibros=null, 
                $generos=null, $titulo="", $descripcion="", $precio_unitario="", 
                $añopublicacion="", $stock="", $url=""){
        $this->_idlibros = $idlibros;
        $this->_generos = new Genero($generos);
        $this->_titulo = $titulo;
        $this->_descripcion = $descripcion;
        $this->_precio_unitario = $precio_unitario;
        $this->_añopublicacion = $añopublicacion;
        $this->_stock = $stock;
        $this->_url = $url;
        $this->_bd = new BaseDeDatos(new MySQL());
    }
    #implementamos lo que dice la INTERFACE
    public function nuevo(){
        $sql ="INSERT INTO ". $this->_vista
        ."(idlibros, idgeneros, titulo, descripcion, precio_unitario, añopublicacion, stock, url) VALUES (".
            $this->_idlibros . ",". $this->_generos->getId().",'"
            .$this->_titulo ."','". $this->_descripcion ."','".
            $this->_precio_unitario ."','". $this->_añopublicacion ."','".
            $this->_stock ."','". $this->_url
        ."');"; 
       //var_dump($sql);exit();
        return $this->_bd->ejecutar($sql);
        //var_dump($sql); exit();
    }
    public function eliminar(){
        $sql= "Delete FROM ". $this->_tabla 
            . " WHERE idlibros=".$this->_idlibros;
        return $this->_bd->ejecutar($sql);    
    }
    public function editar(){
        $sql ="UPDATE ". $this->_tabla
            . " SET titulo='".$this->_titulo."',"
            ."idgeneros=". $this->_generos->getId().","
            ."descripcion='". $this->_descripcion."',"
            ."precio_unitario='". $this->_precio_unitario."',"
            ."añopublicacion='". $this->_añopublicacion."',"
            ."stock='". $this->_stock."'"
            ." WHERE idlibros=".$this->_idlibros.";";
           
        return $this->_bd->ejecutar($sql); 
        //var_dump($sql); exit();
    }
    public function leer(){
        $sql ="SELECT * FROM ". $this->_vista .";";
        return $this->_bd->ejecutar($sql);
    }
    public function leerXGenero($id){
        $sql ="SELECT * FROM ". $this->_vista
            . " WHERE idgeneros=". $id;
        return $this->_bd->ejecutar($sql);
    }
     public function leerUno(){
        $sql= "SELECT * FROM ". $this->_vista
            . " WHERE idlibros=".$this->_idlibros;
        
        $datos= $this->_bd->ejecutar($sql);  
        // var_dump($datos);exit();
        if (is_array($datos['data'])){
            $this->_idlibros = $datos['data'][0]["idlibros"];
            $this->_generos = new Genero ($datos['data'][0]["idgeneros"]);
            $this->_titulo = $datos['data'][0]["titulo"];
            $this->_descripcion = $datos['data'][0]["descripcion"];
            $this->_precio_unitario = $datos['data'][0]["precio_unitario"];
            $this->_añopublicacion = $datos['data'][0]["añopublicacion"];
            $this->_stock = $datos['data'][0]["stock"];
        }
    
        return $datos; 
    }

    #Devolvemos las propiedades 
    public function getId(){ 
        return $this->_idlibros; 
    } 
    public function getTitulo(){
        return $this->_titulo;
    }
    public function getDescripcion(){
        return $this->_descripcion;
    }
    public function getPrecioUnitario(){
        return $this->_precio_unitario;
    }
    public function getAñoPublicacion(){
        return $this->_añopublicacion;
    }
    public function getStock(){
        return $this->_stock;
    }
    public function getGenero(){ #de la relacion con Genero
        return $this->_generos; 
    } 
    public function setGenero(Genero $g){
        $this->_generos= $g;
    }
    public function getDetalles(){
        $sql= "SELECT * FROM ". $this->_vista 
            . " WHERE idlibros=".$this->_idlibros;
        
        $datos= $this->_bd->ejecutar($sql);  

        $sql= "SELECT * FROM imagenes_producto" 
           . " WHERE idlibros=".$this->_idlibros;
        $datos['imagenes']= $this->_bd->ejecutar($sql);
    
        return $datos; 
    }
    public function getInfo(){
        $sql= "SELECT * FROM ". $this->_vista
            . " WHERE idlibros=".$this->_idlibros;
        var_dump($sql); exit();
        $datos= $this->_bd->ejecutar($sql);  

      /*  $sql= "SELECT * FROM imagenes_producto" 
           . " WHERE idlibros=".$this->_idlibros;
        $datos['imagenes']= $this->_bd->ejecutar($sql);
    */
        return $datos; 
    }  
    # Devolver productos para Carrito
    public function getLibrosCarrito()    {
        $libr = null;
        $libros = $_SESSION['carrito']->getLibros();
        //var_dump($libros);exit();
        if (!empty($libros)){
            foreach ($libros as $key => $value) 
            $libr[] =$key;
         
            $misLibros=implode(",", $libr);

            $sql= "SELECT * FROM ". $this->_vista 
                . " WHERE idlibros in(".$misLibros.")";
            //var_dump($sql); exit();
            return $this->_bd->ejecutar($sql); 
        }else{
            return null;
        }
        
    }
}
?>
