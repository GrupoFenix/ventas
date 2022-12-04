<?php 
$sesion=isset($_SESSION["perfil"])?$_SESSION["perfil"]:0;
switch ($sesion) {
  case 1: 
    $obj = new Genero();
    $resultado = $obj->leer();     
  ?>
    <section class="content main-header">
    <div class="container-fluid">
        <div class="navbar navbar-expand-lg navbar-info">
            <ul class="navbar-nav m-auto mb-2 mb-lg-0 h5">
                <li class="nav-item pb-2"><a class="nav-link text-bold text-white text-center" href="?ctrl=CtrlLibro&accion=getCatalogo">Ver Todo</a></li>
    <?php   foreach ($resultado['data'] as $l) { ?>
            
                <li class="nav-item pb-2 "><a class="nav-link text-bold text-white text-center" href="?ctrl=CtrlLibro&accion=Leerlibro&g=<?=$l['idgeneros']?>"><?=$l['generos']?></a></li>
            
    <?php }?> 
            </ul>
        </div>
    <?php
    if (is_array($data)){
          foreach ($data as $l) {
            ?>
        <div class="d-flex flex-wrap justify-content-center col-lg-12 col-md-12 col-sm-12 mt-4">
                <div class="col-md-3 card d-flex" >
                    <div class="card-header">
                        <div class="text-center">
                                <h1 class="lead"><b><?=$l['titulo']?></b></h1>
                                <p class="text-sm"><b>Géneros: </b><?=$l['generos']?></p>
                        </div>
                    </div>
                    <div class="card-body m-auto justify-content-center pt-4" >    
                        <div>
                            <?php 
                                $img = (!is_null($l['url']))?$l['url']:'SIN_IMAGEN.jpg';
                            ?>
                            <img src="recursos/images/catalogo/<?=$img?>" class="img-fluid" style="border-radius:20px; height:300px; width:219px;"> 
                            <h3 class="text-red pt-2">S/ <?=number_format($l['precio_unitario'], 2, ',', ' ');?></h3>   
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center mb-2">
                        <a href="?ctrl=CtrlLibro&accion=verDetalles&idlibros=<?=$l['idlibros']?>&url=catalogo" class="btn btn-sm btn-success"> Detalles</a>&nbsp;
                        <a href="?ctrl=CtrlCarrito&accion=agregar&idlibros=<?=$l['idlibros']?>&url=catalogo" class="btn btn-sm btn-primary"> Añadir a Carrito</a>
                    </div>    
                </div>
        </div>
            <?php
                }  
            }else{
                echo "no hay productos";
            }
            ?>
    </div>
    </section>   
        <?php
    break;
  case 2:
    $obj = new Genero();
    $resultado = $obj->leer(); 
    echo Vista::mostrar('libro/sliders.html',$datos,true);?>
<section class="content">
    <div class="col-lg-12 col-md-12 row d-flex flex-wrap">
        <div class="navbar navbar-expand-lg navbar-dark col-12">
        <ul class="navbar-nav m-auto mb-2 mb-lg-0 h5">
                <li class="nav-item pb-2"><a class="nav-link text-bold text-center" href="?ctrl=CtrlLibro&accion=getCatalogo">Ver Todo</a></li>
    <?php   foreach ($resultado['data'] as $l) { ?>
            
                <li class="nav-item pb-2"><a class="nav-link text-bold text-center" href="?ctrl=CtrlLibro&accion=Leerlibro&g=<?=$l['idgeneros']?>"><?=$l['generos']?></a></li>
            
    <?php }?> 
        </ul>
        </div>
    <h2 class="text-bold text-dark ml-4 mt-4">Productos</h2>
    <?php
    if (is_array($data)){
        foreach ($data as $l) {
          ?>
          <div class="col-md-2 d-flex justify-content-center">
              <div class="card" >
                  <div class="card-body pt-4 " >
                      <div class=" text-center">
                          <h1 class="lead"><b><?=$l['titulo']?></b></h1>
                          <p class="text-sm"><b>Género: </b><?=$l['generos']?></p>
                      </div>
                      
                          <div class="">
                              <?php 
                              $img = (!is_null($l['url']))?$l['url']:'SIN_IMAGEN.jpg';
                          ?>
                              <img src="recursos/images/catalogo/<?=$img?>" alt="user-avatar" class="img-fluid" style="border-radius:20px; height:300px; width:219px;">    
                          </div>
                      
                          <h3 class="text-red pt-2">S/ <?=number_format($l['precio_unitario'], 2, ',', ' ');?></h3>
                          <div class="">
                              <a href="?ctrl=CtrlLibro&accion=verDetalles&idlibros=<?=$l['idlibros']?>&url=catalogo" class="btn btn-sm btn-success"> Detalles</a>
                              <a href="?ctrl=CtrlCarrito&accion=agregar&idlibros=<?=$l['idlibros']?>&url=catalogo" class="btn btn-sm btn-primary"> Añadir a Carrito</a>
                          </div>    
                      </div>
                  </div>
              </div>
          <?php
              }  
          }else{
              echo "no hay productos";
          }
          ?>
    </div>
</section><?php
    break;
  default:
  $obj = new Genero();
  $resultado = $obj->leer(); 
  echo Vista::mostrar('libro/sliders.html',$datos,true);?>

  <div class="col-lg-12 col-md-12 row d-flex flex-wrap">
      <div class="navbar navbar-expand-lg navbar-dark">
      <ul class="navbar-nav m-auto mb-2 mb-lg-0 h5">
              <li class="nav-item pb-2"><a class="nav-link text-bold text-center" href="?ctrl=CtrlLibro&accion=getCatalogo">Ver Todo</a></li>
  <?php   foreach ($resultado['data'] as $l) { ?>
          
              <li class="nav-item pb-2"><a class="nav-link text-bold text-center" href="?ctrl=CtrlLibro&accion=Leerlibro&g=<?=$l['idgeneros']?>"><?=$l['generos']?></a></li>
          
  <?php }?> 
      </ul>
      </div>
  <h2 class="text-bold text-dark ml-4 mt-4">Productos</h2>
  <?php
  if (is_array($data)){
      foreach ($data as $l) {
        ?>
        <div class="col-md-2 d-flex justify-content-center">
            <div class="card" >
                <div class="card-body pt-4 " >
                    <div class=" text-center">
                        <h1 class="lead"><b><?=$l['titulo']?></b></h1>
                        <p class="text-sm"><b>Género: </b><?=$l['generos']?></p>
                    </div>
                    
                        <div class="">
                            <?php 
                            $img = (!is_null($l['url']))?$l['url']:'SIN_IMAGEN.jpg';
                        ?>
                            <img src="recursos/images/catalogo/<?=$img?>" alt="user-avatar" class="img-fluid" style="border-radius:20px; height:300px; width:219px;">    
                        </div>
                    
                        <h3 class="text-red pt-2">S/ <?=number_format($l['precio_unitario'], 2, ',', ' ');?></h3>
                        <div class="">
                            <a href="?ctrl=CtrlLibro&accion=verDetalles&idlibros=<?=$l['idlibros']?>&url=catalogo" class="btn btn-sm btn-success"> Detalles</a>
                            <a href="?ctrl=CtrlCarrito&accion=agregar&idlibros=<?=$l['idlibros']?>&url=catalogo" class="btn btn-sm btn-primary"> Añadir a Carrito</a>
                        </div>    
                    </div>
                </div>
            </div>
        <?php
            }  
        }else{
            echo "no hay productos";
        }
        ?>
        </div><?php
    break;
}?>
