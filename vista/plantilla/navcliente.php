<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center" style="background:black;">
    <img class="animation__shake" src="dist/img/logo.jpg" alt="AdminLTELogo" height="350" width="300">
    <br><br>
    <div class="spinner"></div>
</div>
<!--CABECERA-->

    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color: black;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#"><img src="dist/img/logo1.jpg" alt="logo" width="60px" class="mt-2 img-logo img-fluid"></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-lg-0 h6">
                    <li class="mt-2 nav-item pb-2 text-center"><a class="nav-link" href="?ctrl=CtrlPrincipal&accion=index">Inicio</a></li>
                    <li class="mt-2 nav-item pb-2 text-center"><a class="nav-link" href="?ctrl=CtrlPrincipal&accion=equipo">Equipo</a></li>
                    <li class="mt-2 nav-item pb-2 text-center"><a class="nav-link" href="?ctrl=CtrlLibro&accion=getCatalogo">Productos</a></li>
                    <li class="mt-2 nav-item pb-2 text-center"><a class="nav-link" href="?ctrl=CtrlPrincipal=getFavorito">Mis Favoritos</a></li>
                    <li class="mt-2 nav-item pb-2 text-center"><a class="nav-link" href="?ctrl=CtrlContacto&accion=index">Contáctanos</a></li>
                    <li class="mt-2 nav-item pb-2 text-center mb-2"><a class="nav-link" href="?ctrl=CtrlBoleta&accion=index">Mis boletas</a></li>
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0 h6">
              <!-- MI PERFIL-->
              <li class="nav-item dropdown text-center pb-2 m-auto">
                <a class="mt-2 btn btn-info mb-2" data-toggle="dropdown" href="#" title="Perfil" role="button" >
                  <i class="far fa-user"></i> <?=$_SESSION['nombre'];?>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                  <div class="col-md-12">
                    <div class="card card-widget widget-user-2 shadow-sm">
                      <div class="widget-user-header bg-warning mt-2">
                        <div class="widget-user-image">
                        <?php $img = (!is_null($_SESSION['url']))?$_SESSION['url']:'SIN_PERFIL.jpg'; ?> 
                          <img class="img-circle elevation-2" src="dist/img/<?=$img?>" alt="User Avatar" style="height:64px;width:64px;">
                        </div>
                        <h3 class="widget-user-username"><b><?=$_SESSION['nombre']?></b></h3>
                        <h5 class="widget-user-desc">Cliente</h5>
                      </div>
                      <div class="card-footer">
                        <p class="text-sm">
                          <i class="far fa-envelope"></i> : <?=$_SESSION['email']?>
                        </p>
                        <p class="text-sm">
                          <i class="far fa-clock mr-1"></i> Hace 4 hrs.
                        </p>
                        <div class="row">
                          <div class="col-sm-12 border-right">
                              <a href="?ctrl=CtrlCliente&accion=perfil" class="dropdown-item dropdown-footer ">Perfil</a>
                              <a href="#" class="dropdown-item dropdown-footer text-center">Acerca de...</a>
                              <a href="?ctrl=CtrlCliente&accion=cerrarSesion" class="dropdown-item dropdown-footer text-center">Cerrar Sesión</a>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </li>
              <!--CARRITO DE COMPRAS-->
              <?php $cantProductos =isset($_SESSION['carrito'])?$_SESSION['carrito']->getNroProductos():0; ?>
              <li class="nav-item pb-2 me-2 ml-2 text-center">
                <a href="?ctrl=CtrlCarrito&accion=mostrar" class="mt-2 btn btn-success mb-2" title="Tiene <?= $cantProductos?> Elementos en el Carrito">
                <i class="fa fa-cart-plus"></i> Carrito
                <span class="badge bg-warning"><?= $cantProductos?></span></a>
              </li>
              <form class="d-flex" role="search">
                <input class="form-control me-2 mt-2" type="search" placeholder="Buscar" aria-label="Buscar">
                <button class="btn btn-outline-warning mt-2" type="submit" style="height:39px;"> Buscar</button>
              </form>
            </ul>  
          </div>
        </div>   
    </nav>