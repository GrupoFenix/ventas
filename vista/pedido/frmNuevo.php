<section class="content">
    <div class="container-fluid">
    <form action="?ctrl=CtrlPedido&accion=guardarNuevo" method="post">
        <div class="row mb-3">
        <div class="col-md-6">
            <label for="inputID" class="form-label">Id:</label>
            <input type="text" class="form-control"
                name="idpedidos" value="" id="inputID">
        </div>
        <div class="col-md-6">
            <label for="inputFechaPedido" class="form-label">Fecha de Pedido:</label>
            <input type="date" class="form-control"
                name="fechapedido" value="" id="inputFechaPedido">
        </div>
        <div class="col-md-6">
            <label for="inputFechaEnvio" class="form-label">Fecha de Envío:</label>
            <input type="date" class="form-control"
                name="fechaenvio" value="" id="inputFechaEnvio">
        </div>
        
        <div class="col-md-6">
            <label for="inputnombres" class="form-label">Nombre de Cliente:</label>
            <select name="nombres" class="form-control" id="nombres">
                <?php
                    $clientes = $pedidos->getCliente()->leer()['data'];
                    foreach ($clientes as $c) { ?>
                    <option value="<?=$c["idclientes"]?>"><?=$c["nombres"]?></option>
                    <?php } ?>
            </select>

        </div>
        <div class="col-md-6">
            <label for="inputestadoped" class="form-label">Estado de Pedido:</label>
            <select name="estadoped" class="form-control" id="estadoped">
                <?php
                    $estadoped = $pedidos->getEstadoPedido()->leer()['data'];
                    foreach ($estadoped as $ep) { ?>
                    <option value="<?=$ep["idestadopedido"]?>"><?=$ep["estadoped"]?></option>
                    <?php } ?>
            </select>
        </div>
        </div>
        <div class="col-md-3">
        <button type="submit" class="form-control btn btn-primary">
            <i class="bi bi-save2"></i> Guardar</button>
        </div>
    </form>
    <br><a href="?ctrl=CtrlPedido" class="btn btn-primary">
        <i class="bi bi-arrow-90deg-left"></i>
        Retornar</a>
</div>
</section>
