<section class="main-header">

      <!-- Default box -->
      <div class="card card-solid">
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <h3 class="d-inline-block d-sm-none fs-1 text-info text-bold mb-4"><?=$data[0]['titulo']?></h3>
              <div class="col-12">
                <?php 
                    $imagen= (is_array($imagenes['data']))?$imagenes['data'][0]['url']:'SIN_IMAGEN.jpg' ;
                ?>
                <img src="recursos/images/catalogo/<?=$imagen?>" class="product-image" alt="Product Image">
              </div>
              <div class="col-12 product-image-thumbs">
                <?php 
                    if(is_array($imagenes['data']))
                    foreach ($imagenes['data'] as $img) { ?>
                <div class="product-image-thumb active"><img src="recursos/images/catalogo/<?=$img['url']?>" alt="Product Image"></div>           
                <?php 
                    }
                ?>    
             </div>
            </div>
            <div class="col-12 col-sm-6">
              <h3 class="my-3 fs-1"><?=$data[0]['titulo']?></h3>
                <p class="text-justify"><?=$data[0]['descripcion']?>
                </p>
                
              <hr>
              <h5><b>Género:</b> <?=$data[0]['generos']?></h5>
              <h5><b>Año de Publicación:</b> <?=$data[0]['añopublicacion']?></h5>
              <h5><b>Autor(es):</b> <?=$data[0]['fullnombres']?></h5>
              <h5><b>Editorial:</b> <?=$data[0]['editoriales']?></h5>
              <hr>
              <div class="row">
                <div class="col-md-6">
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                        S/ <?=number_format($data[0]['precio_unitario'], 2, ',', ' ')?>
                        </h2>
                        <h4 class="mt-0">
                        <small>Transporte: S/ 10.00 </small>
                        </h4>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="bg-gray py-2 px-3 mt-4">
                        <h2 class="mb-0">
                          <?= $data[0]['stock']?> Unidades disponibles
                        </h2>
                        
                    </div>
                </div>
              </div>

              <div class="mt-4">
                <a href="?ctrl=CtrlCarrito&accion=agregar&idlibros=<?=$data[0]['idlibros']?>&url=detalles" class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Agregar al carrito
                </a>
                <div class="btn btn-danger btn-lg btn-flat">
                  <i class="fas fa-heart fa-lg mr-2"></i>
                  Añadir a favoritos
                </div>
              </div>

              <div class="mt-4 product-share">
                <a href="#" class="text-gray">
                  <i class="fab fa-facebook-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fab fa-twitter-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-envelope-square fa-2x"></i>
                </a>
                <a href="#" class="text-gray">
                  <i class="fas fa-rss-square fa-2x"></i>
                </a>
              </div>

            </div>
          </div>
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->

    </section>
    <!-- /.content -->