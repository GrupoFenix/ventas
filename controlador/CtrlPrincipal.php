<?php
require_once SYS . DIRECTORY_SEPARATOR . 'Controlador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Libro.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Carrito.php';
require_once REC . DIRECTORY_SEPARATOR . 'Libreria.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Graficador.php';
require_once MOD .DIRECTORY_SEPARATOR . 'Principal.php';

/*
* Clase CtrlPrincipal
*/
class CtrlPrincipal extends Controlador {
    
    public function index(){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );

        $obj = new Principal();

        $ip=$_SERVER['REMOTE_ADDR'];

        $obj->nuevo($ip);
        $data = $obj->getVisitantes();
        //var_dump($data);exit();

        $datosGraf= $this->getGraficoLibrosxGeneros();
        $datosGraf1= $this->getventasxgeneros();
        $datosGraf3= $this->getGrafLibrosxStock();
        $cantvisitas= $this->getCantVisitas();
        //var_dump($cantvisitas);exit();
        $datos = array(
            'titulo'=>"Sistema de Ventas",
            'contenido'=>Vista::mostrar('principal.php','',true),
            'cliente'=>Vista::mostrar('segundario.php','',true),
            'visitante'=>Vista::mostrar('segundario.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                    'titulo'=>'',
                    'cuerpo'=>''
            ),
            'data'=>null,
            'grafico'=>array(
                'graf1'=>$datosGraf,
                'graf2'=>$datosGraf1,
                'graf3'=>$datosGraf3)
        );
        
        $this->mostrarVista('template.php',$datos);
    }

    public function equipo(){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        $datos = array(
            'titulo'=>"Nuestro Equipo",
            'contenido'=>Vista::mostrar('tienda/equipo1.php','',true),
            'cliente'=>Vista::mostrar('tienda/equipo.php','',true),
            'visitante'=>Vista::mostrar('tienda/equipo.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                    'titulo'=>'',
                    'cuerpo'=>''
                )
        );
        
        $this->mostrarVista('template.php',$datos);
    }


    public function promocion(){
        $menu= Libreria::getMenu();
        $migas = array(
            '?'=>'Inicio',
        );
        $datos = array(
            'titulo'=>"Ofertas",
            'contenido'=>Vista::mostrar('principal.php','',true),
            'cliente'=>Vista::mostrar('tienda/promocion.php','',true),
            'visitante'=>Vista::mostrar('tienda/promocion.php','',true),
            'menu'=>$menu,
            'migas'=>$migas,
            'msg'=>array(
                    'titulo'=>'',
                    'cuerpo'=>''
                )
        );
        
        $this->mostrarVista('template.php',$datos);
    }


    private function getGraficoLibrosxGeneros(){
        $g = new Graficador();
        $datos = $g->getLibrosxGeneros();
        return $datos;
    }
    private function getventasxgeneros(){
        $g = new Graficador();
        $datos = $g->getventasxgeneros();
        return $datos;
    }
    private function getGrafLibrosxStock(){
        $g = new Graficador();
        $datos = $g->getLibrosxStock();
        return $datos;
    }
    private function getCantVisitas(){
        $c = new Principal();
        $datos = $c->cantvisitas();
        return $datos;
    }
    private function getCantBoletas(){
        $cb = new Principal();
        $datos = $cb->cantboletas();
        return $datos;
    }
    private function getCantClientes(){
        $cc = new Principal();
        $datos = $cc->cantclientes();
        return $datos;
    }
 

    public function error404()
    {
        $datos= array(
            'controlador'=>isset($_GET['ctrl'])?$_GET['ctrl']:'CtrlPrincipal',
            'accion'=>isset($_GET['accion'])?$_GET['accion']:'index'
        );
        $this->mostrarVista('404.php',$datos);
    }
}