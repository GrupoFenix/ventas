<?php

class Carrito {
    private $_libros=null;

    public function agregar($idlibros,$cant=1){
        if (!isset($this->_libros[$idlibros]))
            $this->_libros[$idlibros]['cant']=0;       #inicializamos por lo menos 'cant'
        $this->_libros[$idlibros]['cant'] += $cant;    #Agregamos la Cantidad
    }
    public function sacar($idlibros,$cant=1){
        if ($cant<=$this->_libros[$idlibros]['cant'])
            $this->_libros[$idlibros]['cant']-= $cant;
        if ($this->_libros[$idlibros]['cant']==0)
            unset($this->_libros[$idlibros]);
    }
    public function getLibros(){
        return $this->_libros;
    }
    public function getCantidad($idlibros){
        return isset($this->_libros[$idlibros]['cant'])?$this->_libros[$idlibros]['cant']:0;
    }
    public function calcularTotal(){
        $total = 0;
        foreach ($this->_libros as $l) 
            $total += $l['precio_unitario'] * $l['cant'] ;
        $total = number_format($total,2,"."," ");
        return $total;
    }
    public function getNroProductos(){
        $nro=0;
        if (is_array($this->_libros))
        foreach ($this->_libros as $l) {
            $nro += $l['cant'];
        }
        return $nro;
    }
}