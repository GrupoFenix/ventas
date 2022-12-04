<section class="content">
    <div class="container-fluid">
    <form action="?ctrl=CtrlPedido&accion=guardarEditar" method="post">
        <div class="input-group mb-3">
            <span class="input-group-text">Id:</span>
            <input type="text" class="form-control"
                name="idpedidos" value="<?=$pedidos->getId()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Fecha de Pedido:</span>
            <input type="date" class="form-control"
                name="fechapedido" value="<?=$pedidos->getFechaPedido()?>">
        </div>
        <div class="input-group mb-3">
            <span class="input-group-text">Fecha de envío:</span>
            <input type="date" class="form-control"
                name="fechaenvio" value="<?=$pedidos->getFechaEnvio()?>">
        </div>
        
        <div class="col-md-6">
            <label for="inputidclientes" class="form-label">Nombre de Cliente:</label>
            <select name="nombres" class="form-control" id="nombres">
                <?php
                    $clientess = $pedidos->getCliente()->leer()['data'];
                    $clientes = $pedidos->getCliente()->getId();
                    foreach ($clientess as $c) { 
                        if ($c["idclientes"]==$clientes)
                            $seleccionado="selected";
                        else
                            $seleccionado="";
                ?>
            <option <?=$seleccionado?>
            value="<?=$c["idclientes"]?>"><?=$c["nombres"]?></option>
            <?php } ?>
            </select>
            </div>
        <div class="col-md-6">
            <label for="inputestadoped" class="form-label">Estado de Pedido:</label>
            <select name="estadoped" class="form-control" id="estadoped">
                <?php
                    $estadopedidos = $pedidos->getEstadoPedido()->leer()['data'];
                    $estadopedido = $pedidos->getEstadoPedido()->getId();
                    foreach ($estadopedidos as $ep) { 
                        if ($ep["idestadopedido"]==$estadopedido)
                            $seleccionado="selected";
                        else
                            $seleccionado="";
                ?>
            <option <?=$seleccionado?>
            value="<?=$ep["idestadopedido"]?>"><?=$ep["estadoped"]?></option>
            <?php } ?>
            </select>
            </div>
        </div><br>
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
