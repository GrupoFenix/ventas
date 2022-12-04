<section class="content">
<div class="main-header p-2">
    <div class="container-fluid">
        <div class="row">
        <div class="col-lg-3 col-6">

        <div class="small-box bg-info">
            <div class="inner">
                <h3>150</h3>
                <p>Nuevos Pedidos</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">

        <div class="small-box  bg-teal">
            <div class="inner">
            <?php
            $cb = new Principal();
            $datos = $cb->cantboletas();
            if (is_array($datos)) { ?>
            <h3><?=$datos['data'][0]['cantidad']?></h3>
            <?php } ?>
                <p>ventas realizadas</p>
            </div>
            <div class="icon">
                <!--<i class="ion ion-stats-bars"></i>-->
                <i class="fas fa-shopping-cart"></i>
            </div>   
            </div>
        </div>

        <div class="col-lg-3 col-6">

        <div class="small-box bg-warning">
            <div class="inner">
            <?php
            $cc = new Principal();
            $datos = $cc->cantclientes();
            if (is_array($datos)) { ?>
                <h3><?=$datos['data'][0]['cantidad']?></h3>
            <?php } ?>
                <p>Clientes Registrados</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            </div>
        </div>

        <div class="col-lg-3 col-6">
        <div class="small-box bg-danger">
            <div class="inner">
            <?php 
            $c = new Principal();
            $resultado = $c->cantvisitas();
            //var_dump($resultado);exit();
            if (is_array($resultado)) { ?>
                <h3><?=$resultado['data'][0]["total"]?></h3>
            <?php }?>
                <p>Cantidad de visitantes</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-3 col-6">
                <div class="info-box border border-info">
                    <span class="info-box-icon bg-info rounded-circle elevation-1"><i class="bi bi-currency-dollar"></i></span>
                    <div class="info-box-content">
                    <?php 
                        $ds = new Principal();
                        $dinero = $ds->totalrecaudado();
                        //var_dump($resultado);exit();
                        if (is_array($dinero)) { ?>
                        <span class="info-box-text">Dinero total de ventas</span>
                        <span class="info-box-number">
                        S/ <?=number_format($dinero['data'][0]["totalrecaudado"], 3, '.', ' ')?>
                        </span>
                    <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="info-box border border-info mb-3">
                    <span class="info-box-icon bg-teal rounded-circle elevation-1"><i class="fas fa-book"></i></span>
                    <div class="info-box-content">
                    <?php 
                        $cl = new Principal();
                        $resultado = $cl->getcantLibros();
                        //var_dump($resultado);exit();
                        if (is_array($resultado)) { ?>
                        <span class="info-box-text">Libros</span>
                        <span class="info-box-number"><?=$resultado['data'][0]["librosregister"]?></span>
                    <?php } ?>
                    </div>
                </div>
            </div>


            <div class="col-lg-3 col-6">
                <div class="info-box border border-warning mb-3">
                    <span class="info-box-icon bg-warning rounded-circle elevation-1"><i class="text-white fas fa-shopping-cart"></i></span>
                    <div class="info-box-content">
                    <?php 
                        $sl = new Principal();
                        $resultado = $sl->getstocktotal();
                        //var_dump($resultado);exit();
                        if (is_array($resultado)) { ?>
                        <span class="info-box-text">Productos</span>
                        <span class="info-box-number"><?=$resultado['data'][0]["totalproductos"]?></span>
                    <?php } ?>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-6">
                <div class="info-box border border-danger mb-3">
                    <span class="info-box-icon bg-danger rounded-circle elevation-1"><i class="fas fa-users"></i></span>
                    <div class="info-box-content">
                    <?php
                        $cv = new Principal();
                        $cuentas = $cv->cantclientesnull();
                        if (is_array($datos)) { ?>
                        <span class="info-box-text">Cuentas sin verificar</span>
                        <span class="info-box-number"><?=$cuentas['data'][0]["cantidad"]?></span>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header border-0">
            <div class="d-flex justify-content-between">
                <h3 class="card-title">Online Store Visitors</h3>
            </div>
        </div>
            <div class="card-body">
                <div class="d-flex">
                    <p class="d-flex flex-column">
                    <span class="text-bold text-lg">820</span>
                    <span>Visitors Over Time</span>
                    </p>
                    <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                    <i class="fas fa-arrow-up"></i> 12.5%
                    </span>
                    <span class="text-muted">Since last week</span>
                    </p>
                </div>
                <div class="position-relative mb-4">
                    <canvas id="visitors-chart" height="200"></canvas>
                    </div>
                    <div class="d-flex flex-row justify-content-end">
                    <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> This Week
                    </span>
                    <span>
                    <i class="fas fa-square text-gray"></i> Last Week
                    </span>
                </div>
            </div>
        </div>
    <div class="row">
    <div class="col-12 col-md-12">
        <!-- USERS LIST -->
        <div class="card card-blue border border-primary">
            <div class="card-header">
                <h3 class="card-title">Cantidad de libros por géneros</h3>

                <div class="card-tools">
                    <span class="badge badge-danger"></span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="position-relative mb-4 ">
                  <canvas id="grafLibrosxGeneros" height="300"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!--/.card -->
    </div>

    <div class="col-12 col-md-6">
        <!-- USERS LIST -->
        <div class="card card-danger border border-danger">
            <div class="card-header">
                <h3 class="card-title">Promedio de ventas por Géneros
                <!--<form action="?ctrl=CtrlGraficador&accion=getventasxgeneros">
                    <input type="date" for="<?=".$anio.",".$mes.",".$dia."?>">
                    <button type="submit">
                     Guardar
                    </button>
                </form>-->
                </h3>
                <div class="card-tools">
                    <span class="badge badge-danger"></span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body p-0">
                <div class="position-relative mb-4 ">
                  <canvas id="ventasxgeneros" height="300"></canvas>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
        <!--/.card -->
    </div>
    <div class="col-md-6">
        <div class="card card-success border border-success">
            <div class="card-header">
                <h3 class="card-title">Libros con menor de 25 ejemplares</h3>
                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="chart">
                    <canvas id="librosxstock" height="280"></canvas>
                </div>
            </div>
        </div>
    </div>
    
  </div>
</div>
</section>



