<?php
session_start();

abstract class Libreria {
    static function getMenu(){  # Generamos el MENU de opciones
        return array(
            array(
                'icono'=>'users',
                'enlace'=>'CtrlCliente',
                'texto'=>'Clientes'
            ),
            array(
                'icono'=>'book',
                'enlace'=>'CtrlGenero',
                'texto'=>'Gèneros literarios'
            ),
            array(
                'icono'=>'ion ion-bag',
                'enlace'=>'CtrlBoleta',
                'texto'=>'Boletas'
            ),
            array(
                'icono'=>'users',
                'enlace'=>'CtrlAutor',
                'texto'=>'Autores'
            ),
            array(
                'icono'=>'home',
                'enlace'=>'CtrlEditorial',
                'texto'=>'Casas Editoriales'
            ),
            array(
                'icono'=>'key',
                'enlace'=>'CtrlEstadoPedido',
                'texto'=>'Estados de Pedido'
            ),
            array(
                'icono'=>'box',
                'enlace'=>'CtrlPedido',
                'texto'=>'Control de Pedidos'
            ),
            array(
                'icono'=>'book',
                'enlace'=>'CtrlLibro',
                'texto'=>'Libros'
            ),
            array(
                'icono'=>'book',
                'enlace'=>'CtrlAutorLibro',
                'texto'=>'Autores y Libros'
            ),
            array(
                'icono'=>'far fa-envelope',
                'enlace'=>'CtrlContacto',
                'texto'=>'Mensajes y Sugerencias'
            ),
            array(
                'icono'=>'ion ion-person-add',
                'enlace'=>'CtrlPerfil',
                'texto'=>'Tipos de perfiles'
            ),
        );
    }
    static function cssGlobales(){
        return array(
                array(
                    'nombre'=>'Google Font: Source Sans Pro',
                    'url'=>'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback'
                ),
                
                array(
                    'nombre'=>'Font Awesome',
                    'url'=>'plugins/fontawesome-free/css/all.min.css'
                ),
                array(
                    'nombre'=>'Ionicons',
                    'url'=>'https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css'
                ),
                array(
                    'nombre'=>'Tempusdominus Bootstrap 4',
                    'url'=>'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css'
                    # 'url'=>'plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css'
                ),
                array(
                    'nombre'=>'iCheck',
                    'url'=>'plugins/icheck-bootstrap/icheck-bootstrap.min.css'
                ),
                array(
                    'nombre'=>'JQVMap',
                    'url'=>'plugins/jqvmap/jqvmap.min.css'
                ),
                array(
                    'nombre'=>'Theme style',
                    'url'=>'dist/css/adminlte.min.css'
                ),
                array(
                    'nombre'=>'overlayScrollbars',
                    'url'=>'plugins/overlayScrollbars/css/OverlayScrollbars.min.css'
                ),
                array(
                    'nombre'=>'Daterange picker',
                    'url'=>'plugins/daterangepicker/daterangepicker.css'
                ),
                array(
                    'nombre'=>'summernote',
                    'url'=>'plugins/summernote/summernote-bs4.min.css'
                ),
                array(
                    'nombre'=>'jsToast',
                    'url'=>'recursos/css/jquery/jquery-toast.css'
                ),
                array(
                    'nombre'=>'visitante',
                    'url'=>'dist/css/styles.css'
                ),
                array(
                    'nombre'=>'inicio',
                    'url'=>'dist/css/inicio.css'
                ),
                array(
                    'nombre'=>'iconos',
                    'url'=>'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css'
                ),
                array(
                    'nombre'=>'loadanimated',
                    'url'=>'dist/css/loadmin.css'
                ),
                array(
                    'nombre'=>'perfil',
                    'url'=>'dist/css/perfil.css'
                ),
                array(
                    'nombre'=>'fondo perfil',
                    'url'=>'dist/css/backgroundperfil.css'
                ),
            );
    }
    
    static function jsGlobales(){
        return array(
            array(
                'url'=>'plugins/jquery/jquery.min.js'
            ),
            array(
                'url'=>'plugins/jquery-ui/jquery-ui.min.js'
            ),
            array(
                'url'=>'https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js'
            ),
            array(
                'url'=>'plugins/bootstrap/js/bootstrap.bundle.min.js'
            ),
            array(
                'url'=>'dist/js/adminlte.js'
            ),
            array(
                'url'=>'dist/js/demo.js'
            ),
            array(
                'url'=>'dist/js/pages/dashboard3.js'
            ),
            array(
                'url'=>'recursos/js/jq-toast.min.js'
            ),
            array(
                'url'=>'plugins/chart.js/Chart.min.js'
            ),
            
            array(
                'url'=>'recursos/js/jspdf.debug.js'
            ),
            
            array(
                'url'=>'recursos/js/jspdf.plugin.autotable3.1.1.min.js'
            ), 
            array(
                'url'=>'dis/js/contacto.js'
            ),
        );
    }

}
