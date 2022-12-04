<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';

require_once MOD . DIRECTORY_SEPARATOR . 'Graficador.php';
/*
* Clase CtrlGraficador
*/
class CtrlGraficador extends Controlador {
    
    public function index(){
        $g = new Graficador();
        $datos = $g->getLibrosxGeneros();
        var_dump($datos);exit();
    }
    public function index(){
        $g = new Graficador();
        $datos = $g->getventasxgeneros();
        var_dump($datos);exit();
    }
    public function index(){
        $g = new Graficador();
        $datos = $g->getLibrosxStock();
        var_dump($datos);exit();
    }
}