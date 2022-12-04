<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center" style="background:black;">
    <img class="animation__shake" src="dist/img/logo.jpg" alt="AdminLTELogo" height="350" width="300">
    <br><br>
    <div class="spinner"></div>
</div>
<!--CABECERA-->
<nav class="navbar navbar-expand-lg navbar-dark" style="background-color:black;">
        <div class="container-fluid">
          <a class="navbar-brand pb-2" href="#"><img src="dist/img/logo1.jpg" alt="logo" width="60px" class="img-logo img-fluid"></a>
          <button class="navbar-toggler ml-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 h6">
                    <li class="nav-item pb-2"><a class="nav-link" href="?ctrl=CtrlPrincipal&accion=index">Inicio</a></li>
                    <li class="nav-item pb-2"><a class="nav-link" href="?ctrl=CtrlPrincipal&accion=equipo">Equipo</a></li>
                    <li class="nav-item pb-2"><a class="nav-link" href="?ctrl=CtrlLibro&accion=getCatalogo">Productos</a></li>
                    <li class="nav-item pb-2"><a class="nav-link" href="?ctrl=CtrlContacto&accion=index">Contáctanos</a></li>
            </ul>
            <ul class="navbar-nav ml-auto mb-2 mb-lg-0 h6">
              <li class="nav-item pb-2 me-2">
                <a class="btn btn-info"role="button" data-toggle="modal" data-target="#modal-login">
                <i class="far fa-user"></i> ingresar</a>
              </li>
              <?php $cantProductos =isset($_SESSION['carrito'])?$_SESSION['carrito']->getNroProductos():0; ?>
              <li class="nav-item pb-2 me-2">
                <a href="?ctrl=CtrlCarrito&accion=mostrar" class="btn btn-success" title="Tiene <?= $cantProductos?> Elementos en el Carrito">
                <i class="fa fa-cart-plus"></i> Carrito
                <span class="badge bg-warning"><?= $cantProductos?></span></a>
              </li>
              <li class="d-flex" role="search">
                <input class="form-control" type="search" placeholder="Buscar" aria-label="Buscar">
                <a class="btn btn-outline-warning" style="height:40px;"> Buscar</a>
              </li>
            </ul>

            <?php echo Vista::mostrar('./plantilla/login.php','',true); ?>
            <?php echo Vista::mostrar('./plantilla/register.php','',true); ?>
      <!-- Navbar Search -->        
</nav>
