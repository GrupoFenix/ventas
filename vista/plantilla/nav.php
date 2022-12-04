<!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center" style="background-color:#084d6e;">
    <img src="dist/img/logoadmin.png" alt="AdminLTELogo" height="350" width="300">
    <h1 class="text-light text-bold ">Los Escritos del Fénix</h1>
    <h2 class="text-light text-bold">Administrador</h2>
    <br><br>
    <div class="spinner1"></div>
  </div>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light bg-info">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item ">
        <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="index.php" class="nav-link text-white text-bold">Inicio</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?ctrl=CtrlPrincipal&accion=equipo" class="nav-link text-white text-bold">Nosotros</a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="?ctrl=CtrlLibro&accion=getCatalogo" class="nav-link text-white text-bold">Productos</a>
      </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item mt-2">
        <a class="btn btn-app border-light rounded" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
          Buscar
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-md">
              <input class="form-control form-control-navbar" id="txtBuscar" type="search" placeholder="Buscar" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
        <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown mt-2">
        <a class="btn btn-app border-light rounded" data-toggle="dropdown" href="#" title=" <?=$_SESSION['nombre'];?>">
          <i class="far fa-user"></i><?=$_SESSION['nombre'];?>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="col-md-12">

            <div class="info card card-widget widget-user">
              <div class="widget-user-header bg-teal">
                <h3 class="widget-user-username"><?=$_SESSION['nombre']?></h3>
                <h5 class="widget-user-desc">Administrador</h5>
              </div>
              <div class="widget-user-image">
              <?php $img = (!is_null($_SESSION['url']))?$_SESSION['url']:'SIN_PERFIL.jpg'; ?> 
                <img class="img-circle elevation-2" src="dist/img/<?=$img?>" alt="User Avatar" style="height:85px;width:85px;">
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
      </li>
        <?php
        $cantProductos =isset($_SESSION['carrito'])?$_SESSION['carrito']->getNroProductos():0;
      ?>
      <li class="nav-item mt-2">
          
        <a href="?ctrl=CtrlCarrito&accion=mostrar" 
          class="btn btn-app border-light rounded" title="Tiene <?= $cantProductos?> Elementos en el Carrito">
            <span class="badge bg-warning"><?= $cantProductos?></span>
              <i class="fa fa-cart-plus"></i>
              Ver Carrito</a>
           
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light mt-3" title="Pantalla completa" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-light mt-3" title="Personalizar" data-widget="control-sidebar" data-controlsidebar-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->