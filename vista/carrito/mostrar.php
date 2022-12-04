<?php 
$sesion=isset($_SESSION['perfil'])?$_SESSION['perfil']:0;
if ($sesion==1) { ?>
    <section class="content main-header p-3">
<?php }elseif ($sesion==2 or $sesion==0) { ?>
    <section class="content m-4">
<?php } ?>
        <div class="row ">
            <div class="col-md-9">
                <div class="card card-success card-outline">
                    <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-cart-plus"></i>
                        Carrito de compras
                    </h3>
                    </div>
                    <div class="card-body pad table-responsive">
                    <table class="table table-bordered text-center">
    <?php 
    $total =0;
    // var_dump($data);exit();
    if (isset($_SESSION['carrito']))
        foreach ($data as $l) { 
            $cant = $_SESSION['carrito']->getCantidad($l['idlibros']);
            
            $precio_unitario = $l['precio_unitario'];
            $subTotal = number_format($cant * $precio_unitario, 2, ',', ' ');
            $total += $cant * $precio_unitario;
            ?>
                     
                        <tbody>
                            <tr>
                                <td width="20%">
                                    <img src="recursos/images/catalogo/<?=$l['url']?>" alt="user-avatar" class="img-fluid">
                                    <hr>
                                    <a href="?ctrl=CtrlCarrito&accion=sacar&idlibros=<?=$l['idlibros']?>&url=carrito&cant=<?=$cant?>" class="btn btn-danger">Eliminar</a>
                                </td>
                                <td>
                                    <h2><?=$l['titulo']?></h2>
                                    <h5 class="text-gray text-justify"><?=$l['descripcion']?></h5>
                                </td>
                                <td width="20%">
                                    <h5>Precio:</h5>
                                        <h4>S/ <?=number_format($precio_unitario, 2, ',', ' ');;?></h4> 
                                    <h5>Cantidad:</h5>
                                        <h4>
                                            <?=$cant;?>
                                            <a href="?ctrl=CtrlCarrito&accion=agregar&idlibros=<?=$l['idlibros']?>&url=carrito"
                                                 class="btn btn-success">+</a>
                                            <a href="?ctrl=CtrlCarrito&accion=sacar&idlibros=<?=$l['idlibros']?>&url=carrito"
                                                 class="btn btn-danger">-</a>
                                        </h4>
                                        
                                    <h4>Sub Total: </h4>
                                    <h4>
                                        <?=$subTotal;?>
                                    </h4>
                                </td>
                            </tr>
                        </tbody>
   <?php }
        ?>                     
                    </table>
                    </div>
                    <!-- /.card -->
                </div>

        </div>
        <!-- /.col -->
        <div class="col-md-3">
            <div class="card card-success card-outline">
                <div class="card-header">
                <h3 class="card-title">
                    <i class="fas fa-cart-plus"></i>
                    Resumen
                </h3>
                </div>
                <div class="card-body pad table-responsive">
                
                <table class="table table-bordered text-center">
                    
                    <tbody>
                        <tr>
                            <td>
                                <h4>Total Productos:</h4>
                            
                                S/ <?=number_format($total, 2, ',', ' ');?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>IGV.:</h3> 
                            
                                S/ <?=number_format($total*0.18, 2, ',', ' ');?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <h3>Total</h3> 
                            
                                <h4>
                                    S/ <?=number_format($total*1.18, 2, ',', ' ');?>
                                </h4>
                                
                            </td>
                        </tr>
                    </tbody>
                    
                </table>
                <hr>
                <?php if (isset($_SESSION['nombre'])){ ?>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            
                            <a href="?ctrl=CtrlBoleta&accion=guardarNuevo" class="btn-lg btn-success">
                                <i class="fa fa-cart-arrow-down"></i>
                            Procesar Compra</a>
                        </div>
                    </div>
                <?php }else { ?>
                    <div class="row">
                        <div class="col-md-12 text-center">
                            
                            <button class="btn-lg btn-success" disabled>
                                <i class="fa fa-cart-arrow-down"></i>
                            Procesar Compra</button>
                            <br>
                            <code>Primero debe LOGEARSE</code>
                        </div>
                    </div>
                <?php }?>
                <hr>
                <div class="row">
                    <div class="col-md-12 text-center">
                        
                        
                        <a href="?ctrl=CtrlLibro&accion=getCatalogo" 
                            class="btn-lg btn-primary">
                            <i class="fa fa-store"></i>
                            Seguir comprando</a>
                    </div>
                </div>
                
                </div>
                <!-- /.card -->
            </div>
        </div>
    </div>
        <!-- ./row -->
    
</section>
    